<?php
//GET THE UserID FROM THE SESSION...
//SAMPLE UserID=1...
//DO THE report operation for the comments
$uid=1;
$Comment_error='';

try
{
	require('connection.php');

	session_start();
	if (!isset($_SESSION['mid']))
	{
		header("location:index.php");
	}
	extract($_SESSION);

	extract($_POST);
	if (isset($Com_submit))
	{
		$trim_comment=trim($comment);
		if (isset($trim_comment))
		{
			$insertSQL="	INSERT INTO Comment (comID,text,uId,mId)
							VALUES (?,?,?,?)";

			$rc=$db->prepare($insertSQL);
			$rc->execute(array(NULL,$trim_comment,$mId,$uId));
		}
		else
		{
			$Comment_error='No Comment Inserted...';
		}
	}

	extract($_GET);

	$sql1="	SELECT UserName,profilePic
			FROM user
			WHERE UserID=?";

	$ru=$db->prepare($sql1);
	$ru->execute(array($uid));
	$un=$ru->fetch();

	$sql2="	SELECT Comment , UserName , ProfilePic
			FROM comment , user
			WHERE mId=?
			AND comment.uId=user.UserID
			ORDER BY ComID DESC";

	$rs=$db->prepare($sql2);
	$rs->execute(array($mid));


}
catch(PDOException $ex)
{
	echo "Connection Error occured!";
	die ($ex->getMessage());
}
$db=NULL;
?>

<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css"  />
	<style>
		.button
		{
			background-color: white;
			border: none;
			color: white;
			padding: 10px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
		.button:hover
		{
			background-color: grey;
			border: none;
			color: orange;
			padding: 10px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
	</style>
</head>
<body>

<form method='POST'>
	<table>
		<tr>
			<th cellpadding='20' rowspan='2'>
				<img height='50' width='50' src="comments.gif<?php echo $un[1]; ?>" /> &nbsp; &nbsp;
			</th>
			<td >
				<font color='white'> <?php echo "$un[0]";  ?> </font>
			</td>
		</tr>
		<tr>
			<th>
				<textarea name="comment" style="resize:none;" rows="4" cols="100" maxlength="490" placeholder="Enter your comment here..." ></textarea>
				&nbsp;&nbsp;
			</th>
			<th>
				<input name="Com_submit"type="submit" class="button" value="Comment" />
			</th>
		</tr>
	</table>

	<input type='hidden' name='mid' value="<?php echo $mid; ?>" />
</form>
<br />

<table>
	<?php
		$HasCom=false;
		while ($r=$rs->fetch())
		{
			$HasCom=true;
			echo "<tr> <td colspan='2' height='10'><font color='white'>---------------------------------------------------------------------------------------------------------------------------------------------</font> </td></tr>";
			echo "<tr>";
				echo "<td height='50' width='70' cellpadding='20' rowspan='2'>";
			?>
					<img height='50' width='50' src="comments.gif<?php echo $r[2]; ?>" />

			<?php
				echo "</td>";
				echo "<td>";
					echo "<font color='white'>$r[1]</font>";
				echo "</td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td> $r[0] </td>";
			echo "</tr>";


		}
		if(!$HasCom)
		{
			echo "<font color='red' >No Comments...</font>";
		}

	?>
</table>

</body>
</html>
