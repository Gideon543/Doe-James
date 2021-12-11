<?php
namespace controllers;
    require __DIR__."/../config/validation.php";
    require __DIR__."/../config/authentication.php";
    
    //Instance of validation class to check users' input.
    $valid = new Validation();
    $authenticate = new Authentication(); 
?>

<?php
    //To display errors in the html code
    $fnameError = "";
    $lnameError = "";
    $emailError = "";
    $passwordError = "";
    $confirmError = "";
    $emailError = "";
    

    if(isset($_POST['submit'])) {   
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $email = $_POST['email'];
      
        //Validate users input
        $fnameError = $valid -> checkEmptyFields($fname);
        $lnameError = $valid -> checkEmptyFields($lname);
        $emailError = $valid -> checkEmail($email);
        $passwordError = $valid -> checkPassword($password);
        $confirmError = $valid -> comparePasswords($password, $confirm);
        
        //Get number of errors
        $errorCount = $valid -> getErrorCount();
        

        //Register if email is not taken.
        $authenticate->registerUser($errorCount, $fname, $lname, base64_encode($password), $email);
        header("location: index.php");
    }
?>

<!-- HTML starts here -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="../css/signup.css?v=<?php echo time(); ?>" />
		<title>Sign up</title>
	</head>
    <!-- Body -->
	<body>
		<div class="login-main">
			<div class="column login-wrapper">
                <img src="https://cdn.robinhood.com/assets/generated_assets/632fcb3e7ed928b2a960f3e003d10b44.jpg" alt="">
			</div>

			<div class="column col p-5">
				<form action="" method="POST">
					<h3 class="mb-2">Begin your investment journey with us!</h3>
                    <p class="mb-4"><em> Please fill all required fields.</em></p>
				
                    <div class="firstLast mb-4">
                        <div class="mb-3 fname">
                            <input type="text" class="form-control" placeholder = "First name*" id="fname" name="fname" />
                            <small class = "error mt-2"><?=$fnameError?></small>		
                        </div>
            
                        <div class="mb-3 fname">
                            <input type="text" class="form-control" placeholder = "Last name*" id="lname" name="lname"/>
                            <small class="error"><?=$lnameError?></small>
                        </div>
                    </div>
                    

                    <div class="mb-4">
						<input type="email" placeholder = "Email" class="form-control" id="email" name="email"/>
                        <small class = "error"><?=$emailError?></small>		
					</div>

                    <div class="mb-4">
						<input type="password" placeholder="Password" class="form-control" id="email" name="password"/>
                        <small class = "error"><?=$passwordError?></small>			
					</div>

                    <div class="mb-4">
						<input type="password" placeholder ="Confirm password" class = "form-control" id="email" name="confirm"/>
                        <!-- <small class = "error"><?=$confirmError?></small>			 -->
					</div>
                    
                    <div class="form-text">
					 <a href="">Forgot your password?</a>	
					</div>
					
                    <div class="login mb-3 details">
						<button type="submit" class="btn btn-primary btn-lg mt-5 px-4" name="submit">Sign Up</button>
                        <p class ="ms-3">Already have an account? </p>
                        <a href="login.php" class ="ms-1"> Log in</a>
					</div>
				</form>
			</div>
		</div>	
	</body>
</html>