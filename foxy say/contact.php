<!DOCTYPE html>
<html>
    <head> 
		<title>Foxy says</title>
		<link rel="icon" href="images/logo.png" type="image/png">
		<script src="jqury 3.3.1.js"></script>
		<script src="contact/contact_script.js"></script>				
		<link href="contact/contact_style.css" rel="stylesheet" type="text/css" media="all">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		include_once 'login/includes/db_connect.php';
		include_once 'login/includes/functions.php';

		sec_session_start();
		$user_id = $_SESSION['user_id'];
	?>
	</head>
	
    <body>
		<?php if (login_check($mysqli) == true) : ob_start(); ?>
			<?php include 'includes/get_username.php'; //get username  ?>

			<!-- Title -->
			<div class = "title">
				<img src = "images/logo_title.png" id = "logo-title">
				<input type = "text" id = "search" placeholder = "Search by Username" 
				onkeydown="if (event.keyCode == 13) document.getElementById('btnSearch').click()">
				<button id = "btnSearch">search</button>
				<div id = "home">Home</div>
				<div class = "username"><?php echo $username; ?></div>
			</div>

			<div id = search-content></div>

			<!-- Menu -->
			<div id = "menu">
				<div id = "profile" class = "list">Profile</div>
				<div id = "contact" class = "list">Contact</div>
				<a href = "login/includes/logout.php" class = "link">
					<div id = "logout" class = "list">Logout</div>
				</a>
			</div>

			<!-- Profile Wimdow -->
			<div class = "profile" id = "profile_">
				<div class = "animate profile-content">
					<?php include 'includes/get_profile.php'; ?>

					<div id = "profile_pic-inbox">
						<img src = "profile/picture/<?php echo $picture; ?>" width= "170px" height = "170px">
					</div>
					<div class = "line"></div>
    				<div class = "info">
    					<p>Username : <?php echo $name; ?> </p>
    					<p>Information : <?php echo $info; ?></p>
    				</div>
				</div>
			</div>

			<!-- Edit Profile Window -->
			<div class = "edit" id = "edit_">
				<div class = "animate edit-content">
				</div>
			</div>
			
			<!-- Search Content Popup -->
			<div id = "search_found">
				<div class = "search_found-content animate"></div>
			</div>

			<!-- Body -->
			
				<?php
				 	$mysqli = new mysqli('localhost', 'root', '', 'webgroup');
				 	$get_contact = "SELECT * FROM contact WHERE name='$username' "; 
				 	$result_c = $mysqli->query($get_contact);
				     
				    while($row_c = $result_c->fetch_assoc()){ 
				    	$tmp = $row_c['contact'];
				    	$get_profile = "SELECT * FROM profile WHERE name='$tmp' "; 
				    	$result_p = $mysqli->query($get_profile);
				    	$row_p = $result_p->fetch_assoc();

				    	echo '<div class="box_contact">';
				    		echo '<div class="contact_pic">';
				    		echo '<img src="profile/picture/'.$row_p['picture'].'" width="170px" height="170px">';
				    		echo '</div>';
				    		echo '<div class="contact_name">';
				    		echo $row_p['name'];
				    		echo '</div>';
				    		echo '<div class="contact_info">';
				    		echo $row_p['info'];
				    		echo '</div>';
						echo '</div>';

						$result_p->close();
				    }
								
					$result_c->close();
					$mysqli->close();

			?>
			
        <?php else : ?>
			<meta http-equiv = "refresh" content = "0;URL=index.php?!login">
		<?php endif; ?>
	</body>

	<script>
		var profile = document.getElementById('profile_');
		var edit = document.getElementById('edit_');
		var search = document.getElementById('search_found');

		window.onclick = function(event) {
			if (event.target == profile) {
				profile.style.display = "none";
			}
			
			if (event.target == edit) {
				edit.style.display = "none";
			}

			if (event.target == search) {
				search.style.display = "none";
				$('#search-content').hide();
            	$('#search').val("");
			}		
		}
	</script>
</html>