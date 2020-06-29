<?php 
	header('Content-Type: application/json');
    include('DB.php');
    include('User.php');

    $result = [];

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $dbconn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();

    if($row != null && $row['email'] != null)
    {
        if($row['password'] == $pass)
        {
            session_start();

            //$user = new User($row['id'], $row['fname'], $row['lname'], $row['email'], $row['password']);

            $result['message'] = 'success';

            $_SESSION['user'] =['id' => $row['id'],
                                'fname' => $row['fname'],
                                'lname' => $row['lname'],
                                'email' => $row['email'],
                                'pass' => $row['password']]; 

        }
        else
        {
            $result['message'] = 'Wrong Password';
        }
    }
    else
    {
        $result['message'] = "Wrong email";
    }
    echo(json_encode($result));
 ?>