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
        // $id = $_SESSION['id'];
        // $role = $_SESSION['role'];
        // if($role != 'Admin'){
        //     die("You are not allowed to access this page!");

        // }
        if(isset($_POST['insert'])){
            $name=$_POST['name'];
            $language=$_POST['language'];
            $duration=$_POST['duration'];
            $rate=$_POST['rate'];
            $genre=$_POST['genre'];
            $status=$_POST['status'];
            $price=$_POST['price'];
            $seats=$_POST['seats'];
            $date=$_POST['dateM'];
            $poster=$_POST['poster'];
            $details=$_POST['details'];
            $stmt = $db->prepare("INSERT INTO movie (Name,Language,Duration, Rate, Genre, Status, TicketPrice, NoSeats, Date, Poster, Details) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        
            $stmt-> bindParam(1, $name );
            $stmt-> bindParam(2, $language);
            $stmt-> bindParam(3, $duration);
            $stmt-> bindParam(4, $rate);
            $stmt-> bindParam(5, $genre);
            $stmt-> bindParam(6, $status);
            $stmt-> bindParam(7, $price);
            $stmt-> bindParam(8, $seats);
            $stmt-> bindParam(9, $date);
            $stmt-> bindParam(10, $poster);
            $stmt-> bindParam(11, $details);

            if($stmt->execute()){
                echo "<h2 style= 'color:white'>" .$_SESSION['un'] ."</h2>";
                echo "<h2 style= 'color:white'> Movie is inserted successfully! </h2>";
            }
            else{
                echo "<h2 style= 'color:red'> Oh uh ! Movie has not been added! Try again later !</h2>";
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
        <title> Adding Movie </title>
    </head>
    <body>
        <button class="btn-book"><a href="index.php" >Back to Main </a> </button>
    </body>
    </html>

