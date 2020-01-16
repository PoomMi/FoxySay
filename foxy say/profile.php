<!DOCTYPE html>
<html>

    <head> 
		<title>Foxy says</title>
		<link rel="icon" href="images/logo.png" type="image/png">
		<script src="jqury 3.3.1.js"></script>
		<script src="profile/profile_script.js"></script>				
		<link href="profile/profile_style.css" rel="stylesheet" type="text/css" media="all">
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
				<div id = "edit" class = "list">Edit Profile</div>
				<div id = "friend" class = "list">Contact</div>
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
			<div class = "edit" id = "edit_" >
				<div class = "animate edit-content">
					<div id = "profile_pic-inbox">
						<div class="middle">
                            <input type="button" class="button" id="btnChangePicture" value="Change Profile" />
                            <input type="file" style="display: none;" id="profilePicture" name="file" />
                            <div id = "tme_pic-name"></div>
                        </div>

					</div>
    				<div class = "info">
						Information<textarea value="<?php echo $info; ?>" id = "update_info"></textarea>
																
    				</div>
    				<button id = "btnSave">Save</button>
				</div>
			</div>
			
			<!-- Search Content Popup -->
			<div id = "search_found">
				<div class = "search_found-content animate"></div>
			</div>

			<!-- Body -->
			<div class = "body">
			<div class = "body-content">

				<!-- My Profile -->
				<div class = "picture">
					<div id = "profile_pic">
						<img class="my_img" src = "profile/picture/<?php echo $picture; ?>" width= "170px" height = "170px">
					</div>
					<div id = "username"><?php echo $username; ?></div>
				</div>

				<!-- My Chat -->
				<div class = "chat">
					<div class="msg-name">

					</div>
					<div class = "msg-box"></div>
					<input class = "msg-input" placeholder = "Type message.." 
					onkeydown="if (event.keyCode == 13) document.getElementById('btnSay').click()">
					<button id = "btnSay">say</button>
				</div>

				<!-- My Contact -->
				<div class = "stack">
					<?php include 'includes/get_chat-stack.php'; ?>
				</div>
			</div>
			</div>
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

		$('#btnSave').click(function(){
           var username = $('#username').text();
           var update_info = $('#update_info').val();
		   var tmp_pic = $('#profilePicture').val();
		   if(tmp_pic==""){
		   		var update_pic = '<?php echo $picture; ?>';
		   }
		   else{
		   		var update_pic = tmp_pic.split("\\")[2];
		   }
		   $.post( "includes/update_profile.php", {username: username, info: update_info, pic: update_pic},function(){
		   	
		   });
		   $(location).attr('href', 'profile.php')
    	});		
	</script>
</html>