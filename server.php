<?php
	
	$username = "";
	$email = "";
	$errors = array();
	
	include("connection/config.php");

	if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		
		//if empty

		if (empty($username))
		{
			array_push($errors, "User name is required");
		}
		if (empty($email))
		{
			array_push($errors, "Email ID is required");
		}
		if (empty($password_1))
		{
			array_push($errors, "Password is required");
		}
		if ($password_1 != $password_2)
		{
			array_push($errors,"The two password do  not match");
		}

		//validation
		


		//only one user
				
				$user_check_query = "SELECT * FROM userdata WHERE username='$username' OR email='$email' LIMIT 1";
		  		$result = mysqli_query ($conn,$user_check_query);
		  		$user = mysqli_fetch_assoc($result);
		  
		  if ($user) 
		  {
		    // if user exists
		    if ($user['username'] === $username) 
		    {
		      array_push($errors, "Username already exists");
		    }
		    if ($user['email'] === $email)
		    {
		      array_push($errors, "email already exists");
		    }
		  }
		

		// enter data
		if (count($errors) == 0) 
		{
			$newname=$username;
			$password = md5($password_1);
			$table = "CREATE TABLE temp_name(
						id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						username VARCHAR(50) NOT NULL,
						firstname VARCHAR(30),
						lastname VARCHAR(30),
						dob DATE,
						email VARCHAR(50) NOT NULL,
						pimage VARCHAR(50)
						)";
			$sql = "INSERT INTO userdata (username,email,password)
					VALUES ('$username','$email','$password')";
					if (mysqli_query($conn, $sql))
					{
						if ( mysqli_query($conn,$table)) 
						{
							mysqli_query($conn,"INSERT INTO temp_name (username,firstname,lastname,email,pimage) VALUES ('$username','','','$email','profilepic.')");
							mkdir("userdata/$newname");
							session_start();
							$name=$username;
							$_SESSION["name"] = "$name";
							mysqli_query($conn, "RENAME TABLE `temp_name`  TO `$newname`");
							header('location: firsteditprofile.php');
 						}
 						else
 						{
 							echo "error";
 						}
					} 
					else
		 			{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		 			}	
		}	
	}

			// LOGIN USER
			
			if (isset($_POST['login'])) 
			{
			  $username =$_POST['username'];
			  $password =$_POST['password'];

			  if (empty($username))
			  {
			  	array_push($errors, "Username is required");
			  }
			  if (empty($password))
			  {
			  	array_push($errors, "Password is required");
			  }
			  

			  if (count($errors) == 0) 
			  {
			  	$password = md5($password);
			  	$query = "SELECT * FROM userdata WHERE username='$username' AND password='$password'";
			  	$result = mysqli_query($conn, $query);
			  	$count = mysqli_num_rows($result);
			  	if($count == 1) 
			  	{
			  	  $_SESSION['username'] = $username;
			  	  $_SESSION['success'] = "You are now logged in";
			  	  header('location: feed.html');
			  	}
			  	else 
			  	{
			  		array_push($errors, "Wrong username/password combination");
			  	}
			  }
			}
	
 ?>