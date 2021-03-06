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

<!--SIDEBAR-->
<?php 
    require_once('sidebar.php');
    require __DIR__."/../controllers/company_controller.php"; 
?>

<!--Getting records from database-->
<?php
    $comObj = new CompanyController();
    $companies = array();
    $companies = $comObj -> displayAllCompanies();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dow James | Dashboard</title>
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
        <!--Search Form-->
        <div class="search-c m-5">
            <form action="" method="post">
                <input type="text" placeholder="Search">
                <button type="submit">Search</button>
            </form>
        </div>
                <?php
                    foreach($companies as $value){
                ?>
                                      
                <div class="card m-5" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['com_name']?></h5>
                                <p class="card-text">Trade Name: <?= $value["trade_name"]?><span class = "ms-3">Ratings: <?= $value["ratings"]?></span></p>
                                <p class="card-text">Total Assets Value: <?= $value["assets_value"]?></p>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                
                                <a title="Add a person" href= <?= "createOrder.php?id=" . $value["com_id"]?>>
                                    <button class="btn btn-custum-color my-3">Add to orders</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>                            
         </div>                         
    </div>
    <!-- /main -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>