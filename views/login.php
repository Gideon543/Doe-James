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
    $emailError = "";
    $passwordError = "";
  
    if(isset($_POST['submit'])) {     
        $password = $_POST['password'];
        $email = $_POST['email'];
      
        //Validate users inputs
        $emailError = $valid -> checkEmail($email);
        $passwordError = $valid -> checkPassword($password);


		$getClientId = '';
		if($authenticate -> loginUser($email, $password, $getClientId)){
			session_start();
            $_SESSION['user_id'] =  $getClientId;
			$_SESSION['valid_user'] = true;
			header("Location: dashboard.php");

		}else{
			$_SESSION['faulty'] = "Incorrect email or password. Try again!";
		}
    }
?>


<!-- HTML begins here -->
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
		<link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>" />
		<title>Login</title>
	</head>
    <!-- Body -->
	<body>
		<div class="login-main">
			<div class="column login-wrapper">
                <img src="https://cdn.robinhood.com/assets/generated_assets/632fcb3e7ed928b2a960f3e003d10b44.jpg" alt="">
			</div>

			<div class="column col">
				<form action="" method="POST">
					<h3 class="mb-5">Welcome to Doe James</h3>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email"/>
						<small class = "error"><?=$emailError?></small>	
					</div>

					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password"/>
						<small class = "error"><?=$passwordError?></small>	
					</div>
                    
                    <div class="form-text">
					 <a href="">Forgot your password?</a>	
					</div>
					
                    <div class="login mb-3 details">
						<button type="submit" class="btn btn-primary btn-lg mt-5 px-4" name="submit">Sign In</button>
                        <p class ="ms-3">Not on Doe James? </p>
                        <a href="signup1.php" class ="ms-1"> Create an account</a>
					</div>
				</form>
			</div>
		</div>	
	</body>
</html>