<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style/main.css">
	<link rel="stylesheet" href="style/addplay.css">
	<link rel="stylesheet" href="style/playlist.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title>Add playlist</title>
	<?php include('navbar.php');?>
</head>
<body>
<?php 
	//<!--Navbar-->

	include('DB.php');

    $muz = $db->select_all('music');

    if(isset($_POST['submit']))
    {
        $muzyka = "";
    	foreach ($_POST['music'] as $key => $value) {
            if($muzyka == "")
            {
				$muzyka = $value;
				continue;
            }
    		$muzyka = $muzyka."||".$value;
    	}


    	$sql = "INSERT INTO playlist(name, image, date, user_id, musics_id)
    			VALUES('".$_POST['name']."',
    			 	   '".$_POST['image']."', 
    			 	   '".date('Y-m-d H:i:s')."', 
    			 	   '".$user->getId()."',
    			 	   '".$muzyka."')";

    	$db->db_insert($sql);

    		header('Location: UserPlaylist.php');
    		exit();
    }

 ?>
<div class="container" id="userprofile" style="margin-bottom: 23vh">
	<div id="info" class="container">
		<h3>Add new playlist</h3>
		<hr>
		<form action="addPlaylist.php" method="post" id="form">
			<div class="row">
				<div class="col-md-6">Set name</div>
				<div class="col-md-6"><input type="name" placeholder="Enter name for playlist" name="name"></div>
			</div>
			<div class="row">
				<div class="col-md-6">Image (url)</div>
				<div class="col-md-6"><input type="text" name="image" value="image/default.png"></div>
			</div>
			<div class="row">
				<div class="col-md-6">Add music</div>
				<div class="col-md-6">
					<select name="music[]" multiple style="height: 100%;">
						<?php 
							foreach ($muz as $key => $value) {
								$n = $value['name'];
								echo "<option style='border:1px solid black; height: 7%'>$n</option>";
							}
						?>
					</select>
				</div>
			</div>
			<button type="submit" name="submit" id="add" class="btn btn-default">Add</button>
		</form>
	 </div>
</div>	
<?php include('footer.php')?>
</body>
</html>
