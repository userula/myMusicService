<?php
	header('Content-Type: application/json');
	include('DB.php');

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	// $stmt = $dbconn->prepare('INSERT INTO users(fname, lname, email, password) VALUES(?, ?, ?, ?)');
	
	// $stmt->bind_param("ssss", $fname, $lname, $email, $pass);

	// $stmt->execute();
	$sql = "INSERT INTO users(fname, lname, email, password) VALUES('".$fname."', '".$lname."', '".$email."', '".$pass."')";
	
	$db->db_insert($sql);

	$result['message'] = 'success';

	echo json_encode($result);
?>	