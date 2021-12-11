<?php
namespace controllers;
    require __DIR__."/../controllers/client_controller.php";

    $clientObj = new ClientController();

    if(isset($_POST['submit'])) {   
        $name = $_POST['name'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];
        $tel = $_POST['telephone'];
        $class = $_POST['class'];
        $booking_link = $_POST['booking-link']; 

        
        $results = $clientObj -> addAdvisor($name, $bio, $class, $email , $tel, $booking_link);
        //header("Location: advisors.php");
    }
    ?>