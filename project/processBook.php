<?php 
session_start();
      try {
          require('connection.php');
          }
          catch(PDOException $e){
            die($e->getMessage());
          }
          if(isset($_GET['book'])){
         $id = $_SESSION['id'];
         $user =  $_SESSION['loggedInUser'];
         $mid = $_GET['movies'];
         $numSeats = $_GET['seats'];
         $time = explode( ",", $_GET['time']);
         $sql = $db->query("SELECT * FROM MOVIE WHERE ID = $mid");
         while($row=$sql->fetch()){
             $price = $row['TicketPrice'];
         }
         $amount = $price * $numSeats;
         $deducted = $user['Balance'] - $amount;
         $updateSql = $db->query("UPDATE user SET Balance = '$deducted' WHERE UserID = $id; ");

         $stmt = $db->prepare("INSERT INTO SEAT (uid,mid,showDate, showTime ) VALUES (?,?,?,?)");
         $stmt-> bindParam(1, $id );
         $stmt-> bindParam(2, $mid);
         $stmt-> bindParam(3, $time[0]);  
         $stmt-> bindParam(4, $time[1]);     
         if($stmt->execute()){
            echo "<h2 style= 'color:white'>" .$_SESSION['un'] ."</h2>";
            echo "<h2 style= 'color:white'> Your have booked successfully! </h2>";
        }
        else{
            echo "<h2 style= 'color:red'> Oh uh ! Your booking process has failed! Try again later !</h2>";
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
    

