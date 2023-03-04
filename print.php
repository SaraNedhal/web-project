<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/moon.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
  <link rel="icon" href="images/moon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <title>Print Process</title>
</head>
<body>
    <?php 
    session_start();
    if(!isset($_SESSION['un'])){
       header("location:login.php");
      }
      try {
        require('connection.php');
        }
     catch(PDOException $e){
          die($e->getMessage());
        }
    $userid=$_SESSION['id'];
    $stmt = $db -> query("SELECT * FROM SEAT WHERE UID= $userid;");


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
            if(isset($_SESSION["un"])){
              

            
            ?>
<div class="d-flex gap-3 align-items-center">
<div>
    Welcome <?php echo $_SESSION["un"]; ?>
  </div>
  <div class="profilePicture" style="background-image:url('images/profile/<?php echo $_SESSION["loggedInUser"]["profilePic"] ?>')"></div>
  
</div>
        
              <?php
            }
            else{

              ?>
      <button type="button" class="btn btn-outline-light btn-sm b1"><a href="login.php">Login</a></button>
      <button type="button" class="btn btn-outline-light btn-sm b1"><a href="signin.php">Sign in</a></button>
              <?php
            }
              ?>
            </div>
          </ul>
        </div>
          </nav>
  
<h3 class="headings" style= 'padding-top:5%;'>   <?php echo " ".$_SESSION['un'] ?> Tickets: </h3>
<table class="table-admin" cellpadding="25"
       cellspacing="10"> 
    <tr>
       <th> Ticket ID </th> 
       <th> Movie ID </th> 
       <th> Date </th>
       <th> Choice </th> 
 
    </tr>
    <form method = "post" action = "viewTicket.php">

    <?php 
    while($row = $stmt->fetch()){ ?>
    <tr>
        <td> <?php echo $row['SeatID']; ?> </td>
        <td> <?php echo $row['uId']; ?> </td>
        <td> <?php echo $row['showDate']; ?> </td>
        <td> <button type="submit" name="print" value=" <?php echo $row['id']; ?>" class="btn-book"> Print</button>
    </td>

    </tr>

  <?php 
  } ?>
</form>
</body>
</html>