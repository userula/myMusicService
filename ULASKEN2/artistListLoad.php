<?php 
	include('DB.php');

	$_SESSION['artists'] = [];

	$row = $db->select_all('artists');

	if($row == 'error')
	{
		echo mysqli_error($dbconn);
		header('Location: mainpage.php');
		exit();
	}
	else
	{
		// $_SESSION['artists'] = $row;
		// header('Location: artistList.php');
		include('artistList.php');
		exit();
	}
 ?>