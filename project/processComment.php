<?php 
session_start();
if(!isset($_SESSION['un'])){
    echo "You must login first";
    header("location:login.php");
}
try {
    require('connection.php');
    }
    catch(PDOException $e){
      die($e->getMessage());
    }
    if(isset($_POST['comment'])){
        $comment = $_POST['comments'];
        $mid = $_POST['comment'];
        $uid = $_SESSION['id'];
        $stmt = $db->prepare("INSERT INTO COMMENT (text,uid,mid, username) VALUES (?,?,?,?)");
        $stmt-> bindParam(1, $comment);
        $stmt-> bindParam(2, $uid);
        $stmt-> bindParam(3, $mid);     
        $stmt-> bindParam(4, $_SESSION['un']);     

        if($stmt->execute()){
           echo "<h2 style= 'color:white'>" .$_SESSION['un'] ."</h2>";
           echo "<h2 style= 'color:white'> Commented! </h2>";
       }
       else{
           echo "<h2 style= 'color:red'> Oh uh !  Try again later !</h2>";
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
        </body>
        </html>
    
