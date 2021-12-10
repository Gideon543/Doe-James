

<?php
    require __DIR__."/../controllers/client_controller.php";
    require_once('sidebar.php');
?>


<!--Getting current details of client for display-->
<?php
    $clientObj = new ClientController();
    //$client_id = $_GET["id"];
    $clientDetails = $clientObj -> displayClient(1012);
?>



<!--Form-->

<!--End Of Form-->



<!--Changing details of the clients-->
<?php
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $location =  $_POST['location'];
        $networth =  $_POST['networth'];
        $debts =  $_POST['debts'];
        $risk_tol =  $_POST['risk'];
        $profit_p =  $_POST['profit_p'];

        $results = $clientObj -> changeClient(1012, $fname, $lname, $email , $address, $risk_tol, $debts, $networth, $profit_p, $location);
        header("Location: profile.php");
    }
?>




<!-- HTML starts here -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--Styles.css-->
        <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/sidebar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/signup.css?v=<?php echo time(); ?>" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
        <!--Bootstrap Icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

		<title>Sign up</title>
	</head>
    <!-- Body -->
	<body>
		<div class="login-main">
			<div class="column col p-5">
				<form action="" method="POST">
					<h4 class="mb-2">
                        Hi <?=$clientDetails[0]['client_fname']?>!
                        Do fill out your details to get started. Thankss!
                    </h4>
				
                    <div class="firstLast mb-2">
                        <div class="mb-2 fname">
                            <label for="name" class="form-label">First name</label>
                            <input type="text" class="form-control" placeholder = "First name*" id="fname" name="fname"
                            value = <?=$clientDetails[0]['client_fname']?> />
                            <!-- <small class = "error mt-2"><?=$fnameError?></small>		 -->
                        </div>
            
                        <div class="mb-2 fname">
                            <label for="name" class="form-label">Last name</label>
                            <input type="text" class="form-control" placeholder = "Last name*" id="lname" name="lname"
                            value = "<?=$clientDetails[0]['client_lname']?>"/>
                            <!-- <small class="error"><?=$lnameError?></small> -->
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
						<input type="email" placeholder = "Email" class="form-control" id="email" name="email"
                        value = "<?=$clientDetails[0]['client_email']?>"/>
                        <!-- <small class = "error"><?=$emailError?></small>-->
					</div>

                    <div class="mb-2">
                        <label for="address" class="form-label">Postal address</label>
                        <textarea name = "address" class="form-control" id="address" rows="2"><?=$clientDetails[0]['address']?> </textarea>
                        <!-- <small class = "error"><?=$emailError?></small>-->
					</div>

                    <div class="mb-2">
                        <label for="location" class="form-label">Location</label>
						<input type="text" placeholder = "Location" class="form-control" id="location" name="location"
                        value = "<?=$clientDetails[0]['location']?>"/>
                        <!-- <small class = "error"><?=$emailError?></small>-->
					</div>
                    

                    <div class="firstLast mb-2">
                        <div class="mb-2 fname">
                            <label for="networth" class="form-label">Networth</label>
                            <textarea name = "networth"  class="form-control" id="networth" rows="1"><?=$clientDetails[0]['networth']?> </textarea>
                            <!-- <small class = "error mt-2"><?=$fnameError?></small>		 -->
                        </div>
            
                        <div class="mb-2 fname">
                            <label for="debts" class="form-label">Debts</label>
                            <input type="text" class="form-control" id="debts" name="debts"
                            value = "<?=$clientDetails[0]['debts']?>"/>
                            <!-- <small class="error"><?=$lnameError?></small> -->
                        </div>
                    </div>
                    
                    <div class="firstLast">
                        <div class="mb-2 fname">
                            <label for="risk" class="form-label">Expected risk(in %)</label>
                            <input type="text" class="form-control" id="risk" name="risk"
                            value = "<?=$clientDetails[0]['risk_tolerance']?>" />
                            <!-- <small class = "error mt-2"><?=$fnameError?></small>		 -->
                        </div>
            
                        <div class="mb-2 fname">
                            <label for="name" class="form-label">Expected profit(in %)</label>
                            <input type="text" class="form-control" id="profit_p" name="profit_p"
                            value = "<?=$clientDetails[0]['profit_percent']?>"/>
                            <!-- <small class="error"><?=$lnameError?></small> -->
                        </div>
                    </div>

                    <div class="login mb-2 details">
						<button type="submit" class="btn btn-success mt-3 px-4" name="submit">Update</button>
                        <!-- <a href= "profile.php" class ="ms-2">Back</a> -->
					</div>
				</form>
			</div>
		</div>	
	</body>
</html>