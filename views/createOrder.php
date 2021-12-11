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
  
<?php require_once('sidebar.php') ?>
<?php
    session_start();
    if(!isset($_SESSION['valid_user'])){
        header("Location: login.php");
    }
        
    $client_id = $_SESSION['user_id'];   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASSAP|DASHBOARD</title>
    <!--Styles.css-->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <!-- Bootstap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body>
  

    <div class="main-content">
        <div>
            <h1></h1>
        </div>
        
        <!--Form-->
        <form method = "POST" action = "" class="row g-3 m-5">
                            <div class="col-md-12">
                                <label for="inputName" class="form-label">Order Type</label>
                                <select id="inputType" class="form-select" name="orderType">
                                    <option selected>BUY</option>
                                    <option>BUY</option>
                                    <option>SELL</option>
                                </select>

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
                                <input type="text" name="client_id" class="form-control" id="inputBookLink" value = "<?=$client_id?>" hidden>
                                <input type="number" class="form-control" id="emailInput" name="companies" value = <?=$_GET["id"]?> hidden>
                            </div>

                            <button type="submit" name="submit" class="btn btn-custum-color my-3">Order Now</button>

        </form>
                            

        <!--/Form-->
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>


































<?php
require __DIR__."/../controllers/orders_controller.php";

    $ordersObj = new OrdersController();

    if(isset($_POST['submit'])) {
        $client_id = $_POST['client_id'];  
        $order_type = $_POST['orderType'];
        $com_id = $_POST['companies'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $commission = $_POST['commission'];

        

        
        $results = $ordersObj -> createAnOrder($client_id, $com_id, $order_type, $quantity, $price, $commission);
        //header("Location: advisors.php");
    }
?>