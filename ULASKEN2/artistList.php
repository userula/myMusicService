<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();
    session_write_close();
    session_register_shutdown();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/artistList.css"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
    <title>Artist List - Listen to free music on Ulasken</title>
                <script type="text/javascript">
                
                $(document).ready(function(){
                    $(".btns").on('click', function(){
                        event.preventDefault();
                        var i = $(this).attr('id');
                        $.ajax({
                            url: 'artistInfoLoad.php',
                            type: 'POST',
                            data:{
                                id: $('#id' + i).val()
                            },
                            accepts: 'application/json; charset=utf-8',
                            success: function(data){
                                if(data.message == 'success')
                                {
                                    window.location.href = 'artistInfo.php';
                                }
                                else if(data.message == 'error')
                                {
                                    $("#errormsg").text('Database is drop out. Please, leave this site');
                                    $('#errormsg').addClass('bg-danger text-white');
                                }
                                else
                                {
                                    alert(data.message);
                                }
                            }
                        });
                    });
                });
                    
                </script>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="list">
        <div class="container">
            <div>
                <h1>Artists</h1>
                <p id="errormsg"></p>
            </div>    
        <hr>
            <div class="row">
                <?php       
                if(session_id() != ""){
                    $i = 0;
                    
                    unset($_SESSION['artists']);

                    foreach ($row as $key => $value) {
                        
                 ?>
                    <div class="col-md-3">
                        <form>
                            <button id="<?php echo $row[$i]['id']; ?>" class="btns" style="border: none; background-color: transparent; border-radius: 50%;">
                                <input style="display: none;" type="" id="id<?php echo $row[$i]['id']; ?>" value="<?php echo $row[$i]['id']; ?>">
                                <img id="img<?php echo $row[$i]['id']; ?>" src="<?php echo $row[$i]['url']; ?>" width="100%">
                                <span style="left:35%; font-size: 20px;"><?php echo $row[$i]['artistname']; ?></span>
                            </button>      
                        </form>
                    </div>
                <?php 
                        $i++;
                    }
                }
                 ?>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>