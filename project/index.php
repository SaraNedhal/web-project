<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Moonlight Cinema</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
              <a class="nav-link" href="movies.php">Movies</a>

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
  $user = $_SESSION['loggedInUser'];
  $role = $user['role'];
  
?>
<div class="d-flex gap-3 align-items-center">
<div>
<a href="profile.php" style="text-shadow: 0 0 2px #f2f1f5" >Welcome <?php echo $_SESSION["un"]; ?></a>
  </div>
  <a href="profile.php"><div class="profilePicture" style="background-image:url('images/profile/<?php echo $_SESSION["loggedInUser"]["profilePic"] ?>')"></div></a>
  
   <button type="button" class="btn btn-outline-light btn-sm b1"><a href="editProfile.php" style="color: #957bda; text-shadow: 0 0 2px #f2f1f5" > Edit Profile </a> </button>
   <button type="button" class="btn btn-outline-light btn-sm b1"><a href="Logout.php" style="color: #957bda; text-shadow: 0 0 2px #f2f1f5"> Log Out </a> </button>                           
 <?php 
 if($role =="Admin") { ?>
   <button type="button" class="btn btn-outline-light btn-sm b1"><a href="admin.php" style="color: #957bda; text-shadow: 0 0 2px #f2f1f5"> Admin </a> </button>                           
<?php
 } 
?>
</div>

  <?php
}else{

  ?>
<button type="button" class="btn btn-outline-light btn-sm b1"><a href="login.php" style="color: #957bda">Login</a></button>
<button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php" style="color: #957bda">Sign Up</a></button>
  <?php
}
  ?>
</div>
 
</ul>
</div>



</form>

