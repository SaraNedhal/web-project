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


         $id = $_SESSION['id'];
         $role = $_SESSION['role'];
         if($role != 'Admin'){
           die("You are not allowed to access this page!");

        }
$stmt = $db -> query("SELECT * FROM TOPUP;");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/moon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel = "stylesheet" href= "css/styles.css">

    <title>Top-up Review</title>
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
<h1 class="headings"> Hello, admin <?php echo " ".$_SESSION['un'] ?></h1>
<h2 class= "headings"> Top-up Requests:  </h2>
<table class= "table-admin" cellpadding="25"
       cellspacing="10"> 
    <tr>
       <th> Top-up Id </th> 
       <th> User Id </th> 
       <th> Status </th> 
       <th> Date</th> 
       <th> Accept</th> 


    </tr>
    <form method = "post" action = "requestAcceptDeleteProcess.php">

    <?php 
    while($row = $stmt->fetch()){
      if( $row['statusR'] !="Accepted" ){
      ?>
    <tr>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['userid']; ?> </td>
        <td> <?php echo $row['statusR']; ?> </td>
        <td> <?php echo $row['dateR']; ?> </td>
        <td><button class="btn-book accept" type = 'submit' name ='btn-accept' value="<?php echo $row['userid'];?>" onclick="accept()"> Yes </button>
        <button class="btn-book reject" type = 'submit' name ='btn-delete' value="<?php echo $row['userid'];?>"  onclick= "reject()"> No</button></td>


    </tr>

  <?php 
  }} ?>

</table>

</form>
<script>
function accept() {
  alert("Are you sure you want to accept these requests?");
}
function reject() {
  alert("Are you sure you want to delete these requests?");
}
</script>

    
</body>
</html>