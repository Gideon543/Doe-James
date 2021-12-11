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
    <title>CASSAP|DASHBOARD</title>
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


<!-- Modal Form -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title px-5" id="exampleModalLabel">Place An Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Form-->
                        <form id = "form" class="row g-3 px-5 px-2" method = "POST" action = "createOrder.php">
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Order Type</label>
                                <select id="inputType" class="form-select" name="orderType">
                                    <option selected>BUY</option>
                                    <option>BUY</option>
                                    <option>SELL</option>
                                </select>

                            </div>
                            <div class="col-md-12">
                                <label for="emailInput" class="form-label">Enter company's trade name</label>
                                <input type="number" class="form-control" id="emailInput" maxlength="4" name="companies">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputTel" class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="inputTel">
                            </div>
                            <div class="col-md-12">
                                <label for="inputClass" class="form-label">Price per stock</label>
                                <input type="text" name="price" class="form-control" id="inputClass" value = "10" readonly>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="text" name="commission" class="form-control" id="inputBookLink" value = "0.1" hidden>
                                <input type="text" name="client_id" class="form-control" id="inputBookLink" value = "1003" hidden>
                                <input type="text" name="company_id" class="form-control" id="inputBookLink" value = "1003" hidden>
                            </div>

                            <button type="submit" name="submit" class="btn btn-custum-color my-3">Order Now</button>
                        </form>
                         <!--/Form-->
                    </div>
                </div>               
            </div>
        </div>                            




























        <div class="add-person">
            <a title="Add a person" href="" id="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="bi bi-person-plus-fill"></i></a>
        </div>

        <!-- Modal Form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title px-5" id="exampleModalLabel">Add Peer Advisor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Form-->
                        <form class="row g-3 px-5 px-2" method = "POST" action ="createCPA.php">
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="inputName">
                            </div>
                            <div class="col-md-12">
                                <label for="emailInput" class="form-label">Emial</label>
                                <input type="email" class="form-control" id="emailInput" name="email">
                            </div>
                            <div class="col-12">
                                <label for="inputBio" class="form-label">Bio</label>
                                <textarea name="bio" class="form-control" id="inputAddress" rows="3"
                                    placeholder="A third year student intereted in ..."></textarea>
                            </div>
                            <div class="col-12">
                                <label for="inputTel" class="form-label">Telephone Number</label>
                                <input type="text" name="telephone" class="form-control" id="inputTel"
                                    placeholder="+233542893998">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="inputBookLink" class="form-label">Booking Link</label>
                                <input type="url" name="booking-link" class="form-control" id="inputBookLink">
                            </div>
        
                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Class</label>
                                <select id="inputType" class="form-select" name="course">
                                    <option selected>2023</option>
                                    <option>2022</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Course</label>
                                <select id="inputType" class="form-select" name="class">
                                    <option selected>CS</option>
                                    <option>MIS</option>
                                    <option>ENG</option>
                                    <option>BA</option>
                                    <option>ME</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-custum-color my-4">Edit</button>
                        </form>
                         <!--/Form-->
                    </div>
                </div>               
            </div>

        </div> <!--/ Modal -->

    </div>
    <!-- /main -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

=======
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
    <title>CASSAP|DASHBOARD</title>
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


<!-- Modal Form -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title px-5" id="exampleModalLabel">Place An Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Form-->
                        <form id = "form" class="row g-3 px-5 px-2" method = "POST" action = "createOrder.php">
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Order Type</label>
                                <select id="inputType" class="form-select" name="orderType">
                                    <option selected>BUY</option>
                                    <option>BUY</option>
                                    <option>SELL</option>
                                </select>

                            </div>
                            <div class="col-md-12">
                                <label for="emailInput" class="form-label">Enter company's trade name</label>
                                <input type="number" class="form-control" id="emailInput" maxlength="4" name="companies">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputTel" class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="inputTel">
                            </div>
                            <div class="col-md-12">
                                <label for="inputClass" class="form-label">Price per stock</label>
                                <input type="text" name="price" class="form-control" id="inputClass" value = "10" readonly>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="text" name="commission" class="form-control" id="inputBookLink" value = "0.1" hidden>
                                <input type="text" name="client_id" class="form-control" id="inputBookLink" value = "1003" hidden>
                                <input type="text" name="company_id" class="form-control" id="inputBookLink" value = "1003" hidden>
                            </div>

                            <button type="submit" name="submit" class="btn btn-custum-color my-3">Order Now</button>
                        </form>
                         <!--/Form-->
                    </div>
                </div>               
            </div>
        </div>                            




























        <div class="add-person">
            <a title="Add a person" href="" id="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="bi bi-person-plus-fill"></i></a>
        </div>

        <!-- Modal Form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title px-5" id="exampleModalLabel">Add Peer Advisor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Form-->
                        <form class="row g-3 px-5 px-2" method = "POST" action ="createCPA.php">
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="inputName">
                            </div>
                            <div class="col-md-12">
                                <label for="emailInput" class="form-label">Emial</label>
                                <input type="email" class="form-control" id="emailInput" name="email">
                            </div>
                            <div class="col-12">
                                <label for="inputBio" class="form-label">Bio</label>
                                <textarea name="bio" class="form-control" id="inputAddress" rows="3"
                                    placeholder="A third year student intereted in ..."></textarea>
                            </div>
                            <div class="col-12">
                                <label for="inputTel" class="form-label">Telephone Number</label>
                                <input type="text" name="telephone" class="form-control" id="inputTel"
                                    placeholder="+233542893998">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="inputBookLink" class="form-label">Booking Link</label>
                                <input type="url" name="booking-link" class="form-control" id="inputBookLink">
                            </div>
        
                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Class</label>
                                <select id="inputType" class="form-select" name="course">
                                    <option selected>2023</option>
                                    <option>2022</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Course</label>
                                <select id="inputType" class="form-select" name="class">
                                    <option selected>CS</option>
                                    <option>MIS</option>
                                    <option>ENG</option>
                                    <option>BA</option>
                                    <option>ME</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-custum-color my-4">Edit</button>
                        </form>
                         <!--/Form-->
                    </div>
                </div>               
            </div>

        </div> <!--/ Modal -->

    </div>
    <!-- /main -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

>>>>>>> a1c4c34d0a0d9a21c5ac157a4355a82ed31560c0
</html>