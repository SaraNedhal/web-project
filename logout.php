<?php
try {
    require('connection.php');
    }
 catch(PDOException $e){
      die($e->getMessage());
    }
  
session_start();
if(isset($_SESSION['un'])){
    session_destroy();
    header("location:index.php");
  }
  
?>