<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
    <title>Ulasken - Listen to free music on Ulasken </title>
</head>
<body>
    <!--Navbar-->
    <?php include('navbar.php');
            include('DB.php'); ?>
      <!--Carousel-->
    <div id="News">
        <div class="container">
            <h2>News from Music Industry</h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
          
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
          
                <div class="item active">
                    <img class="d-block w-100" src="https://wowone.ru/wp-content/uploads/2020/05/Halsey-Marshmello.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Marshmello & Halsey</h2>
                        <p>Halsey, Marshmello release new song 'Be Kind'</p>
                    </div>
                </div>
          
                <div class="item">
                    <img class="d-block w-100" src="https://t2.ldh.be/7hgKb3M_vD0jdh0j690izBUwIBo=/0x0:2560x1280/1920x960/5e466914f20d5a642285eb41.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>007 Billie Eilish</h2>
                        <p>No Time To Die: The verdict on Billie Eilish's James Bond theme</p>
                    </div>
                </div>
              
                <div class="item">
                    <img class="d-block w-100" src="https://www.kino-teatr.ru/acter/album/494534/960130.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Ed Sheeran No.6</h2>
                        <p>Ed reveals the full tracklist for his new album</p>
                    </div>
                </div>
            
              </div>
          
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
    </div>
    <div id="blog1">
        <div class="container">
            <div class="row">
                <div class="col-md-8" id="collection">
                    <h2 style="text-align: center;">Emotional selections</h2>
                    <div class="row">
                    <?php 
                        $result = $db->select_all('emotional_playlist');
                        if($result != 'error')
                        {
                            foreach ($result as $key => $value) 
                            {
                     ?>
                            <div class="col-md-4">
                                <form action="playCheck2.php" method="get" id="<?php echo $value['name']; ?>">
                                    <a onclick="document.getElementById('<?php echo $value['name']; ?>').submit()">
                                            <img src="<?php echo $value['image']; ?>" width="100%">
                                            <input type="hidden" name="playID" value="<?php echo $value['id']; ?>">
                                            <h4><?php echo $value['name']; ?></h4>
                                    </a>
                                    <input type="hidden" name="name" value="<?php echo $value['name']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $value['image']; ?>">
                                    <textarea style="display: none;" name="musics_id"><?php echo $value['musics_id']; ?></textarea>
                                </form>
                            </div>

                    <?php   
                            }
                        }
                     ?>    
                        
                    </div>
                </div>                
                
                <div class="col-md-4" id="chart">
                    <h2 style="text-align: center;">Top 5 Chart</h2>
                    <h5>1. XXXTENTACION, Lil Wayne, Ty Dolla $ign - Scared of the Dark</h5>
                    <div class="song1">
                          <img src="https://images.genius.com/9762710fb06ae7a1230ca95f4c84feb7.3000x3000x1.jpg" width="15%">
                          <audio id="player" src="musics/Scared of the Dark.mp3"></audio>
                             <div class="playerbuttons"> 
                                <button onclick="document.getElementById('player').play()">Play</button> 
                                <button onclick="document.getElementById('player').pause()">Pause</button> 
                                <button onclick="document.getElementById('player').volume += 0.1">Vol +</button> 
                                <button onclick="document.getElementById('player').volume -= 0.1">Vol -</button> 
                            </div>
                    </div>
                    <br>
                    <h5>2. Billie Eilish, Khalid - lovely</h5>
                    <div class="song2">
                        <img src="https://upload.wikimedia.org/wikipedia/ru/thumb/e/e6/Lovely_%28песня%29.jpg/1200px-Lovely_%28песня%29.jpg" width="15%">
                        <audio id="player1" src="musics/Billie Eilish, Khalid - lovely.mp3"></audio>
                            <div class="playerbuttons"> 
                                <button onclick="document.getElementById('player1').play()">Play</button> 
                                <button onclick="document.getElementById('player1').pause()">Pause</button> 
                                <button onclick="document.getElementById('player1').volume += 0.1">Vol +</button> 
                                <button onclick="document.getElementById('player1').volume -= 0.1">Vol -</button> 
                            </div>
                    </div>
                    <br>
                    <h5>3. Eminem feat. Juice WRLD - Godzilla</h5>
                    <div class="song3">
                        <img src="https://upload.wikimedia.org/wikipedia/ru/1/1e/Music_To_Be_Murdered_By.jpg" width="15%">
                        <audio id="player2" src="musics/Eminem feat. Juice WRLD - Godzilla.mp3"></audio>
                            <div class="playerbuttons"> 
                                <button onclick="document.getElementById('player2').play()">Play</button> 
                                <button onclick="document.getElementById('player2').pause()">Pause</button> 
                                <button onclick="document.getElementById('player2').volume += 0.1">Vol +</button> 
                                <button onclick="document.getElementById('player2').volume -= 0.1">Vol -</button> 
                            </div>
                    </div>
                    <br>
                    <h5>4. Halsey - Without me</h5>
                    <div class="song4">
                        <img src="https://upload.wikimedia.org/wikipedia/ru/thumb/1/14/Without_Me_Halsey.jpg/274px-Without_Me_Halsey.jpg" width="15%">
                        <audio id="player3" src="musics/Halsey - Without Me.mp3"></audio>
                            <div class="playerbuttons"> 
                                <button onclick="document.getElementById('player3').play()">Play</button> 
                                <button onclick="document.getElementById('player3').pause()">Pause</button> 
                                <button onclick="document.getElementById('player3').volume += 0.1">Vol +</button> 
                                <button onclick="document.getElementById('player3').volume -= 0.1">Vol -</button> 
                            </div>
                    </div>
                    <br>
                    <h5>5. Roddy Rich - The Box</h5>
                    <div class="song5">
                        <img src="https://upload.wikimedia.org/wikipedia/ru/c/c5/Roddy_Ricch_-_Please_Excuse_Me_for_Being_Antisocial.png" width="15%">
                        <audio id="player4" src="musics/Roddy Ricch - The Box.mp3"></audio>
                            <div class="playerbuttons"> 
                                <button onclick="document.getElementById('player4').play()">Play</button> 
                                <button onclick="document.getElementById('player4').pause()">Pause</button> 
                                <button onclick="document.getElementById('player4').volume += 0.1">Vol +</button> 
                                <button onclick="document.getElementById('player4').volume -= 0.1">Vol -</button> 
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php include('footer.php'); ?>
</body>
</html>