

<title>Songs - Listen to free music on Ulasken</title>
<link rel="stylesheet" href="style/main.css">
<link rel="stylesheet" href="style/playlist.css">
<link rel="stylesheet" href="style/regCSS.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style/playlist.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<?php 
    		include('navbar.php'); 
    	?>
		<div id="djai">

			<div class="container" id="userprofile">
				<h2 style="text-align: center;">Songs</h2>
				<div class="row">
					<?php 
	include('DB.php');
	
	$result = $db->select_all('music');
	
    if($result != 'error')
    {
		foreach ($result as $key => $value) {
			
			?>
					 <div class="col-md-4" id="chart">
						 <h5><?php echo $value['id'].". ".$value['name']; ?></h5>
						 <div class="song1">
							 <img src="<?php echo $value['image']; ?>" width="15%">
							 <audio id="audio<?php echo $value['name']; ?>" src="<?php echo $value['address'];?>"></audio>
							 <div class="playerbuttons">
								 <button id="<?php echo $value['name']; ?>" class="playbtn" >Play</button> 
								 <button id="<?php echo $value['name']; ?>" class="pausebtn" >Pause</button> 
								 <button onclick="document.getElementById('audio<?php echo $value['name']; ?>').volume += 0.1">Vol +</button> 
								 <button onclick="document.getElementById('audio<?php echo $value['name']; ?>').volume -= 0.1">Vol -</button> 
								</div>
					        </div>
					       <br>
					</div>
					<?php 
    	}
    }
    else
    {
		echo mysqli_error($dbconn);
    }
	?>
		 	</div>
		</div>
	</div>

		<?php include('footer.php') ?>

<script type="text/javascript">
	$(document).ready(function(){

		var lastMusic = "";

		$('.playbtn').on('click', function(){
			var x = $(this).attr("id");

			document.getElementById('audio' + x).play();

			if(lastMusic != "")
			{
				document.getElementById('audio' + lastMusic).pause();
			}

			lastMusic = x;
		});

		$('.pausebtn').on('click', function(){
			var x = $(this).attr('id');

			document.getElementById('audio' + x).pause();
		});
	});

</script>