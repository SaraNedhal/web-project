<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/moon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Movie Seat Booking</title>
    <link rel="icon" href="images/moon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/booking.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat:wght@900&family=Pacifico&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  </head>
  <body>
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
  


?>
<div class="d-flex gap-3 align-items-center">
<div>
<a href="profile.php" style="text-shadow: 0 0 2px #f2f1f5" >Welcome <?php echo $_SESSION["un"]; ?></a>
  </div>
  <a href="profile.php"><div class="profilePicture" style="background-image:url('images/profile/<?php echo $_SESSION["loggedInUser"]["profilePic"] ?>')"></div></a>
  
   <button type="button" class="btn btn-outline-light btn-sm b1"><a href="editProfile.php" style="color: #957bda; text-shadow: 0 0 2px #f2f1f5" > Edit Profile </a> </button>
   <button type="button" class="btn btn-outline-light btn-sm b1"><a href="Logout.php" style="color: #957bda; text-shadow: 0 0 2px #f2f1f5"> Log Out </a> </button>                           

</div>

  <?php
}else{

  ?>
<button type="button" class="btn btn-outline-light btn-sm b1"><a href="login.php" style="color: #957bda">Login</a></button>
<button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php" style="color: #957bda">Sign in</a></button>
  <?php
}
  ?>
</div>
</ul>
</div>



</form>

</div>
    </nav>


      <?php 
      if(!isset($_SESSION['un'])){
          header("location:login.php");
      }
      try {
          require('connection.php');
          }
          catch(PDOException $e){
            die($e->getMessage());
          }
               $id = $_SESSION['id'];
               $user =  $_SESSION['loggedInUser'];

        $stmt = $db->prepare("SELECT * FROM movie;");
        $stmt->execute();

      ?>
  <div class="movie-container">
      <form action="processBook.php" method="get">
      <p>Choose a movie:</p> 
      <select name="movies" id="movies" onchange="fetchDates(this.value);">
          <?php
          while($row=$stmt->fetch()){
           ?>
        <option value="<?php echo strVal($row['ID']); ?>"> <?php echo $row['Name'] .", ".$row['TicketPrice']; ?> </option>
    <?php 
} ?>
      </select>
      <br>
      <br>
      <p>Seats Number:</p><input type ="number" name ="seats" style = "width :150px;" >
      <p>Choose a Show Time:</p> 
      <div id="dates-container">
      
      </div>
      </select>
      <br> <br> <br>
      <button type ="submit" name="book" class="btn-book"> Book</button>
</form>
    </div>






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
    <script src="booking.js"></script> 
</body>
</html>