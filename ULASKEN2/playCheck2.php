<?php
        $playID = $_GET['playID'];

        include('DB.php');

        $musDB = $db->select_all('music');

        $playDB = $db->select_all("emotional_playlist"." WHERE id = ".$playID);

        $musPlay = explode('||', $playDB[0]['musics_id']);

        $muz = [];

        for ($i = 0; $i < count($musPlay); $i++)
        {            
            for ($j = 0; $j < count($musDB); $j++) 
            { 
                if($musPlay[$i] == $musDB[$j]['name'])
                {
                    $muz[$i] = $musDB[$j];
                }
            }
        }
        session_start();

        $_SESSION['playlistMusic'] = $muz;

        $_SESSION['selectedPlaylist'] = $playDB[0];

        header("Location: emotional_playlist.php");
?>