</div>
    </nav>



    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="images/carousel movie pictures/turning red.png" class="d-block w-100" alt="turning red cover">
          <div class="carousel-movie1">
            <h1>Turning Red</h1>
            <div class="movie-genre">
              <h6>Fantasy | Comedy | Drama </h6>
            </div>
            <div class="time-icon">
              <i class='far fa-clock'>
                <h6> 1h 40m</h6>
              </i>
            </div>
            <p>A 13-year-old girl named Meilin turns into a giant red panda whenever she gets too excited.</p>
          </div>

          <div class="row">
            <div class="col col-md-4 col-lg-12">
              <button type="button" name="button1" class="btn-book1"><a href="booking.php">BOOK NOW </a></button>
              <button type="button" name="button2" class="btn-trailer2">
                <a href="#video-red" id="red"><i class="fa fa-play-circle"></i> WATCH TRAILER</a>
              </button>
              <div id="video-red" class="mfp-hide" style="max-width: 75%; margin: 0 auto;">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/XdKzUbAiswE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
              </div>

            </div>
          </div>
          <script>
            $('#red')
              .magnificPopup({
                type: 'inline',
                midClick: true
              })
          </script>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="images/carousel movie pictures/spider man.png" class="d-block w-100" alt="Spiderman cover">
          <div class="carousel-movie1">
            <h1>Spider Man: No Way Home</h1>
            <div class="movie-genre">
              <h6>Action | Adventure | Fantasy | Sci-Fi</h6>
            </div>
            <div class="time-icon">
              <i class='far fa-clock'>
                <h6> 2h 28m </h6>
              </i>
            </div>
            <p>Spider-Man: No Way Home revolves
              around Peter Parker who struggles to confront the world when everyone
              is aware of his identity. </p>

            <div class="row">
              <div class="col">
                <button type="button" name="button1" class="btn-book3"><a href="booking.php">BOOK NOW </a></button>
                <button type="button" name="button2" class="btn-trailer4">
                  <a href="#video-spiderman" id="videolink-spiderman"><i class="fa fa-play-circle"></i> WATCH
                    TRAILER</a>
                </button>
                <div id="video-spiderman" class="mfp-hide" style="max-width: 75%; margin: 0 auto;">
                  <iframe width="853" height="480" src="https://www.youtube.com/embed/JfVOs4VSpmA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
              </div>

            </div>
            <script>
              $('#videolink-spiderman')
                .magnificPopup({
                  type: 'inline',
                  midClick: true
                })
            </script>


          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carousel movie pictures/morbius.png" class="d-block w-100" alt="morbius cover">
          <div class="carousel-movie1">
            <h1>Morbius</h1>
            <div class="movie-genre">
              <h6>Action | Adventure | Fantasy | Horror</h6>
            </div>
            <div class="time-icon">
              <i class='far fa-clock'>
                <h6> 1h 48m </h6>
              </i>
            </div>
            <p>Biochemist Michael Morbius tries to cure himself of a rare blood disease,
              but he inadvertently infects himself with a form of vampirism instead.</p>
            <div class="row">
              <div class="col">
                <button type="button" name="button1" class="btn-book3">PRE-BOOK</button>
                <button type="button" name="button2" class="btn-trailer4">
                  <a href="#video-morbius" id="videolink-morbius"> <i class="fa fa-play-circle"></i> WATCH TRAILER</a>
                </button>
                <div id="video-morbius" class="mfp-hide" style="max-width: 75%; margin: 0 auto;">
                  <iframe width="853" height="480" src="https://www.youtube.com/embed/oZ6iiRrz1SY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
              </div>

            </div>
            <script>
              $('#videolink-morbius')
                .magnificPopup({
                  type: 'inline',
                  midClick: true
                })
            </script>

          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carousel movie pictures/ambulance.png" class="d-block w-100" alt="Ambulance cover">
          <div class="carousel-movie1">
            <h1>Ambulance</h1>
            <div class="movie-genre">
              <h6>Action | Crime | Thriller</h6>
            </div>
            <div class="time-icon">
              <i class='far fa-clock'>
                <h6> 2h 16m </h6>
              </i>
            </div>
            <p>Two robbers steal an ambulance after their heist goes away</p>
            <div class="row">
              <div class="col">
                <button type="button" name="button1" class="btn-book3"><a href="booking.php"> BOOK NOW </a></button>
                <button type="button" name="button2" class="btn-trailer4">
                  <a href="#video-ambulance" id="videolink-ambulance"> <i class="fa fa-play-circle"></i> WATCH TRAILER
                  </a>
                </button>
                <div id="video-ambulance" class="mfp-hide" style="max-width: 75%; margin: 0 auto;">
                  <iframe width="853" height="480" src="https://www.youtube.com/embed/7NU-STboFeI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
              </div>

            </div>
            <script>
              $('#videolink-ambulance')
                .magnificPopup({
                  type: 'inline',
                  midClick: true
                })
            </script>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carousel movie pictures/the batman.png" class="d-block w-100" alt="The Batman cover">
          <div class="carousel-movie1">
            <h1>The Batman</h1>
            <div class="movie-genre">
              <h6>Action | Crime | Mystery</h6>
            </div>
            <div class="time-icon">
              <i class='far fa-clock'>
                <h6> 2h 56m </h6>
              </i>
            </div>

            <p>
              Batman is forced to investigate the city's hidden corruption
              when The Riddler, a serial killer, starts murdering political figures in Gotham.</p>
            <div class="row">
              <div class="col">
                <button type="button" name="button1" class="btn-book3"><a href="booking.php">BOOK NOW </a></button>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
                <button type="button" name="button2" class="btn-trailer4">
                  <a href="#video-bat" id="videolink-bat"> <i class="fa fa-play-circle"></i> WATCH TRAILER</a>
                </button>
                <div id="video-bat" class="mfp-hide" style="max-width: 75%; margin: 0 auto;">
                  <iframe width="853" height="480" src="https://www.youtube.com/embed/mqqft2x_Aa4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                </div>
              </div>

            </div>
            <script>
              $('#videolink-bat')
                .magnificPopup({
                  type: 'inline',
                  midClick: true
                })
            </script>
          </div>
        </div>
      </div>
      <button class="carouselControl carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carouselControl carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!--copy until here
    NOTE: the end of the carousel code-->

  <!-- Main -->
  <div class="stars"></div>
  <div class="stars2"></div>
  <div class="stars3"></div>






  <div class="mainpage">

    <h2> Welcome to Moonlight Cinemas !</h2>
    <ul class="tabs" >
      <li class="showing active" data-cont=".showing-movies"> Currently Showing
      </li>
      <li class="upcoming" data-cont=".comingsoon"> Coming Soon
      </li>
   </ul>
    <div class="row movieRows showing-movies">
     
     <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <a href="movie1.php">
        <img src="images/movie posters/spiderman.jpg">
      </a>
      <div class="movie-info">
        <a href="#">
          <p class="movie-title long"> Spiderman, No Way Home </p>
        </a>
      </div>
      <p class="movie-details"> English | PG-13 </p>
      <button type="button" class="btn-book"> <a href="booking.php">Get Tickets </a></button>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <a href="#">
        <img src="images/movie posters/uncharted.png">
      </a>
      <div class="movie-info">
        <a href="#">
          <p class="movie-title"> Uncharted </p>
        </a>
      </div>
      <p class="movie-details"> English | PG-15 </p>
      <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
    </div>


      
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/ambulance.png">
    </a>
    <div class="movie-info">
      <a href="#">
        <p class="movie-title"> Ambulance </p>
      </a>
    </div>
    <p class="movie-details"> English | PG-15 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>
    
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src= "images/movie posters/red.webp">
    </a>
    <div class= "movie-info">
      <a href="#">
        <p class= "movie-title"> Turning Red </p>
      </a>
    </div>
    <p class="movie-details"> English | PG-15 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>

 

    <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <a href="#">
        <img src="images/movie posters/the batman.webp">
        <div class="movie-info">
          <p class="movie-title"> The Batman </p>
      </a>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <button type="button" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>



    <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <a href="#">
        <img src="images/movie posters/maali mama.webp">
      </a>
      <div class="movie-info">
        <a href="#">
          <p class="movie-title"> Maali Mama </p>
        </a>
    </div>
    <p class="movie-details"> Arabic | PG-13 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <a href="#">
        <img src="images/movie posters/sonic.png">
      </a>
      <div class="movie-info">
        <a href="#">
          <p class="movie-title sonicTitle"> Sonic the Hedgehog 2</p>
        </a>
      </div>
      <p class="movie-details"> English | PG-13 </p>
      <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <a href="#">
        <img src="images/movie posters/slapface.png">
      </a>
      <div class="movie-info">
        <a href="#">
          <p class="movie-title"> Slapface </p>
        </a>
      </div>
      <p class="movie-details"> English | R-18 </p>
      <button type="button" class="btn-book"><a href="booking.php">Get Tickets </a></button>
    </div>

  </div>


  <div class="row comingsoon movieRows none">
    <div class="col-lg-3 col-md-4 col-sm-6 zoom">
      <a href="#">
        <img src="images/movie posters/checkered-ninja-3.webp">
        <div class="movie-info">
          <p class="movie-title"> Checkered Ninja 3 </p>
      </a>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/pursuit.png">
    </a>
    <div class="movie-info">
      <a href="#">
        <p class="movie-title"> Pursuit</p>
      </a>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>

  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/the lockdown huntings.webp">
    </a>
    <div class="movie-info">
      <a href="#">
        <p class="movie-title"> The Lockdown Huntings </p>
      </a>
    </div>
    <p class="movie-details"> English | PG-15 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/dcpets.webp">
    </a>
    <div class= "movie-info">
      <a href="#">
        <p class= "movie-title" style="font-size:17px;"> DC League of Super Pets</p>
      </a>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <button type="button" name="button1" class="btn-book">Get Tickets</button>
  </div>

  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/fantastic-beasts.webp">
    </a>
    <div class="movie-info">
      <a href="#">
        <p class="movie-title long"> Fantastic Beasts: The Secrets of Dumbledore </p>
      </a>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>

  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/morbius.png">
    </a>
    <div class="movie-info">
      <a href="#">
        <p class="movie-title"> Morbius </p>
      </a>
  </div>
  <p class="movie-details"> Arabic | PG-13 </p>
  <button type="button" name="button1" class="btn-book"> <a href="booking.php">Get Tickets </a></button>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/shattered.png">
    </a>
    <div class="movie-info">
      <a href="#">
        <p class="movie-title sonicTitle"> Shattered</p>
      </a>
    </div>
    <p class="movie-details"> English | R-17 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>

  <div class="col-lg-3 col-md-4 col-sm-6 zoom">
    <a href="#">
      <img src="images/movie posters/wolf5.png">
    </a>
    <div class="movie-info">
      <a href="#">
        <p class="movie-title"> Wolf 5 </p>
      </a>
    </div>
    <p class="movie-details"> English | PG-13 </p>
    <button type="button" name="button1" class="btn-book"><a href="booking.php">Get Tickets </a></button>
  </div>
  </div>
