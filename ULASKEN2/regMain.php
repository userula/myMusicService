<!DOCTYPE html>
<html>
<head>
	<?php
		include('navbar.php');
		session_write_close();
		session_register_shutdown();
	?>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Patua+One&display=swap" rel="stylesheet">
	<title>Sign Up - Listen to free music on Ulasken</title>
	<link rel="stylesheet" href="style/regCSS.css">
	<script src="regJS.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">	
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$(document).ready(function(){				
			$("#emailInput").focus(function(){
                $(this).keyup(function(){
					$('#checkemail').addClass("bg-warning my-5");
                    $('#checkemail').text("Loading...");
                    $("#checkemail").removeClass('bg-danger');
                    $("#checkemail").removeClass('bg-success');
                })
			});
			////////////////////////////////////////////////////////////
			$("#emailInput").blur(function(){
                event.preventDefault();
                $.ajax({
                    url: "checkemail.php",
                    type: 'POST',
                    data:
                    {
                        email: $("#emailInput").val()
                    },
                    success: function (data)
                    {
                        if (data.message == "empty"){
                            $("#checkemail").removeClass('bg-success');
                            $("#checkemail").removeClass('bg-warning');
                            $("#checkemail").removeClass('bg-danger');
                            $("#checkemail").removeClass('bg-info');
                            $("#checkemail").addClass('bg-secondary p-2 text-white');
                            $("#checkemail").text("Fill email input");
                        }
                        else if (data.message == "success"){
                            $("#checkemail").removeClass('bg-warning');
                            $("#checkemail").removeClass('bg-danger');
                            $("#checkemail").removeClass('bg-info');
                            $("#checkemail").addClass('bg-success p-2 text-white');
                            $("#checkemail").text("This email is free");
                        }
                        else
                        {
                            $("#checkemail").removeClass('bg-warning');
                            $("#checkemail").removeClass('bg-success');
                            $("#checkemail").removeClass('bg-info');
                            $("#checkemail").text("Error: " + data.message);
                            $("#checkemail").addClass("bg-danger p-2 text-white");
                        }
                    }
                });
            });
			////////////////////////////////////////////////////
			$("#regbtn").on('click',function()
			{
				event.preventDefault();
				// if( ($('#emailInput').val().length == 0) || ($('#passInput').val().length == 0) || ($('#fnameInput').val().length == 0) || ($('#lnameInput').val().length == 0))
                // {
                //     $('#errormsg').text("Fill all inputs");
                //     $('#errormsg').addClass('bg-warning text-white');
				// }
				// else
				// {
					$.ajax({
						url: 'register.php',
						type: 'POST',
						data:
						{
							fname: $("#fnameInput").val(),
							lname: $("#lnameInput").val(),
							email: $("#emailInput").val(),
							password: $("#signupinput").val()
						},
						accepts: 'application/json; charset=utf-8',
						success: function(data)
						{
							if(data.message == 'success')
							{
								$('#errormsg').text('User created. Now you can sign in');
								$('#errormsg').addClass('bg-success text-white');
								$('#errormsg').removeClass('bg-danger text-white');
								$('#errormsg').removeClass('bg-warning text-white');
							}
							else
							{
								$("#errormsg").text('Something went wrong');
								$('#errormsg').addClass('bg-danger text-white');
								$('#errormsg').removeClass('bg-success text-white');
								$('#errormsg').removeClass('bg-warning text-white');
							}
						},
						error: function(){
							
						}
					});					
				// }
			});
			////////////////////////////////////////////////////
			$("#logbtn").click(function()
			{
				if( $('#logEmail').val().length == 0 || $('#logPass').val().length == 0)
                {
                    $('#logerr').text("Fill all inputs");
                    $('#logerr').addClass('bg-warning text-white');
				}
				else
				{
					event.preventDefault();
					$.ajax({
						url: 'login.php',
						type: 'POST',
						data:
						{
							email: $("#logEmail").val(),
							password: $("#logPass").val()
						},
						success: function(data)
						{
							if(data.message == 'success')
							{
								window.location.href = 'mainpage.php';
							}
							else
							{
								$("#logerr").text(data.message);
								$('#logerr').addClass('bg-danger text-white');
							}
						}
					});					
				}
			});
		});
	</script>
</head>
<body style="margin: 0; padding: 0;">
	<div class="rggroups" style="padding-bottom: 110px; padding-top: 150px;"> 

		<div class="choose">
			<button id="group1" class="text-center" >Log In</button>
			<button id="group2" class="text-center" >Sign Up</button>
		</div>

		
	<!--SIGNIN-->
			<div class="login" id="login">
				<br>
				<div id="h1">
					<h1>Welcome back</h1>
					<p id="logerr"></p>
					<br>
					<form>
						<input class="loginp" type="email" id="logEmail" placeholder="Email Address" required autocomplete="on">
						<br>
						<br>
						<input class="loginp" type="password" id="logPass" placeholder="Password">
						<br>
						<br>
						<button class="button button-block" id="logbtn" />Log In</button>
					</form>
				</div>
			</div>


	<!--SIGNUP-->
			<div class="signup" id="signup">
				<br>
				<div id="h1">
					<h1>Sign Up for Free</h1>
					<p id="errormsg"></p>
					<br>
					<form>
						<input class="loginp" type="name" id="fnameInput" placeholder="First Name" >
						<br>
						<br>
						<input class="loginp" type="surname" id="lnameInput" placeholder="Last Name">
						<br>
						<p id="checkemail"></p>
						<input class="loginp" type="email" name="email" id="emailInput"  placeholder="Email Address" >
						<br>
						<br>
						<div style="display: flex;">
							<input id="signupinput" class="loginp" type="password"  placeholder="Set Password">

							<div id="Oeye" onclick="pass('o')">
								<i class='fas fa-eye' style='margin: 11px 5px 5px 5px; font-size: 24px; cursor: pointer;'></i>
							</div>
								
							<div id="Ceye" onclick="pass('c')">
								<i class='fas fa-eye-slash' style='margin: 11px 5px 5px 5px; font-size: 22px; cursor: pointer;'></i>
							</div>
						</div>
						<br>
						<button class="button button-block" type="submit" id="regbtn">Get Started</button>
					</form>
				</div>
			</div>
	</div>
	<script>
		var readerView = false;
		  	
			  $("#group1").click(function()
			  {
					if(readerView == true)
					{
					  $('#group1').css('background-color', 'lightgreen');
						$('#group2').css('background-color', 'grey');
						$('.signup').slideToggle();
					  $('.login').slideToggle();
					  readerView = false;
					}

			  });
			  $("#group2").click(function()
			  { 
					if(readerView == false)
					{
					  $('#group2').css('background-color', 'lightgreen');
					  $('#group1').css('background-color', 'grey');
					  $('.signup').slideToggle();
					  $('.login').slideToggle();
						readerView = true;	
					}

			  });
	</script>
		<?php include('footer.php'); ?>

</body>
</html>