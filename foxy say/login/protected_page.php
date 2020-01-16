<?php
/**
 * Copyright (C) 2013 peredur.net
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html style = "font-family: Comic Sans MS;">
    <head>
        <meta charset="UTF-8">
    
        <link rel="stylesheet" href="styles/main.css" />
		
<title>Foxy says</title>
<link rel="icon" href="images/logo.png" type="image/png">
<link href="../profile/profile_style.css" rel="stylesheet" type="text/css" media="all">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
        <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <!-- header side -->
<div class = "header">
</div>

<!-- body side -->
<div class = "content">
	<!-- profile side -->
	<div id = "profile">
		<div id = "profile_pic"></div>
		<div align = "center" id = "profile_ID">PoomMi Ch</div>
		<button id = "btnContact" onclick="document.getElementById('messageBox').style.display='block'">Contact</button>
	</div>

	<!-- chat side -->
	<div id = "stack">
	</div>

	<!-- message box popup -->
	<div id="messageBox" class="box animate"> 
		  <form class="box-content" action="/action_page.php">
			<div id = "text">Message Box</div>

			  <div class="imgcontainer">
				  <span onclick="document.getElementById('messageBox').style.display='none'" class="close" 
				  title="Close">&times;</span>
			  </div>
				
			<div style="position: relative; width: 80%; margin: 0 auto;">
				 <input type="text" placeholder="Enter destination ID" name="dest">
				 <textarea placeholder="Type message.." name="msg" class = "msg"> </textarea>      
				 <button type="submit" class="btnOnPopUp">send now</button>
			</div>
		 </form>  
	</div>
</div>

            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>



		




<script src="profile/profile_script.js"></script>
    </body>
</html>
