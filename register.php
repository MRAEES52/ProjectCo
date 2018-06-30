
<!--BootStrap-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="upload.js"></script>
<!---End-->

<?php
//Connects to BrainyCo DB.
require_once('dbconnect.php');	

//Temporary alert function:
function alert($msg) 
{
    echo "<script type='text/javascript'> alert('$msg'); </script>";
}

if (isset($_POST['register_btn']))
{
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $schoolname = mysqli_real_escape_string($conn,$_POST['schoolname']);
    $degree = mysqli_real_escape_string($conn,$_POST['degree']);
    $major = mysqli_real_escape_string($conn,$_POST['major']);
    $firstgen = mysqli_real_escape_string($conn,$_POST['firstgen']);
    $jobinterest = mysqli_real_escape_string($conn,$_POST['jobinterest']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    //Hashing password to store to DB:
    //$password_hashed = hash('sha512',$password);


	//Naming convention for database formality:
    $uc_firstname = ucfirst($firstname);
    $uc_lastname = ucfirst($lastname);
    $uc_email = ucfirst($email);
    $uc_schoolname = ucfirst($schoolname);
    $uc_degree = ucfirst($degree);
    $uc_major = ucfirst($major);
    $uc_firstgen = ucfirst($firstgen);
    $uc_jobinterest = ucfirst($jobinterest);
    
	
	$checkExisting=mysqli_query($conn,"SELECT * FROM student_info WHERE email = '$email'");
	$checkExistingTB=mysqli_fetch_array($checkExisting);
	
	if($checkExistingTB['email'] == $email)
	 {
	 	alert("Email already exists, please contact administrator.");
	 }
	 else
	 {
        $insert=mysqli_query($conn,"insert into student_info(firstname,lastname,email,pass,schoolname,degree,major,firstgen,jobinterest)values('".mysqli_real_escape_string($conn,$firstname)."','".mysqli_real_escape_string($conn,$lastname)."','".mysqli_real_escape_string($conn,$email)."','".mysqli_real_escape_string($conn,"tempPass")."','".mysqli_real_escape_string($conn,$schoolname)."','".mysqli_real_escape_string($conn,$degree)."','".mysqli_real_escape_string($conn,$major)."','".mysqli_real_escape_string($conn,$firstgen)."','".mysqli_real_escape_string($conn,$jobinterest)."')");
       
        if($insert)
	 	{
	 		alert("Administrator account created!");
	 	}
	 	else
	 	{
	 		alert("There has been an error creating your account.");
	 	}
	 }
}

//mysql_close($conn);

?>

<!--Will Place This Script Under JS folder (main.js) once finalized.-->
<script>
function validateUserInputs()
{
	var usernameValidate = document.forms["adminform"]["username"].value;
	var passwordValidate = document.forms["adminform"]["password"].value;
	if (usernameValidate && passwordValidate == "")
	{
		alert("All fields must be filled out");
		return false;
	}	
	else if (/[^a-zA-Z0-9\-\_]/.test(usernameValidate))
	{
		alert("Username cannot have any special characters except for dashes and underscores.");
		return false;
	}
}
</script>
<!--JS script ends here-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BrainyCo - Register </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

	<form action="register.php" method="post" name="studentform" class="form-signin" onsubmit="return validateUserInputs()">       
		    <center><h4 class="form-signin-heading">BrainyCo - Student Registration </h4></center>
			  <hr class="">	  
			  First Name:<input type = "text" class = "form-control" placeholder="Please Enter Your First Name" name="firstname" class="textinput" required maxlength="15">
              Last Name:<input type = "text" class = "form-control" placeholder="Please Enter Your Last Name" name="lastname" class="textinput" required maxlength="15">
              Email:<input type = "text" class = "form-control" placeholder="@example.com" name="email" class="textinput" required maxlength="30">
			 <!-- Password:<input type = "password" class = "form-control" placeholder ="Password will be encrypted" name="password" class="textinput" required> -->
              <br><br>

                <center> 
                <h4> Let us get to know you more... </h2>
                <h5> Please fill out the following below: </h3>
                </center>

             School Name:<input type = "text" class = "form-control" placeholder="" name="schoolname" class="textinput" required maxlength="35">
             Degree:<input type = "text" class = "form-control" placeholder="" name="degree" class="textinput" required maxlength="25">
             Major:<input type = "text" class = "form-control" placeholder="" name="major" class="textinput" required maxlength="25"><br>
             First-generation College Student? <input type="radio" name="firstgen" value="yes"> Yes <input type="radio" name="firstgen" value="no"> No <br><br>
             Job Interest:<input type = "text" class = "form-control" placeholder="ie. Engineering" name="jobinterest" class="textinput" required maxlength="30">

			  <button class="btn abtn-lg btn-primary btn-block"  name="register_btn" value="Register Me Now!" type="submit"> Register Me Now! </button>  			
		</form>		
    
</body>
</html>