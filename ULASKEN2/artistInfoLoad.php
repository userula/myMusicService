<?php
    
    $return = [];

    if(isset($_POST['id']))
    {
        header('Content-Type: application/json');
        include('DB.php');
        $id = $_POST['id'];
    }

    $row2 = $db->select_artistById($id);

    $m = $db->select_all('music');

    if($m == 'error')
    {
        $return['message'] = "error";
        echo (json_encode($return));
        exit();
    }
    else
    {			
        $musics = explode(",", $row2[0]['music_id']);
        
        $muz = [];

        for ($i = 0; $i < count($musics); $i++) {
            
            for ($j = 0; $j < count($m); $j++) 
            { 
                if($musics[$i] == $m[$j]['id'])
                {
                    $muz[$i] = $m[$j];
                }
                
            }
        }
        session_start();

        $_SESSION['musics'] = $muz;

        $_SESSION['selectedArtist'] = $row2[0];

        $return['message'] = 'success';

        echo (isset($_POST['id']) ? json_encode($return) : "");
    
        
    }

?>