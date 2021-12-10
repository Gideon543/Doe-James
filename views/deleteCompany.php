<?php
    require __DIR__."/../controllers/company_controller.php";

    //Get client id from url
    $company_id = $_GET["id"];
    
    //Delete advisor from database
    $deleteComObj = new CompanyController();
    $deleteComObj -> removeCompany($company_id);

    //Redirect to advisor page
    //header("Location: advisors.php");
?>
