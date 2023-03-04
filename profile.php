<?php

error_reporting(E_ERROR | E_PARSE); 

session_start();

if(!isset($_SESSION['un'])){
  header("location:login.php");
}
try {
    require('connection.php');
    $info=$_SESSION['loggedInUser'];
}
   catch(PDOException $e){
    die($e->getMessage());
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="icon" href="images/moon.png">
    <script src="https://kit.fontawesome.com/d1350f3485.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/s.css">

</head>

<body>


    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="images/moon.png" alt> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Help
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Contact</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        </li>
                    </ul>
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



                        </div>

                        <?php
}else{

  ?>
                        <button type="button" class="btn btn-outline-light btn-sm b1"><a
                                href="login.php" style="text-shadow: 0 0 2px #f2f1f5">Login</a></button>
                        <button type="button" class="btn btn-outline-light btn-sm b1" style="text-shadow: 0 0 2px #f2f1f5"><a href="signin.php">Sign
                                in</a></button>
                        <?php
}
  ?>
                    </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div>
        
<div class="v" style="height:550px; background-color: #212529;">

<br/>



  <div class="inFO d-flex justify-content-center">
  
  <div class="info"style="background-color:#957bda" >
   <div class="d-flex gap-3 align-items-center d-flex justify-content-center">  
<div class="profilePicture" id="pic"style="background-image:url('images/profile/<?php echo $_SESSION["loggedInUser"]["profilePic"] ?>')"></div>
</div>   
  <div class="card-header">

  <h2 style="text-shadow: 0 0 2px #f2f1f5"><?php echo $_SESSION["un"]; ?>'s Profile</h2>
  </div>
  
  <div class="card-body">
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">Username: <?php echo $_SESSION["un"]; ?></h5>
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">First Name: <?php echo $info['FName']; ?></h5>
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">Last Name: <?php echo $info['LName']; ?></h5>
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">Gender: <?php echo $info['Gender']; ?></h5>
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">Email: <?php echo $info['Email']; ?></h5>
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">Phone: <?php echo $info['TelNum']; ?></h5>
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">birthday: <?php echo $info['DOB']; ?></h5>
    <h5 class="card-title" style="text-shadow: 0 0 2px #f2f1f5">Balance: <?php echo $info['Balance']; ?> BD</h5>
    <div class="bs">
   <button type="button" class="btn btn-outline-light btn-sm b1" style="text-shadow: 0 0 2px #f2f1f5"><a href="editProfile.php" > Edit Profile </a> </button>
  </div>
  </div>
</div>
 </div>  
 
 </div>          
    <div class="container-fluid footer" id="footer">
        <div class="card mx-6">
            <div class="row mb-4 ">
                <div class="col-md-4 col-sm-11 col-xs-11">
                    <div class="footer-text pull-left">

                        <h1 style="color: #957bda">MoonLight</h1>
                        <p class="card-text">You are always welcome to contact us using the details provided below.</p>
                        <div class="social mt-2 mb-3"> <i class="fa fa-facebook-official fa-lg"></i> <i
                                class="fa fa-instagram fa-lg"></i> <i class="fa fa-twitter fa-lg"></i> <i
                                class="fa fa-linkedin-square fa-lg"></i> <i class="fa fa-facebook"></i> </div>
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
                        <li>Whats On </li>
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
    </footer>
</body>

</html>