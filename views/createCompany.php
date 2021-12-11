<?php
namespace controllers;
require __DIR__."/../controllers/company_controller.php";

    $companyObj = new CompanyController();

    if(isset($_POST['submit'])) {   
        $name = $_POST['name'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];
        $tel = $_POST['telephone'];
        $class = $_POST['class'];
        $booking_link = $_POST['booking-link']; 

        
        //$results = $companyObj -> addCompany($name, $bio, $class, $email , $tel, $booking_link);
        //header("Location: advisors.php");
    }
?>