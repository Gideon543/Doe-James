<?php
     require __DIR__."/../controllers/company_controller.php";
?>


<!--Getting current details of company for display-->
<?php
    $companyObj = new CompanyController();
    $company_id = $_GET["id"];
    $commpanyDetails = $clientObj -> displayCompany($company_id);
?>



<!--Form-->

<!--End Of Form-->



<!--Changing details of the company-->
<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $class = $_POST['class'];
        $email = $_POST['email'];
        $tel =  $_POST['tel'];
        $bio =  $_POST['bio'];
        $booking_link =  $_POST['booking-link'];

        $results = $companyObj -> changeCompany($company_id, $company_name, $com_type, $trade_name,
                                                $pass, $email , $ratings, $liq_ratio, 
                                                $variability, $average_returns, $assets_value, $debts);
       //header("Location: advisors.php");
    }
?>