</div>






  <div class="container-fluid promotop">
    <div class="row ">
      <div class="col-lg-5 col-md-5 col-sm-12 top d-flex flex-column gap-3 ">
        <h4> Top 3 movies: </h4>
        <a href="#">
          <div class="topthreeborder zoom">
            <div class="row topthree">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="images/top/top1.png" height="50px">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 ">
                <p> Spiderman, No Way Home </p>
              </div>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="topthreeborder zoom">
            <div class="row topthree">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="images/top/top2.jpg" height="50px">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <p> Uncharted </p>
              </div>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="topthreeborder zoom">
            <div class="row topthree">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="images/top/top3.jpg" height="50px">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <p> Turning Red </p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-6 col-md-5 col-sm-12 promo">
        <h4> Promotions: </h4>
        <div class="row">
          <div class="col-lg-6">
            <img src="images/promotions/offer1.webp" height="100px">
          </div>
          <div class="col-lg-6">
            <p> Buy one ticket and get one for free on Mondays! </p>
            <button type="button" class="btn btn-outline-light btn-sm">Read more</button>
          </div>
        </div>
        <div>
          <h1></h1><br /></h1>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <img src="images/promotions/offer2.jpg" height="100px">
          </div>
          <div class="col-lg-6">
            <p> Offer for students! Free Nachos! </p>
            <button type="button" class="btn btn-outline-light btn-sm">Read more</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="exp">
    <h2> Our cinema experience is Moonlighty ! </h2>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 mybox">
        <a href="#">
          <div class="box">
            <img src="images/promotions/food.webp" alt="food">
          </div>
          <div class="centered">
            <h1>Food & Drinks</h1>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6 mybox">
        <a href="#">
          <div class="box">
            <img src="images/experience/exp1.png" alt="locations">
          </div>
          <div class="centered">
            <h1>Locations</h1>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Footer -->
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
  <script src="Script/main.js"></script>
  <script src="https://kit.fontawesome.com/d1350f3485.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="Script/searchName.js"></script>

</body>

</html>
