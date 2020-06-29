<?php
    header('Content-Type: application/json');

    include('DB.php');

    if(!empty($_POST['email']))
    {
        $email = $_POST['email'];

        $res = array();
        
        $stmt = $dbconn->prepare("SELECT email FROM users WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $sqlres = $stmt->get_result();

        $row = $sqlres->fetch_assoc();

        if($row > 0){
            $res['message'] = "Email already taken. Try another email";
            echo (json_encode($res));
            exit();
        }
        else if($row == null)
        {
            $res['message'] = "success";
            echo (json_encode($res));
            exit();
        }
    }
    else
    {
        $res['message'] = "empty";
        echo (json_encode($res));
        exit();
    }

?>