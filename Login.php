<?php 
	include("server.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="margin: 0px; overflow: hidden;">
	<div class="content">
		<FORM ction="feed.html" method="post">
			<FIELDSET>
				<legend align="center">LOG IN</legend>
					<?php include('errors.php'); ?>
					<input class="txt" type="text" name="username" placeholder="USERNAME">
					<input class="txt" type="password" name="password" placeholder="PASSWORD">
					 Not a member? <a href="signup.php">Sign up</a>
					<a href="account.html"><button class="btn" name="login" >LOG IN</button></a>			
			</FIELDSET>
		</FORM>	
	</div>	
</body>
</html>