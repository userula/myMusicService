<?php
    session_start();
    session_write_close();
    session_register_shutdown();
        $playlist = $_SESSION['selectedPlaylist'];
        $musics = $_SESSION['playlistMusic'];
    unset($_SESSION['playlistMusic']);
    unset($_SESSION['selectedPlaylist']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/playlist.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <?php include('navbar.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
    <title><?php echo $playlist['name']; ?></title>
</head>
<body>
      <div class="container" id="userprofile">
            <div class="userinfo">  
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo $playlist['image'] ?>" alt="playlist avatar" style="border-radius: 50%; width: 200px; height: 200px; align-self: center;">
                    </div>
                    <div class="col-md-8">
                        <h1><?php echo $playlist['name']; ?></h1>
                        <h4 style="font-family: 'Assistant', sans-serif; color: grey">Your playlist</h4>
                    </div>
                </div>
            </div>
            <hr>
            <div class="maininfo">
                <div class="row">
                    <div class="col-md-8">                            
                            <h3>Playlist tracks</h3>
                            <hr>
                            <div class="row">
                                <?php 
                                    foreach ($musics as $key => $value) {
                                    
                                 ?>
                                    <div class="col-md-2">
                                        <img src="<?php echo $value['image']; ?>" alt="" width="100%">
                                    </div>
                                    <div class="col-md-10">
                                        <h5><?php echo $value['name']; ?></h5>
                                       
                                            <audio id="audio<?php echo $value['id']; ?>" src="<?php echo $value['address']; ?>" controls></audio>
                                        
                                    </div>
                                <?php 
                                    }
                                 ?>
                            </div>
                            
                        </div>
                </div>
            </div>
      </div>
      <?php include('footer.php'); ?>

</body>
</html>