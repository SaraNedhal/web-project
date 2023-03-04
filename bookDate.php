      <?php 
      try {
          require('connection.php');
          }
          catch(PDOException $e){
            die($e->getMessage());
          }
          extract($_GET);
          $stmt = $db->query("SELECT * FROM timings WHERE movieID = '".$d. "' ");
               ?>
          <select name="time">
          <?php
               while($row=$stmt->fetch()){
                ?> 
                <option value= <?php echo $row['date'] . "," .$row['time'] ?> > <?php echo $row['date'] . " ," .$row['time'] ?> </option>
               <?php 
               } ?>
               </select>

