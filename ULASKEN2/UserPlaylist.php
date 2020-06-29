<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('navbar.php'); ?>
    <?php include('DB.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <link rel="stylesheet" href="style/playlist.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
    <title><?php echo $user->getFname()." ".$user->getLname(); ?> Playlists - Listen to free music on Ulasken</title>
</head>
<body>

      <div class="container" id="userprofile">
            <div class="userinfo">  
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://image.flaticon.com/icons/svg/168/168724.svg" alt="user avatar" style="border-radius: 50%; width: 200px; height: 200px; align-self: center;">
                    </div>
                    <div class="col-md-8">
                        <h1><?php echo $user->getFname()." ".$user->getLname(); ?></h1>
                        <h4 style="font-family: 'Assistant', sans-serif; color: grey">Your playlists</h4>
                    </div>
                </div>
            </div>
            <hr>
            <div class="maininfo">
                <div class="row">
                    <?php 
                        $sql = "SELECT * FROM playlist
                                WHERE playlist.user_id = ".$user->getId();
                        $result = $db->db_query($sql);

                        if($result != 'error')
                        {
                            foreach ($result as $key => $value) 
                            {                                
                    ?>
                                <form action="playCheck.php" method="post" id="<?php echo $value['name']; ?>">
                                    <div class="col-md-3 col-sm-6">
                                        <a name="asd" onclick="document.getElementById('<?php echo $value['name']; ?>').submit()">
                                            <img src="<?php echo $value['image']; ?>" width="100%">
                                            <input type="hidden" name="playID" value="<?php echo $value['id']; ?>">
                                            <h4><?php echo $value['name']; ?></h4>
                                        </a>
                                    </div>
                                </form>
                                <?php
                            }
                        }
                        else
                        {
                            echo mysqli_error($dbconn);
                        }
                     ?>
                    
                    <div class="col-md-3 col-sm-6">
                        <a href="addPlaylist.php">
                            <img src="image\add.png" alt="add new playlist" width="100%">
                            <h4>Add new playlist</h4>
                        </a>
                    </div>
                </div>
            </div>
      </div>
      <?php include('footer.php'); ?>
</body>
</html>