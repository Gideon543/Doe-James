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
        header("Location: login.php");
    }
        
    $client_id = $_SESSION['user_id'];   
?>

<!--SIDEBAR-->
<?php 
    require_once('sidebar.php');
    require_once __DIR__."/../controllers/orders_controller.php";
?>

<!--Getting records from database-->
<?php
    $orderObj = new OrdersController();
    $orders = array();
    $orders = $orderObj -> displayAllOrders($client_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doe James</title>
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
                <button type="submit" class ="px-3 py-1">Search</button>
            </form>
        </div>
        <!--Container div for table-->
        <div class="table-responsive m-5">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Stock Quantity</th>
                        <th>Company Name</th>
                        <th>Order Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($orders as $value){
                ?>
                            <tr>
                               <td> <?= $value['quantity']?></td>
                               <td> <?= $value['company']?></td>
                               <td class = "ps-4"><?= $value["order_type"]?></td>
                               <td><a href="updateOrder.php?id=<?= $value["order_id"]?>"><i class="bi bi-pencil-square"></i></a> <a href="deleteOrder.php?id=<?= $value["order_id"]?>"><i
                                            class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                            }
                        ?> 
                </tbody>
            </table>
        </div>
        <!-- Button trigger modal - Place order -->
        <!-- <div class="add-person">
            <a title="Add a person" href="" id="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="bi bi-cart-plus-fill"></i></a>
        </div> -->



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
                            </div>

                            <button type="submit" name="submit" class="btn btn-custum-color my-3">Order Now</button>
                        </form>
                         <!--/Form-->
                    </div>
                </div>               
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>