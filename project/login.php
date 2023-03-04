<?php


    include('connection.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" href="images/moon.png">
    <script src="https://kit.fontawesome.com/d1350f3485.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
                            <a class="nav-link" href="requestTopup.php">Top-up Requests</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Help
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="print.php">Print Tickets</a></li>
                                <li><a class="dropdown-item" href="#">Contact</a></li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </div>
                <div class="topbutton">
                    <button type="button" class="btn btn-outline-light btn-sm b1"><a href="login.php"  style="color: #957bda">Login</a></button>
                    <button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php"  style="color: #957bda">Signin</a></button>
                </div>

            </div>
        </nav>
    </div>
    <?php 
    if(!isset($_POST['login'])){

?>
    <div class="er">
        <br /><br />
        <h2>Welcome Back To The MoonLight Cinema</h2>
        <br /><br /><br /><br />
        <div class="log ">
            <form method="post" action="login.php">

                <div class="S col-sm-10 " style="display: inline-grid">
                    <label for="un ">Username </label> <br />
                    <input type="text" id="un" placeholder="Username" name="un" /><br />
                </div>

                <div class="S col-sm-10">
                    <label for="password">Password</label><br />
                    <input type="password" id="password" placeholder="Password" name="ps" /><br />
                </div>

                <input type="submit" class="btn btn-outline-light btn-sm" value="Login" name="login" id="log" b1l-4 />
            </form>
        </div>
    </div>
    <?php 
    }

    if(isset($_POST['login']))
    {
      $un = $_POST['un'];
      $ps = $_POST['ps'];

    //   $sql ="SELECT * from user where UserName = '".$_POST['un']."' AND Password = '". password_hash($_POST['ps'],PASSWORD_DEFAULT)."'";
      $sql ="SELECT * from user where UserName = '".$_POST['un']."'";
      $rs = $db->query($sql);
      $users = $rs->fetchAll(PDO::FETCH_ASSOC);
        $verified = true;
      if(count($users))
      {
        $user = $users[0];

          if(password_verify($ps, $user["Password"])){
 
          $_SESSION['id'] = $user["UserID"];
          $_SESSION['un'] = $un;
          $_SESSION['ps'] = $ps;
          $_SESSION['role'] = $user["role"];
          $_SESSION['loggedInUser'] = $user;
          

          $db = null;
          header('Location: index.php');
          }else{
            $verified = false;
          }
      }
      else
      {
        $verified = false;

      }
      if(!$verified){
        ?>
    <div class="er">


        <h2>Please enter valid information</h2><br />
        <div class="log">

            <form method="post" action="login.php">

                <div class="col-sm-10">
                    <label for="un ">Username </label> <br />
                    <input type="text" id="un" placeholder="Username" name="un" /><br />
                 
                </div>

                <div class="col-sm-10">
                    <label for="password">Password</label><br />
                    <input type="password" id="password" placeholder="Password" name="ps" /><br />
         

                </div>
                <div class="col-sm-10">
<?php
if(!$verified){
?>
                    <h6 class="invalid">Invalid username or Password</h6>

<?php
}
?>
                    <input type="submit" class="btn btn-outline-light btn-sm" value="Login" name="login" b1l-4 />

                </div>

        </div>
    </div>
    </form>

    <?php
          
          
      }
  }
    ?>





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