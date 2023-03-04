<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Moonlight Cinema</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
  <link rel="icon" href="images/moon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat:wght@900&family=Pacifico&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="images/moon.png" alt> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="requestTopup.php">Top-Up Requests</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                More
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="print.php">Print Tickets</a></li>
                <li><a class="dropdown-item" href="#">Contact</a></li>
              </ul>
            </li>
            </li>
            <div class="topbutton">


<?php
session_start();
if(isset($_SESSION["un"])){
  


?>
<div class="d-flex gap-3 align-items-center">
<div>
Welcome <?php echo $_SESSION["un"]; ?>
</div>
<div class="profilePicture" style="background-image:url('images/profile/<?php echo $_SESSION["loggedInUser"]["profilePic"] ?>')"></div>

</div>

  <?php
}else{

  ?>
<button type="button" class="btn btn-outline-light btn-sm b1"><a href="login.php">Login</a></button>
<button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php">Sign in</a></button>
  <?php
}
  ?>
            </ul>
          </div>

  
            </div>
          </ul>
        </div>
      </div>
    </nav>
    <hr>
<h1 class= "headings"> Movies</h1>
<hr>

<div>
   <!--search bar -->
   <form class="form-inline search-bar">
            <input class="form-control searching mr-sm-2" type="text" onkeyup="search(this.value)" placeholder="Search" aria-label="Search" >
           
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <div id="content" class="search-movies"> </div>
            
            
            
          </form>
</div>

<form method = "post" action = "movieDetails.php">
    <div class="mainMovies mainpage">
    <div class="row movieRows showing-movies">
     
     <div class="col-lg-3 col-md-4 col-sm-6 zoom">
        <img src="images/movie posters/spiderman.jpg">
      <div class="movie-info">
          <p class="movie-title long"> Spiderman, No Way Home </p>
      </div>
      <p class="movie-details"> English | PG-13 </p>
      <p class="status"> Currently Showing </p>

      <button type="submit" name = "button1" value= 1 class="btn-book"> More Details </button>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 zoom">
        <img src="images/movie posters/uncharted.png">
      <div class="movie-info">
          <p class="movie-title"> Uncharted </p>
      </div>
      <p class="movie-details"> English | PG-15 </p>
      <p class="status"> Currently Showing </p>

      <button type="submit" name="button1" value =2  class="btn-book"> More Details </button>
    </div>

      
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <img src="images/movie posters/ambulance.png">
    <div class="movie-info">
        <p class="movie-title"> Ambulance </p>
    </div>
    <p class="movie-details"> English | PG-15 </p>
    <p class="status"> Currently Showing </p>
    <button type="submit" value =3 name="button1" class="btn-book">More Details </button>
  </div>
    
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <img src= "images/movie posters/red.webp">
      <div class= "movie-info">
        <p class= "movie-title"> Turning Red </p>
    </div>
    <p class="movie-details"> English | PG-15 </p>
    <p class="status"> Currently Showing </p>
    <button type="submit" value=4 name="button1" class="btn-book"> More Details</button>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <img src="images/movie posters/morbius.png">
    <div class="movie-info">
        <p class="movie-title"> Morbius </p>
  </div>
  <p class="movie-details"> English | PG-15 </p>
  <p class="status"> Upcoming </p>

  <button type="submit" name="button1" class="btn-book" value=5> More Details </button>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <img src="images/movie posters/shattered.jpg">
    <div class="movie-info">
        <p class="movie-title sonicTitle"> Shattered</p>
    </div>
    <p class="movie-details"> English | R-17 </p>
    <p class="status"> Upcoming </p>

    <button type="submit" name="button1" class="btn-book" value=6>More Details </button>
         </div>
         <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <img src="images/movie posters/pursuit.png">
    <div class="movie-info">
        <p class="movie-title"> Pursuit</p>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <p class="status"> Upcoming </p>

    <button type="submit" value=7 name="button1" class="btn-book"> More Details</button>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <img src="images/movie posters/wolf5.png">
      <div class="movie-info">
        <p class="movie-title"> Wolf 5 </p>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <p class="status"> Upcoming </p>

    <button type="submit" value=8 name="button1" class="btn-book"> More details</button>
  </div>
  </div>
</div>
</form>



    <div class="container-fluid footer">
    <div class="card mx-6">
      <div class="row mb-4 ">
        <div class="col-md-4 col-sm-11 col-xs-11">
          <div class="footer-text pull-left">
            <h1 style="color: #957bda">MoonLight</h1>
            <p class="card-text">You are always welcome to contact us using the details provided below.</p>
            <div class="social mt-2 mb-3"> <i class="fa fa-facebook-official fa-lg"></i> <i class="fa fa-instagram fa-lg"></i> <i class="fa fa-twitter fa-lg"></i> <i class="fa fa-linkedin-square fa-lg"></i> <i class="fa fa-facebook"></i> </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-1 mb-2"></div>
        <div class="col-md-2 col-sm-4 col-xs-4">
          <h5 class="heading">About</h5>
          <ul>
            <li>About Us</li>
            <li> Terms And Conditions</li>
            <li>Careers</li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4">
          <h5 class="heading">Help & Support</h5>
          <ul class="card-text">
            <li>Find Us</li>
            <li>FAQs</li>
            <li>Contact Us</li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4">
          <h5 class="heading">Explore Our Site</h5>
          <ul class="card-text">
            <li>What's On</li>
            <li>Coming Soon</li>
          </ul>
        </div>
      </div>
      <div class="divider mb-4"> </div>
      <div class="row" style="font-size:10px;">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="pull-left">
            <p><i class="fa fa-copyright"></i> 2020 MoonLight Cinema</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="pull-right mr-4 d-flex policy">
            <div>Terms of Use</div>
            <div>Privacy Policy</div>
            <div>Cookie Policy</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="Script/mov.js"></script>
  <script src="Script/searchName.js"></script> 
  <script src="https://kit.fontawesome.com/d1350f3485.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="Script/searchName.js"></script> 
</body>

</html>
