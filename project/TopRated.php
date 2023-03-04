<?php

	try
	{
		require('connection.php');


		$sql="select * from rating
				order by rating DESC;";
		$TR_rs=$db->query($sql);

	$db�=NULL;
	}
	catch(PDOException $ex)
	{
		echo "Connection Error occured!";
		die ($ex->getMessage());
	}

?>
