<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/moon.png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/ticket.css">

    <title>View Ticket</title>
    
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
    if(isset($_POST['print'])){
        $userName = $_SESSION['un'];

        $stmt = $db -> query("SELECT * FROM SEAT WHERE uId= $userid;");
        while($row = $stmt->fetch()){
        $seatID = $row['SeatID'];
        $movieID = $row['mId'];
        }

        $sql = $db -> query("SELECT * FROM MOVIE WHERE ID= $movieID;");
        $movieName = "";
        while($row = $sql->fetch()){
            $movieName = $row['Name'];
            }

    }
    ?>
    	
    <div class="ticket">
    <p class = "title"><span>Moonlight Ticket</span></p>
    <div class = "info"> Seat:  <?php echo $seatID; ?> </div>
    <div class= "info"> Movie:  <?php echo $movieName; ?> </div>
    <img src = "images/barcode.svg" alt="My Happy SVG"/>
    
    </div>

     
</body>
</html>