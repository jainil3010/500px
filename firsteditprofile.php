<!DOCTYPE html>
<html>
<head>
	<title>EDIT PROFILE</title>
	<link rel="stylesheet" type="text/css" href="css/firsteditprofile.css">
</head>
<body>
  <div class="content">  
     <center><h1><?php 
                        include("server.php");
                        session_start();
                        $loggedonuser = $_SESSION["name"];
                        $loggedonemail = $_SESSION["pasemail"];
                        echo "WELCOME TO THE 500px...!!<br>$loggedonuser";     
                 ?>  
    </h1></center>
    <hr>
     <br>
    	<!-- profile photo -->
    	<div class="profile">
                <?php
            
                     $loggedonuser = $_SESSION["name"];
                     

                    if (isset($_POST['file'])) 
                    {
                            $name = "profilepic";
                            $oldname = $_FILES['file']['name'];
                            $ext = strtolower(substr(strchr($oldname,'.'),1)); //get extension
                            $newname = $name . ".". $ext; //combine name and extension
                            move_uploaded_file($_FILES['file']['tmp_name'],"userdata/$loggedonuser/".$newname); //move to the folder 
                            
                            $q = mysqli_query($conn,"UPDATE `$loggedonuser` SET pimage = '".$newname."' WHERE username = '".$loggedonuser."'"); //store in database
                    }         
                            $q = mysqli_query($conn,"SELECT * FROM `$loggedonuser`");

                        while($row = mysqli_fetch_assoc($q))
                        {
                           
                            if($row['pimage'] == "profilepic.")
                            {
                                echo "<img class='img-circle' src='Photos/profilepic.png' alt='Default Profile Pic'>"; //show default image
                            } else 
                            {
                                echo "<img class='img-circle' src='userdata/$loggedonuser/".$row['pimage']."' alt='Profile Pic'>"; //show after change img
                            }
                        }
                      
                    if (isset($_POST['changepersonal']))
                        {
                            
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $dob = $_POST['dob'];   

                                $sql = "UPDATE $loggedonuser SET username = '$loggedonuser', firstname = '$firstname', lastname = '$lastname', dob = '$dob' ";

                                        if (mysqli_query($conn, $sql))
                                        {
                                            header('location: feed.html');
                                        } 
                                        else
                                        {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }
                                          
                        }

                    

                ?>
        </div>
        <div class="uploadicon"> 
            <h2>Change photo...!!</h2>
                    <form class="image-upload"  method="post" enctype="multipart/form-data">
                        <input type="file" name="file" ><br>
                        <BUTTON class="hide"  type="submit" name="change">CHANGE THE PHOTO</BUTTON>
                    </form>
                
        </div>
                 <br> 
            <!-- edit form column -->
        <div class="Personal">
            <form class="form" method="post">
                <FIELDSET>
                    <legend align="center"><h3>PERSONAL INFORMATION</h3></legend>
                        <center>
                            <input class="txt" type="text" name="firstname" placeholder="FIRST NAME" ><br><br>

                            <input class="txt" type="text" name="lastname" placeholder="LAST NAME"><br><br>
                        
                            <input class="txt" type="tel" name="contact" placeholder="CONTACT NO" pattern="[6-9]{1}[0-9]{9}"><br><br>
                        
                            <input class="txt" type="date" name="dob" placeholder="DATE OF BIRTH"><br><br>
                            
                            <button class="btn" type="submit" name="changepersonal">SAVE CHANGES</button>
                        </center>
                        
                </FIELDSET>     
            </form>                                         
        </div>  
        <br><br>   
    <hr>
  </div>  
</body>
</html>
