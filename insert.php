
<?php 


session_start();

        $id = $_SESSION['id'];
        $role = $_SESSION['role'];
        if($role != "Admin"){
            die("You are not allowed to access this page!");

        }

?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v6.0.0/js/all.js" integrity="sha384-l+HksIGR+lyuyBo1+1zCBSRt6v4yklWu7RbG0Cv+jDLDD9WFcEIwZLHioVB4Wkau" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/s.css">
  <link rel="stylesheet" href="css/req.css">
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
            if(isset($_SESSION["un"])){
              

            
            ?>
<div class="d-flex gap-3 align-items-center">
<div>
    Welcome <?php echo $_SESSION["un"]; ?>
  </div>
  <div class="profilePicture" style="background-image:url('images/profile/<?php echo $_SESSION["loggedInUser"]["profilePic"] ?>')"></div>
  
   <button type="button" class="btn btn-outline-light btn-sm b1"><a href="editProfile.php"> Edit Profile </a> </button>
                               
</div>
        
              <?php
            }else{

              ?>
      <button type="button" class="btn btn-outline-light btn-sm b1"><a href="login.php">Login</a></button>
      <button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php">Sign in</a></button>
              <?php
            }
              ?>
            </div>
          </ul>
        </div>
     




      </div>
    </nav>
    <h2 class="headings"> Add a Movie </h2>
    <div class="add-movie" > 

       <div class="container">
        <div class = "request">

      <form method="post" id="form" class="form" action="insertProcess.php">
      <div class="S">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="movie name" >
    <small>Error message</small><br>
        </div><br>

    
       <div class="S">
    <label for="lang">Laguage:</label>
    <input type="text" id="lang" name="lang" placeholder="movie laguage">
    <small>Error message</small><br>
       </div><br>

    
      <div class="S">
    <label for="duration">Duration:</label>
    <input type="text" id="duration" name="duration" placeholder="duration">
    <small>Error message</small><br>
        </div><br>

        <div class="S">
    <label for="rate">Rate:</label>
    <input type="decimal" id="rate" name="rate" placeholder="Only 0 is allowed" min=0 max=0>
    <small>Error message</small><br>
        </div><br>

    <div class="S">
    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" >
    <small>Error message</small><br>
        </div><br>

      <div class="S">
    <label for="status">Status:</label>
    <input type="text" name="status" id="status">
    <small>Error message</small><br>
        </div><br>

       <div class="S">
    <label for="ticketPrice">ticket Price:</label>
    <input type="decimal" id="ticketPrice" name="ticketPrice"   >
    <small>Error message</small><br>
        </div><br>

        <div class="S">
    <label for="NOseats">Number of seats:</label>
    <input type="number"  name="NOseats" id="NOseats"  >
    <small>Error message</small><br>
        </div><br>



       <div class="S">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" ><br>
    <small>Error message</small>
        </div><br>

       <div class="S">
    <label for="poster">Poster: </label>
    <input type="text" id="poster" name="poster" placeholder="e.g. XXX.jpg"><br>
    <small>Error message</small>
        </div><br>
   

      <div class="S">
    <label for="details">Details:</label>
    <textarea id="details" name="details" placeholder="e.g. The movie is around Peter Parker who struggles to confront the world when everyone is aware of his identity
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut, tempore tenetur, reprehenderit excepturi porro repellat dolorem optio ad molestias harum veniam repellendus ipsa nulla! Provident aut corporis sit dolore reprehenderit.." style="height:200px"></textarea>
    <small>Error message</small><br>
        </div><br>

<br><br>
      <input type="submit" name="insert" value="submit"   class="btn-book" >
 

          </form>
          </div> 
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

  <script src="script.js"></script>
 
 </body>
</html>

