<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake-Review-Detection</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      />
</head>
<body>
    <style>
      html{
  overflow-x: hidden;
  scroll-padding-top: 9rem;
  scroll-behavior: smooth;
}
        body{
            padding: 0;
            margin: 0;
        }
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #222629;
}

li {
  float: left;
    
}
.logo{
    margin-left: 2.5rem;
    border: solid 2px;
    border-radius: 50px;
    border-color: white;
}
.logo i{
    font-size: 40px;
    margin-top: 0.2rem;
    margin-left: 0.2rem;
    padding: 0.3rem;
}
.home{
    margin-left: 6rem;
}
li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 17px 19px;
  text-decoration: none;
  font-size: large;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color:white;
  color: black;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.0);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
.banner{
    top: -3rem;
    width: 100%;
    height: 420px;
    background-color: black;
}
.ban-word{
    display: flex;
    justify-content: center;
}
.ban-word h1{
  margin-top: 9rem;
    font-size: 90px;
    border: solid 1.5px;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
}
.ban-word h1:hover{
  opacity: 0.8;
  transform: scale(1.1);
  background-color: #7d7c7c;
}
.link{
  margin-top: 7rem;
}
.link h1{
    text-align: center;
    font-size: 45px;
    border-bottom:solid 3px;
    width: 25rem;
    padding-bottom: 0.3rem;
}
.link label{
    text-align: center;
    font-size: xx-large;
    margin-left: 45%;
}
.link input{
    width: 35rem;
    height: 2rem;
    border-radius: 30px;
    margin-top: 1.5rem;
    padding-left: 0.5rem;
}
.link button{
    width: 12rem;
    height: 3rem;
    border-radius: 30px;
    background-color:black;
    color: white;
    font-size: 20px;
    font-weight: bold;
    margin-top: 1.5rem;
}
.link button:hover{
    transform: scale(1.1);
}
.one-review{
    margin-top: 7rem;
}
.one-review h1{
    text-align: center;
    font-size: 45px;
    padding-bottom: 0.3rem;
}
.one-review form{
 width: 90%;
}
.one-review label{
    text-align: center;
    font-size: xx-large;
}
.one-review input{
    width: 35rem;
    height: 2rem;
    border-radius: 30px;
    margin-top: 1.5rem;
    padding-left: 0.5rem;
}
.one-review button{
    width: 12rem;
    height: 3rem;
    border-radius: 30px;
    font-size: 20px;
    font-weight: bold;
    margin-top: 1.5rem;
}
.one-review button:hover{
    transform: scale(1.1);
}
.contact input[type=text], select, textarea {
  width: 500px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 25px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

.contact input[type=submit] {
  background-color:black;
  color: white;
  padding: 11px 4rem;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  font-size: 20px;
  margin-top: 1.5rem;
}

.contact input[type=submit]:hover {
  transform: scale(1.1);
}

.contact.container-1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.contact h1{
  text-align: center;
    font-size: 45px;
    border-bottom:solid 3px;
    padding-bottom: 0.3rem;
    margin-top: 7rem;
}
.container-1 label{
  font-size: large;
}
.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
.card i {
  font-size: 90px;
  text-align: center;
  margin-top: 2.5rem;
}
.card h2{

  text-align: center;
}
.card p{
  text-align: center;
}
.pt-5 h1{
  text-align: center;
    font-size: 45px;
    border-bottom:solid 3px;
    width: 30rem;
    padding-bottom: 0.3rem;
    margin-left: 35%;
    margin-top: 7rem;
}
.container{
  margin-top: 4rem;
}
.foot{
  width: 100%;
  height: 3rem;
  background-color: black;
  color: white;
}
.foot h4{
  text-align: center;
  padding-top: 0.5rem ;
}
        </style>
   <div style="background-color: black;height: 4rem;">
   <ul>
            <li class="logo"><i class="fas fa-user-secret" style="color: white;"></i></li>
            <li class="home"><a href="#home">Home</a></li>
            <li><a href="#link">Review By Link</a></li>
            <li><a href="#one-review">One Review Detection</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#about">About Us</a></li>
            <li style="float: right; margin-right: 1rem;"><a href="logout.php" > Logout</a></li>
           
            <?php
            if (isset($_SESSION['user'])) {
             echo '
            <li style="display: inline-block;color: white;text-align: center;padding: 17px 19px;text-decoration: none;font-size: large;float:right">
             Hi ' . htmlspecialchars($_SESSION['user']['name']) . '
            </li>
            ';
              } else {
              echo "
              <li><a href='login.php'>LOGIN</a></li>
              <li><a href='signup.php'>SIGNUP</a></li>
                  ";
                  }
            ?>

               
            
        </ul>
    </div>
      <section id="home">
      <div class="banner">
        <div class="ban-word">
			<h1 style="color: rgb(250, 250, 250); border: none;margin-right: 4rem;">Fake Review</h1>
			<h1 style="color: rgb(11, 98, 15);">Detector</h1>
            </div>
      </div>
      <div style="display: flex; justify-content: center;">
      <section class="link" id="link">
        <h2>Enter Amazon Product URL</h2>
        <form id="review-form" method="POST" action="/reviews">
            <input type="text" id="url" name="url" placeholder="Enter URL" required>
            <button type="submit">Fetch Reviews</button>
        </form>
    
        <div id="reviews">
            {% if reviews %}
                {% for review in reviews %}
                    <p><strong>Review:</strong> {{ review['Review Body'] }} <br> <strong>Fake:</strong> {{ review['Fake'] }}</p>
                {% endfor %}
            {% endif %}
        </div>
    </section>
    </div>
    <div style="display: flex;justify-content: center;">
      <section class="one-review" id="one-review">
      <h2>One Review Dtecetion</h2>
      <form id="reviewForm" style="display: flex;">
        <textarea id="reviewText" name="reviewText" rows="4" cols="60"></textarea><br>
        <button type="submit" style="margin-left: 1rem; margin-top: 2rem;padding: 0.5rem;background-color: black; color: white;border-radius: 25px;">Detect Fake Review</button>
    </form>
    <div id="result" ></div>
  </section>
    </div>
   <div style="display: flex;justify-content: center;">
    <section class="contact" id ="contact">
        <h1>Contact Form</h1>

<div class="container-1">
  <form>
    <label for="fname">First Name</label>
    <br>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
    <br>
    <label for="lname">Last Name</label>
    <br>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    <br>
    <label for="country">Country</label>
    <br>
    <select id="country" name="country">
      <option value="usa">Egypt</option>
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
    <br>
    <label for="subject">Subject</label>
    <br>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
    <br>
    <input type="submit" value="Submit" style="margin-left: 10rem;">
  </form>
</div>
    </section>
  </div>
    <section class="pt-5 pb-5" id="about">
      <h1>About Us</h1>
      <p style="text-align: center; margin-top: 1rem;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. In necessitatibus neque temporibus ipsum amet repellat at maiores quae doloribus ab, earum voluptas pariatur consequuntur cum deserunt incidunt ipsam provident quibusdam?<br>lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque error tenetur molestiae et nulla ratione. Quae non magnam adipisci est eveniet totam velit perferendis itaque placeat? Corporis aperiam error tenetur. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam saepe, culpa maxime voluptate unde, distinctio sit voluptates corrupti quia voluptatum minus eum reprehenderit aperiam, omnis officia hic voluptatem quasi commodi. 
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit velit deleniti, perspiciatis eos fugit atque? Tempora, itaque blanditiis impedit iure voluptatibus corrupti expedita quos ea hic. Labore unde assumenda porro.
      </p>
      <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Our Team </h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev" style="background-color: black;">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next" style="background-color: black;">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
    
                              <div class="col-md-4 mb-3">
                                <div class="card">
                                  <i class="fas fa-user"></i>
                                  <div class="container">
                                    <h2>Elsayed Mohamed Elfalih</h2>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>Elsayed@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <div class="card">
                                  <i class="fas fa-user"></i>
                                  <div class="container">
                                    <h2>Michael Ibrahim fahim</h2>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>Michael@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <div class="card">
                                  <i class="fas fa-user"></i>
                                  <div class="container">
                                    <h2>Kareem Alaa Elden</h2>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>Kareem@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                  </div>
                                </div>
                              </div>
    
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                              <div class="col-md-4 mb-3">
                                <div class="card">
                                  <i class="fas fa-user"></i>
                                  <div class="container">
                                    <h2>Ayoub Elkes Temothawes</h2>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>Ayoub@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <div class="card">
                                  <i class="fas fa-user"></i>
                                  <div class="container">
                                    <h2>Mohamed Maher Abdalaal</h2>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>Mohamed@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                <div class="card">
                                  <i class="fas fa-user"></i>
                                  <div class="container">
                                    <h2>Ahmed yousry ahmed</h2>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>Ahmed@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                  </div>
                                </div>
                              </div>
    
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                  <i class="fas fa-user"></i>
                                  <div class="container">
                                    <h2>Abanoub Ehab Metry</h2>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>Abanoub@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <footer class="foot">
      <h4>@CopyRight2024</h4>
    </footer>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>     
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.3.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  
  <!-- IE10 viewport bug workaround -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>
  
  <!-- Placeholder Images -->
  <script src="js/holder.min.js"></script>
  <script>
      document.getElementById('reviewForm').addEventListener('submit', async (e) => {
          e.preventDefault();
          const formData = new FormData(e.target);
          const reviewText = formData.get('reviewText');

          const response = await fetch('/predict', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({ reviews })
          });

          const data = await response.json();
          document.getElementById('result').innerHTML = `<p>${data.prediction}</p>`;
      });
      $(document).ready(function() {
            $('review-form').on('submit', function(event) {
                event.preventDefault();
                const url = $('#url').val();
                $.post('/reviews', { url: url }, function(data) {
                    $('reviews').html('');
                    if (data.length > 0) {
                        data.forEach(review => {
                            $('reviews').append(
                                `<p><strong>Review:</strong> ${review['Review Body']} <br> <strong>Fake:</strong> ${review['Fake']}</p>`
                            );
                        });
                    } else {
                        $('reviews').append('<p>No reviews found or invalid URL.</p>');
                    }
                }).fail(function() {
                    $('reviews').append('<p>Error fetching reviews.</p>');
                });
            });
        });
        document.getElementById('reviewForm').addEventListener('submit', async (e) => {
          e.preventDefault();
          const formData = new FormData(e.target);
          const reviewText = formData.get('reviewText');

          const response = await fetch('/predict', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({ reviewText })
          });

          const data = await response.json();
          document.getElementById('result').innerHTML = `<p>${data.prediction}</p>`;
      });
    </script>
  </script>
</body>
</html>