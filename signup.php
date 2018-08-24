<?php 
	include("server.php"); 	
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
		<div class="content">
			<form class="form" action="signup.php" method="post">
				<FIELDSET>
					<legend align="center">SIGN UP</legend>
						<input type="radio" name="type">Phohographer
						<input class="r1" type="radio" name="type">Customer<br><br>
						<?php include('errors.php'); ?>
						
							<input class="txt" type="text" name="username" id="username"placeholder="USER NAME" ><br><br>

							<input class="txt" type="email" name="email" id="email" placeholder="EMAIL ID"><br><br>
						
							<input class="txt" type="password" name="password_1" id="password_1" placeholder="PASSWORD"><br><br>
						
							<input class="txt" type="password" name="password_2" id="password_2" placeholder="CONFORM PASSWORD"><br><br>
							
							<button class="btn" type="submit" name="submit" id="submit" value="signup">CREATE A ACCOUNT</button>
							
						<br><br>
						
							Already  On 500px ?<a href="login.php">Log in</a>
				</FIELDSET>		
			</form>
		</div>
	
</body>
</html>

