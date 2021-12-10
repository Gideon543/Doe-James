<?php
    require __DIR__."/../controllers/orders_controller.php";

    //Get order id from url
    $order_id = $_GET["id"];
    
    //Delete advisor from database
    $deleteOrdObj = new OrdersController();
    $deleteOrdObj -> removeOrder($order_id);
   
    //Redirect to advisor page
    header("Location: clientOrders.php");
?>
