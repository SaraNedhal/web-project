<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/movieDetails.css">

  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">

  <title>Movie Details</title>
</head>

<body>
  <?php 
  if(isset($_POST['button1'])){
    $mid = $_POST['button1'];

  }
  ?>

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
<button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php">Sign Up</a></button>
  <?php
}
  ?>
            </ul>
          </div>
      </div>
    </nav>
      
  
        </div>
      </nav>
    </div>
  

<?php 

try {

 require('connection.php');
    }
   catch (PDOException $e) {
      die("Error: ".$e->getMessage());
  }
  $stmt= $db->prepare("SELECT * FROM movie where id= ?");
// $stmt->bindParam(1, 1);
 $stmt->bindParam(1, $mid);
  $stmt->execute();

while($row = $stmt->fetch()){
  $name = $row[1];
  $language = $row[2];
  $duration = $row[3];
  $rate = $row[4];
  $genre = $row[5];
  $status = $row[6];
  $ticket = $row[7];
  $seats = $row[8];
  $date = $row[9];
  $poster = $row[10];
  $details= $row[11];


}

 ?>

<div class="title mt-5"> <h2 > <?php  echo "$name";?> </h2>   </div>
<div class="container-fluid ">


<div class="container">

    <div class="row">

      <div class="col-sm-12 col-md-5 col-lg-5">
        <div class="fill"><?php echo '<img src="images/Movie posters/'.$poster.'">';?></div>
       
        </div>
       


      <div class="col-sm-12 col-md-7 col-lg-7">
          <div class="mybox">
            <h3>Movie Details:</h3>

            <h5 style="display:inline"><b>Language: </b> </h5> <h6 style="display:inline"><?php echo "$language";?></h6><br>

            <h5 style="display:inline"><b>Genre: </b> </h5> <h6 style="display:inline"><?php  echo "$genre";?></h6><br>

            <h5 style="display:inline"><b>Status: </b> </h5> <h6 style="display:inline"><?php   echo "$status";?></h6><br>

            <h5 style="display:inline"><b>Release Date: </b> </h5> <h6 style="display:inline"><?php   echo "$date";?></h6><br>

           <p style="padding:2%; font-size:25px;"> <?php   echo "$details";?></p> <br>
           
           

            <h4 ><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
           </svg> <?php echo "$duration h";?>  <button type="button" class="btn-book"> <a href="booking.php">Get Tickets </a></button></h4> 

           <h4><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-ticket-perforated" viewBox="0 0 16 16">
           <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"/>
           <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z"/>
           </svg> <?php echo "$ticket".' BD ';?> </h4>  

         

    
      </div>
 

    </div>

  </div>

  
</div>
<?php 
if(isset($_SESSION['un'])){
?>
<div class = "comments"> 
  <hr>
  <h3 class = "headings"> Comments</h3>
  <form action="processComment.php" method="post">
<div>
 <p class="type-a-comment"> Type a Comment: </p>
<textarea name="comments" id="comments" style="font-family:sans-serif;font-size:1.2em; ">
</textarea>
</div>
<button name="comment" type="submit" value="<?php echo $mid ?>" class="comment-button" > Comment </button>
</form>
</div>
<?php } ?>
<hr>
<div class = "view-comments">
  <?php 
  $sql = $db->query("SELECT * FROM COMMENT;");
  while($row=$sql->fetch()){

   ?>
  <p class= "user username" style="font-weight:bold;" > <?php echo $row['username']; ?> </p>
  <p class= "user actual" style="background-color: rgba(145, 92, 182, 0.5); padding:2%; margin:2%;"> <?php echo $row['text']; ?> </p>
  <hr>
<?php 
  }
?>
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
<script src="Script/searchName.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>

</html>




