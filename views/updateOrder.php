<?php
     require __DIR__."/../controllers/orders_controller.php";
?>


<!--Getting current details of order for display-->
<?php
    $orderObj = new OrdersController();
    $order_id = $_GET["id"];
    $orderDetails = $orderObj -> displayAnOrder($order_id);
?>



<!--Form-->

<!--End Of Form-->



<!--Changing details of the clients-->
<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $class = $_POST['class'];
        $email = $_POST['email'];
        $tel =  $_POST['tel'];
        $bio =  $_POST['bio'];
        $booking_link =  $_POST['booking-link'];

        $results = $orderObj -> changeOrder();
       //header("Location: advisors.php");
    }
?>