<?php

error_reporting(E_ERROR | E_PARSE); 

session_start();

if(!isset($_SESSION['un'])){
  header("location:login.php");
}
try {
    require('connection.php');

    if(isset($_POST["submitForm"])){

$errorSamePass = "";
$successMessage = "";

$name = $_POST["name"];
$NameL = $_POST["NameL"];
$un = $_POST["un"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$ps = $_POST["ps"];
$confirmPassword = $_POST["confirmPassword"];
$profilePicturePath = "";
$target_dir = "images/profile/";
$target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(!empty($_FILES['profilePicture']['name'][0])) {
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $errorSamePass = "File is not an image";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $errorSamePass = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $errorSamePass = "Sorry, your file was not uploaded.";
    } else {
        
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
        $profilePicturePath = $_FILES["profilePicture"]["name"];
        // $errorSamePass = "The file ". htmlspecialchars( basename( $_FILES["profilePicture"]["name"])). " has been uploaded.";
    } else {
        $errorSamePass = "Sorry, there was an error uploading your file.";
    }
    }
}
$columnToField = [
  [$name,"FName"],
  [$NameL,"LName"],
  [$un,"UserName"],
  [$email,"Email"],
  [$phone,"TelNum"],
  [$ps,"Password"],
  [$profilePicturePath,"profilePic"],
];


if(trim($ps) != "" && $ps != $confirmPassword){
  $errorSamePass = "The confirm password doesnt match";
}else if($errorSamePass == ""){
    $updateRequired = false;
    $sqlQuery = "";

    $statements = [];

  foreach ($columnToField as $key => $value) {
      if(trim($value[0]) != ""){
        if(!$updateRequired){
            $updateRequired = true;
            $sqlQuery = "UPDATE `user` SET ";
        }

        $statements []= "$value[1] = '".($value[1] == "Password"?password_hash($value[0], PASSWORD_DEFAULT):$value[0])."'";

      }
  }
      $sqlQuery .= (join(", ",$statements))." ".(count($columnToField) == ($key+1)?" WHERE UserID = ".$_SESSION["loggedInUser"]["UserID"]:"");

  try{
  $r = $db->exec($sqlQuery);
  $successMessage = "Profile Update";

  $sql ="SELECT * from user where UserID = ".$_SESSION["loggedInUser"]["UserID"];
  $rss = $db->query($sql);
  $users = $rss->fetchAll(PDO::FETCH_ASSOC);

  $user = $users[0];

  $_SESSION['id'] = $user["UserID"];
  $_SESSION['un'] = $un;
  $_SESSION['ps'] = $ps;
  $_SESSION['role'] = $user["role"];
  $_SESSION['loggedInUser'] = $user;
}
catch(PDOException $ex) 
{
  
$errorSamePass = $ex->getMessage();
}
}


// UPDATE `user` SET `FName` = 'Osam', `LName` = 'Ahmedd', `UserName` = 'osama123d', `Password` = 'hello123L', `Gender` = 'F', `DOB` = '2000-07-10', `Email` = 'osama123@gmail.come', `TelNum` = '36626556', `Balance` = '0', `profilePic` = 'osama.jpgg' WHERE `user`.`UserID` = 1

    }
    
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
    <title>Edit your profile</title>
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
                                href="login.php">Login</a></button>
                        <button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php">Sign
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

        <div class="edit">
            <br />
            <div>
                <h2 style="text-shadow: 0 0 2px #f2f1f5">Edit Profile</h2>
            </div>
            
            <div class="container" style="height: 950px;">
                <form method="POST" class="row" style="justify-content: center" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    
                    <div class="col-md-3"  style="width: 50%;margin: 0 auto">
                        <div class="text-center">
                        <label >Profile Picture </label>
                            <img src="images/profile/<?php echo $_SESSION["loggedInUser"]["profilePic"] != ""?$_SESSION["loggedInUser"]["profilePic"]:"no-picture.jpg" ?>" class="avatar img-circle img-thumbnail"
                                alt="avatar">
                            <br /><br />
                            <input type="file" name="profilePicture" class="form-control"><br />
                        </div>
                    </div>

                   
                    <div class="col-md-9 personal-info" style="justify-content: center;display: grid;">
                        <div class="col-sm-10">
                            <label for="Name">First Name </label>
                            <input type="text" id="Name" class="form-control mb-2" placeholder="First Name"
                                name="name" />
                            <small></small>
                        </div>

                        <div class="col-sm-10">
                            <label for="NameL">Last Name </label>
                            <input type="text" id="NameL" class="form-control mb-2" placeholder="Last Name"
                                name="NameL" />
                            <small></small>
                        </div>

                        <div class="col-sm-10">
                            <label for="un">Username </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" id="un" class="form-control mb-2" placeholder="Username" name="un" />
                                <small></small>
                            </div>

                        </div>


                        <div class="col-sm-10">
                            <label for="email">Email </label>
                            <input type="text" id="email" class="form-control mb-2" placeholder="name@gmail.com"
                                name="email" />
                            <small></small>
                        </div>
                        <div class="col-sm-10">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" class="form-control mb-2" placeholder="+973 33333333"
                                name="phone" />
                            <small></small>
                        </div>




                        <div class="col-sm-10">
                            <label for="password">Password </label>
                            <input type="password" id="password" class="form-control" name="ps" />
                            <small></small>
                        </div>



                        <div class="col-sm-10">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" />
                            <small></small><br />
                        </div>
                        <div class="col-sm-10" style="color:crimson">
                            <?php echo $errorSamePass; ?>
                        </div>
                        <div class="col-sm-10" style="color:green">
                            <?php echo $successMessage; ?>
                        </div>
                        <div class="col-sm-10 update">
                            <input type="submit" class="btn btn-outline-light btn-sm" value="Update Info" b1l-4
                                name="submitForm" /><br />
                        </div>
                    </div>

                </form>
                <!-- </form> -->
            </div>


        </div>


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