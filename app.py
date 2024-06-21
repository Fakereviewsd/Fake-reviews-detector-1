from flask import Flask, request, jsonify, render_template, send_file, flash, redirect, url_for, session
import joblib
import string
from nltk.corpus import stopwords
from bs4 import BeautifulSoup
import pandas as pd
import re
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.ensemble import RandomForestClassifier
import nltk
from io import BytesIO
import requests

app = Flask(__name__)

nltk.download('stopwords')
stop_words = set(stopwords.words('english'))

app.secret_key = 'supersecretkey'

# Utility Functions
def text_process(review):
    nopunc = [char for char in review if char not in string.punctuation]
    nopunc = ''.join(nopunc)
    return [word for word in nopunc.split() if word.lower() not in stopwords.words('english')]

def fetch_amazon_reviews(url):
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
    }
    response = requests.get(url, headers=headers)
    if response.status_code != 200:
        return None

    soup = BeautifulSoup(response.content, 'html.parser')
    reviews = []

    for review in soup.find_all('div', {'data-hook': 'review'}):
        review_body = review.find('span', {'data-hook': 'review-body'})
        review_date = review.find('span', {'data-hook': 'review-date'})
        review_rating = review.find('i', {'data-hook': 'review-star-rating'})

        body_text = review_body.text.strip() if review_body else None
        date_text = review_date.text.strip() if review_date else None
        rating_text = review_rating.text.strip() if review_rating else None

        if body_text and date_text and rating_text:
            reviews.append({
                'Review Body': body_text,
                'Review Date': date_text,
                'Review Rating': rating_text
            })

    return reviews if reviews else None

def clean_text(text):
    text = re.sub(r'\s+', ' ', text)
    text = re.sub(r'[^a-zA-Z]', ' ', text)
    text = text.lower()
    text = ' '.join(word for word in text.split() if word not in stop_words)
    return text

# Load the model from the file
model_filename = 'fake_review_detection_model.pkl'
pipeline = joblib.load(model_filename)

# Function to predict if a review is fake using loaded model
def predict_review(review):
    prediction = pipeline.predict([review])
    return prediction[0]

# Train the second model
def train_model():
    data = {
        'review': [
            'Great product, highly recommend!',
            'Worst product ever. Do not buy.',
            'This is a fake review.',
            'Excellent quality, very satisfied.',
            'Terrible experience, would not suggest to anyone.',
            'The best product I have ever bought!',
            'Awful, nothing like the description.',
            'Completely worth the price, very happy.',
            'Fake product, do not trust.',
            'Amazing quality, will buy again.',
            'Poor customer service.',
            'Satisfied with the purchase.',
            'Exceeded my expectations!',
            'Not as advertised, disappointed.',
            'Love it! Highly recommend to others.',
            'Worst purchase I ever made.',
            'Very good quality, happy with it.',
            'Total waste of money.',
            'Fantastic product, very pleased.',
            'Product broke after one use.'
        ],
        'label': [
            1, 0, 0, 1,
            0, 1, 0, 1,
            0, 1, 0, 1,
            1, 0, 1, 0,
            1, 0, 1, 0
        ]
    }
    df = pd.DataFrame(data)
    df['cleaned_review'] = df['review'].apply(clean_text)

    vectorizer = TfidfVectorizer()
    X = vectorizer.fit_transform(df['cleaned_review'])
    y = df['label']

    model = RandomForestClassifier()
    model.fit(X, y)

    return vectorizer, model

vectorizer, model = train_model()

# Function to predict if reviews are fake
def predict_fake_reviews(reviews, vectorizer, model):
    cleaned_reviews = [clean_text(review['Review Body']) for review in reviews]
    X = vectorizer.transform(cleaned_reviews)
    predictions = model.predict(X)
    return predictions

# Routes
@app.route('/')
def index():
    return render_template('index.html')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json(force=True)
    review_text = data['reviewText']
    result = predict_review(review_text)
    prediction = "Fake" if result == "OR" else "Genuine"
    return jsonify(prediction=prediction)

@app.route('/reviews', methods=['POST'])
def reviews():
    url = request.form['url']
    reviews = fetch_amazon_reviews(url)

    if reviews is None:
        return jsonify({'reviews': []})

    predictions = predict_fake_reviews(reviews, vectorizer, model)
    for i, review in enumerate(reviews):
        review['Fake'] = 'Yes' if predictions[i] == 0 else 'No'

    return render_template('index.html', reviews=reviews)

@app.route('/download', methods=['POST'])
def download():
    reviews = request.form['reviews']
    reviews = eval(reviews)

    df = pd.DataFrame(reviews)
    buffer = BytesIO()
    df.to_excel(buffer, index=False, engine='openpyxl')
    buffer.seek(0)

    return send_file(buffer, as_attachment=True, download_name='amazon_reviews.xlsx', mimetype='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')

if __name__ == '__main__':
    app.run(debug=True)
