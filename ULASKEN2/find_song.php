<?php 
	include_once('DB.php');
	$artists = $db->select_all('artists');

	$id = 0;
	$msg = false;
	if(isset($_GET['search']))
	{
		$find = $_GET['findsmth'];
		foreach ($artists as $key => $value) {
			if($value['artistname'] == $find)
			{
				$id = $value['id'];
				include_once('artistInfoLoad.php');
				$msg = true;
			}
		}
		if($msg != false)
		{
			$musicsArr =  $_SESSION['musics'];
		}
		else
		{
			$m = $db->select_all("music WHERE name LIKE '%".$find."%'");
			$musicsArr = $m;
		}

		session_write_close();
		session_register_shutdown();

		include('songs2.php');
	}
 ?>