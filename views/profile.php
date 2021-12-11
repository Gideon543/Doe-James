<?php 
namespace controllers;
/*
*********************************************************************************
A Web Site for Ashesi Career Services Department
*********************************DASHBOARD***************************************
Date started: 10th November, 2021
Date completed:  November, 2021
**********************************************************************************
*/
?>

<?php
    session_start();
    if(!isset($_SESSION['valid_user'])){
        header("Location: index.php");
    }
        
    $client_id = $_SESSION['user_id'];   
?>

<!--SIDEBAR-->
<?php 
    require_once('sidebar.php'); 
    require __DIR__."/../controllers/client_controller.php";
?>

<!--Getting records from database-->
<?php
    $clientObj = new ClientController();
    //$client_id = $_GET["id"];
    $clientDetails = $clientObj -> displayClient($client_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dow James | Profile</title>
    <!--Styles.css-->
    <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/sidebar.css?v=<?php echo time(); ?>">
    <!-- Bootstap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="main-content">
        <div class="profile-content">
            <div class="profile-img">
                <a href = ""><img src="../assets/images/dow_jones.png" alt=""></a>
            </div>

            <div class="profile-info">
                <div class="card m-5 mt-3 px-4" style="max-width: 400px;">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h3 class="card-title mb-4"><?=$clientDetails[0]['client_fname']?> <?=$clientDetails[0]['client_lname']?>!</h5>
                                <p class="card-text"> Welcome back! Here is a snapshot of your profile so far!</p>
                                <h5 mt-2>Contact</h5>
                                <p class="card-text"><?=$clientDetails[0]['client_email']?></p>

                                <h5>Investment Profile</h5>
                                <p class="card-text"> Networth: <?=$clientDetails[0]['networth']?></p>
                                <p class="card-text"> Debts: <?=$clientDetails[0]['debts']?></p>
                                <p class="card-text"> Expected returns: <?=$clientDetails[0]['profit_percent']?></p>
                                <p class="card-text"> Risk tolerance: <?=$clientDetails[0]['risk_tolerance']?></p>

                                <h5 mt-2>Location</h5>
                                <p class="card-text"><?=$clientDetails[0]['address']?>,<?=$clientDetails[0]['location']?></p>
                            </div>
                        </div>
                     </div>
                </div>  
            </div>

            <div class="profil-edit">
                <a href= <?= "updateClient.php?id=" ?>>
                    <button class="btn btn-custum-color my-3"><i class="bi bi-pencil-fill pe-2"></i>Edit Profile</button>
                 </a>
            </div>
        </div>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>