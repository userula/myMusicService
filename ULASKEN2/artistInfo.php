<?php 
    session_start();
    session_write_close();
    session_register_shutdown();
    
    $artist = $_SESSION['selectedArtist'];
    $musics = $_SESSION['musics'];
    unset($_SESSION['musics']);
    unset($_SESSION['selectedArtist']);

 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/artist.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
    <title><?php echo $artist['artistname']; ?> - Listen to free music on Ulasken</title>
    <script>
        $(document).ready(function(){
            $("#parag").hide();
            $("#tog").on('click', function(){
                $("#parag").slideToggle();
                $("#parag").css({"box-shadow": "0 0 6px black", "padding": "50px", "border-radius": "15px"});
            })
        });
    </script>
</head>
<body>
    <!--Navbar-->
    <?php include('navbar.php'); ?>

      <div class="artist">
            <div class="container">
                <div class="artistinfo">  
                    <div class="row" id="background" style="background-image: url(<?php echo $artist['bg']; ?>); background-repeat: no-repeat; background-position: center; background-size: cover; border-radius: 25px">
                        <div class="col-md-4">
                            <img src="<?php echo $artist['url']; ?>" alt="artist avatar" style="border-radius: 50%; width: 200px; height: 200px; box-shadow: 0 0 10px black">
                        </div>
                        <div class="col-md-8">
                            <h1 style="text-shadow: 0 0 10px white, 0 0 20px black; color: white; margin-top: 120px"><?php echo $artist['artistname']; ?></h1>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="musicinfo">
                    <div class="row">
                        <div class="col-md-8">                            
                            <h3>Popular tracks</h3>
                            <hr>
                            <div class="row">
                                <?php 
                                    foreach ($musics as $key => $value) {
                                    
                                 ?>
                                    <div class="col-md-2">
                                        <img src="<?php echo $value['image']; ?>" alt="" width="100%" style="border-radius: 10%">
                                    </div>
                                    <div class="col-md-10">
                                        <h5><?php echo $value['name']; ?></h5>
                                        <audio id="player" src="<?php echo $value['address']; ?>" controls></audio>
                                    </div>
                                <?php 
                                    }
                                 ?>
                            </div>                            
                        </div>
                        <div class="col-md-4" id="tog">
                            <h3>Biography</h3>
                            <h6 style="color: gray; font-family: 'Assistant', sans-serif;">click here to see more</h6>
                            <hr>
                            <div id="parag">
                                <p style="font-family: 'Assistant', sans-serif;"><?php echo $artist['info'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <?php include('footer.php'); ?>
</body>
</html>