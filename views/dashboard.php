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

use controllers\DashController;

?>

<!--SIDEBAR-->
<?php
    session_start();
    if(!isset($_SESSION['valid_user'])){
        header("location: ../index.php");
    }   
    $client_id = $_SESSION['user_id'];   
?>
    

<!--GETTING DATA FROM DATABASE-->
<?php
    require __DIR__."/../controllers/dashboard_controller.php";
    require_once('sidebar.php');
    
    $countObj = new DashController();
    $totalCompanies = $countObj -> getCompanies();
    $totalOrders = $countObj -> getOrders($client_id);
    $topCompanies = $countObj -> rankedCompanies();
    $recomCompanies = $countObj -> recommendCompanies($client_id);    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dow James | Dashboard</title>
    <!--Styles.css-->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/sidebar.css?v=<?php echo time(); ?>">
    <!-- Bootstap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="main-content">
        <div class="container">

        
        <div class="row dash-row mt-5">
            <div class="col-sm">
                <div class="dash-items">
                    <span><i class="bi bi-people"></i></span>
                    <span class="num-count"><?= $totalCompanies?></span>
                    <span>Companies</span>
                </div>
            </div>
            <div class="col-sm">
                <div class="dash-items">
                    <span><i class="bi bi-cart"></i></span>
                    <span class="num-count"><?= $totalOrders ?></span>
                    <span>Orders</span>
                </div>
            </div>
            <div class="col-sm">
                <div class="dash-items">
                    <span><i class="bi bi-calendar4-event"></i></i></span>
                    <span class="num-count"><?= $recomCompanies ?></span>
                    <span>Recommended Companies</span>
                </div>
            </div>
        </div>
        </div>
        <div class="heading mx-5 my-5">
            <h3>Top Companies Ranked By Assets</h3>
        </div>
        <div class="table-responsive mx-5 my-2">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Total Assets(in cedis)</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($topCompanies as $value){
                ?>
                            <tr>
                               <td> <?= $value['companies']?></td>
                               <td> <?= $value['assets_value']?></td>
                            </tr>
                <?php
                    }
                ?> 
                </tbody>
            </table>
        </div>
    </div>
   
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>