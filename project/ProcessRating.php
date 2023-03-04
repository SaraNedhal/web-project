<?php
try
{
	require('connection.php');

	session_start();
	extract($_SESSION);
	extract($_GET);

	if(isset($Rsubmit) && isset($star))
	{
		//add a new colum of Nrate in database of rating
		$RSQL="	SELECT NRate , rating
				FROM rating
				WHERE MovieID=$mid";

		$RR=$db->query($RSQL);
		if ($Ra=$RR->fetch())
		{
			$temp1=$Ra['NRate']+1;
			$temp2=($Ra['rating']*$Ra['NRate']);
			$temp2+=$star;
			$temp2=$temp2/($temp1);

			$newrate=($temp2);


			$URSQL="	UPDATE rating
						SET rating=?,NRate=?
						WHERE MovieID=?";

			$UR=$db->prepare($URSQL);
			$URS=$UR->execute(array($newrate, $temp1 ,$mid));

			$msg="<font size='4pt' color='green'>Rated Successfully...</font>";
			header("location:movieDetails.php?e=$msg");
		}
		else
		{
			header("location:index.php");
		}
	}

	else
	{
		$msg="<font size='4pt' color='red'>You have to choose a rating first...</font>";

		header("location:movieDetails.php?e=$msg");
	}
	
	$db=NULL;

}
catch(PDOException $ex)
{
	echo "Connection Error occured!";
	die ($ex->getMessage());
}
?>
