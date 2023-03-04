<?php

try {
  require('connection.php');
  }
  catch(PDOException $e){
    die($e->getMessage());
  }


$q=$_GET["q"];


$sql=$db->query("SELECT name FROM movie WHERE name LIKE '%{$q}%'");


while($row =$sql->fetch())
{
  ?>

<table>
<tr>
<td><br><?php echo "<h6 style='margin-left:5px;'>".$row['name']."</h6>"; ?> </td>


</tr>

</table>
<br>

<?php

}

?>