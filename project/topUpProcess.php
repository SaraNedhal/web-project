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

if(isset($_POST['submit'])){
  date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-y h:i:s');
      $status="unprocessed";

 

    $stmt = $db->prepare("INSERT INTO topup (userid, statusR , dateR) VALUES (? , ? , ? )");
    $stmt-> bindParam(1, $userid);
    $stmt-> bindParam(2, $status);
    $stmt-> bindParam(3, $date);
    if($stmt->execute()){
        echo "<h2 style= 'color:white'>" .$_SESSION['un'] ."</h2>";
        echo "<h2 style= 'color:white'> Your top up order has been sent successfully! </h2>";
    }
    else{
        echo "<h2 style= 'color:red'> Oh uh ! Your top up order has not been added! Try again later !</h2>";
    }
  }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href= "css/styleBook.css">
        <title> Processing</title>
    </head>
    <body>
        <button class="btn-book"><a href="index.php" >Back to Main </a> </button>
    </body>
    </html>



      