
<html>
	<head>
		<title>Foxy says</title>
		<link href="https://fonts.googleapis.com/css?family=Nunito:400,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<link rel="icon" href="images/logo.png" type="image/png">
		<link href="index_style.css" rel="stylesheet" type="text/css" media="all">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/JavaScript" src="login/js/sha512.js"></script> 
    <script type="text/JavaScript" src="login/js/forms.js"></script> 

		<?php
			include_once 'login/includes/db_connect.php';
			include_once 'login/includes/register.inc.php';
			include_once 'login/includes/functions.php';

			sec_session_start();
		?>

	</head>

	<body style="background: #b0dfe5;">
	<?php if (login_check($mysqli) == true) header('Location: profile.php'); ?>

		<!-- header -->
		<header>
			<!--background-->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
		    	<polygon class="svg--sm" fill="white" points="0,0 30,100 65,21 90,100 100,75 100,100 0,100"/>
		    	<polygon class="svg--lg" fill="#b0dfe5" points="0,0 15,100 33,21 45,100 50,75 55,100 72,20 85,100 95,50 100,80 100,100 0,500" />
		  	</svg>

			<div align="center">
				<!-- My Post topic-->
				<img id="logo" src="images/text logo.png">
			</div>

			<!--button-->
			<div align = "center">
				<button class = "btnSignUp" onclick="document.getElementById('box-register').style.display='block'">
					Create an account
				</button>

				<button class = "btnSignIn" onclick="document.getElementById('box-login').style.display='block'">
					Sign in
				</button> 

				<!-- box login pop up -->
				<div id="box-login" class="box animate"> 
				  	<form method="post" class="box-content" action="login/includes/process_login.php">
				        <span class = "headBox">
				        	<span style="position: absolute; top: 5px; left: 225px;">Log in</span>	  
				        </span>

				  		<div class="imgcontainer">
	      					<span onclick="document.getElementById('box-login').style.display='none'" class="close" title="Close">&times;</span>
	      				</div>

					    <br><br><br>
					    

					    <div style="position: relative;" margin: 50px 0 12px 0px;">
						     <input type="text" placeholder="Enter Username" name="username">
						     <input type="password" placeholder="Enter Password" name="psw">        
						     <button type="submit" class="btnOnPopUp" onclick="formhash(this.form, this.form.psw);">Join now</button>
					    </div>
		  			</form>  
				</div>

				<!-- box register pop up -->
				<div id="box-register" class="box animate"> 
				  	<form class="box-content" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">
				        <span class = "headBox">
				        	<span style="position: absolute; top: 5px; left: 148px;">Create an account</span>	  
				        </span>

				  		<div class="imgcontainer">
	      					<span onclick="document.getElementById('box-register').style.display='none'" class="close" 
	      					title="Close">&times;</span>
	      				</div>

					    <div style="position: relative; margin: 80px 0 12px 0;">
							<input type="text" placeholder="Enter Username" name="username">
							 <input type="text" placeholder="Enter Email" name="email" style="backface-visibility:  opacity: 0.8">						     
						     <input type="password" placeholder="Enter Password" name="psw"> 					     
						     <input type="password" placeholder="Confirm Your Password" name="confirmpwd">        
						     <input type="submit" class="btnOnPopUp" onclick="return regformhash(this.form,
            									this.form.username,
            									this.form.email,
            									this.form.psw,
            									this.form.confirmpwd);" value = "Register Now">
					    </div>
		  			</form>  
				</div>

			</div>
		</header>

		<!-- body -->
			<content>
				<div class="tutor1">
					<img style="height: 250px; width: 250px;" src="images/tutor1.jpg"><br><br>Create an account
				</div>
				<div class="arrow1">
					<img style="height: 150px; width: 150px; " src="images/arrow.png">
				</div>
				<div class="tutor2">
					<img style="height: 250px; width: 250px;" src="images/tutor2.jpg"><br><br>Find your new friends
				</div>
				<div class="arrow2">
					<img style="height: 150px; width: 150px;" src="images/arrow.png">
				</div>
				<div class="tutor3">
					<img style="height: 250px; width: 250px;" src="images/tutor3.jpg"><br><br>Let's Says
				</div>
			</content>
		<!-- footer -->
		<footer>
			<span style="margin-left: 1150px"></span>
			<span style="font-family: Comic Sans MS;">Powered By</span>
			<span> No More F </span>
		</footer>
	</body>

	<script src="script.js"></script>
</html>

