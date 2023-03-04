<?php 
session_start();
if(!isset($_SESSION['un'])){
    echo "You must login first";
    header("location:login.php");
$msg = "";
}
try {
    require('connection.php');
    }
    catch(PDOException $e){
      die($e->getMessage());
    }

    if(isset($_POST['btn-delete'])){
        $id = $_POST['btn-delete'];
        $deleteSql=$db->prepare("DELETE FROM topup WHERE userid = $id;");
        $deleteSql->execute();
        $msg = "Requests Deleted !";
      
        } 
    

    if(isset($_POST['btn-accept'])){
    $id = $_POST['btn-accept'];
    $updateSql=$db->prepare("UPDATE topup SET STATUSR= 'Accepted' WHERE topup.USERID = $id;");
    $updateSql->execute();
    $msg = "Requests are accepted successfully!"; 
    $balanceSql=$db->prepare("UPDATE user SET Balance= (Balance-10) WHERE USERID = $id;");
    $balanceSql->execute();

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
        <?php 
        echo "<h2 style=color:white;> $msg </h2>";
        ?>
        <button class="btn-book"><a href="index.php" >Back to Main </a> </button>
    </body>

    </html>
