<?php
    include_once ('connection.php');

$rs = $db->query("SELECT username FROM user");
$usernameResult = $rs->fetchAll(PDO::FETCH_ASSOC);

function mapFn($a){
return "'".$a["username"]."'";
}
$usernames = array_map("mapFn", $usernameResult);

if(isset($_POST['submitForm'])){
    $Name = $_POST['name'];
    $NameL = $_POST['NameL'];
    $un = $_POST['un'];
    $email = $_POST['email'];
    $phone=$_POST['phone'];
    $g = $_POST['g'];
    $birthday=$_POST['birthday'];
    $ps = $_POST['ps'];
    $confirmPassword = $_POST['confirmPassword'];
// print_r($_POST);
      $validationArray = [
        ["Name",$Name],
        ["Last Name",$NameL],
        ["Username",$un],
        ["Email",$email],
        ["Phone",$phone],
        ["Gender",$g],
        ["Birthday",$birthday],
        ["Password",$ps],
        ["Confirm Password",$confirmPassword],
      ];

$invalidItems = [];
foreach ($validationArray as $key => $value) {
  if(trim($value[1]) == ""){
    array_push($invalidItems,$value[0]);
  }
}

    if (count($invalidItems)){
      echo join(", ",$invalidItems)." Are missing. Please fill them to procceed.";
    }
    else
        {
            $hash = password_hash($ps, PASSWORD_DEFAULT);
            // $sql="INSERT INTO user VALUES(null, '$Name' ,'$NameL' , '$un' ,'$r', '$email','$phone' , '$g' ,'$birthday' , '$ps' )";
            $sql="INSERT INTO `user` 
            ( `FName`, `LName`, `UserName`, `role`, `Password`, `Gender`, `DOB`, `Email`, `TelNum`, `Balance`, `profilePic`) VALUES 
            ( '$Name', '$NameL', '$un', 'User', '$hash', '$g', '$birthday', '$email', '$phone', '50', '')";

            // echo $sql;
        try{
        $r = $db->exec($sql);
        if ($r>0){
          $sql ="SELECT * from user where username = '".$un."' AND password = '".$ps."'";
          $rs = $db->query($sql);
          $users = $rs->fetchAll(PDO::FETCH_ASSOC);
    
          // if(count($users))
          // {
              
              $user = $users[0];
              session_start();
              $_SESSION['id'] = $user["UserID"];
              $_SESSION['un'] = $un;
              $_SESSION['ps'] = $ps;
              $_SESSION['role'] = $user["role"];

              $_SESSION['loggedInUser'] = $user;
              
    
              $db = null;
              header('Location: index.php');
    
          // }
          header('Location: index.php');
        }
        die();
        $db=null;
            }
    catch(PDOException $ex) {
    echo "Error occured!"; 
    die ($ex->getMessage());
    }
}

}
?>

<div class="sign">
    <form method="post" id="form" action="register.component.php">
        <div class="Reg">
            <br />
            <h2>Register In Our Website Us</h2> <br />
        </div>
        <div class="n">
            <div class="col-sm-10">
                <label for="Name">First Name </label>
                <input type="text" id="Name" class="form-control mb-2" placeholder="First Name" name="name" />
                <small></small><br />
            </div>
            <br />
            <div class="col-sm-10">
                <label for="NameL">Last Name </label>
                <input type="text" id="NameL" class="form-control mb-2" placeholder="Last Name" name="NameL" />
                <small></small><br />
            </div>
            <br />
            <div class="col-sm-10">
                <label for="un">Username </label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input type="text" id="un" class="form-control mb-2" placeholder="Username" name="un" />
                    <small></small>
                </div>
                <br />
            </div>
            <br />

            <div class="col-sm-10">
                <label for="email">Email </label>
                <input type="text" id="email" class="form-control mb-2" placeholder="name@gmail.com" name="email" />
                <small></small><br />
            </div>
            <div class="col-sm-10">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" class="form-control mb-2" placeholder="+973 33333333" name="phone" />
                <small></small><br />
            </div>
            <br />
        
        <br />
        <div class="col-sm-10">
            <label for="formGroupExampleInput">Gender </label><br /><br />
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="g" checked value="F" />
                <label class="form-check-label" for="f">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="g" value="M" />
                <label class="form-check-label" for="m">Male</label>
            </div><br />
            <br /><small></small><br />
        </div>
        <br />
        <br />
        <div class="col-sm-10">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control mb-2" id="birthday" name="birthday">
            <small></small><br />
        </div>
        <div class="col-sm-10">
            <label for="password">Password </label>
            <input type="password" id="password" class="form-control" name="ps" />
            <small></small><br />
        </div>
        <br />


        <div class="col-sm-10">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" />
            <small></small><br />
        </div>
        
        <br /></div>
        <div class="bs">
        <input type="hidden" value="Sign-in" b1l-4 name="submitForm" />
        <button type="button" onclick="ValidateThenSubmit()" class="btn btn-outline-light btn-sm d-flex justify-content-center" value="Sign-in" b1l-4>
            Sign-in
        </button>
        </div>
        <br />
        <br />
        <br />
</div>
</form>
</div>
<script>
var usernames = [<?php echo join(",",$usernames) ?>];
</script>
<script src="script.js"></script>