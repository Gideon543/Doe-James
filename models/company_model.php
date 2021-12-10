<?php
    require __DIR__."/../config/database_connection.php";

    class CompanyModel extends DatabaseConnection{
        
        //Select all enlisted companies
        protected function selectAllCompanies(){
            $results = mysqli_query($this -> connect(), 
                "SELECT * FROM companies"
            );
            return $results;
        }

        //Select a particular company
        protected function selectCompany($company_id){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM companies
             WHERE com_id = $company_id"
            );
            return $results;
        }

        //Update company
        protected function updateCompany($company_id, $company_name, $com_type, $trade_name,
        $pass, $email , $ratings, $liq_ratio, 
        $variability, $average_returns, $assets_value, $debts){
            $result = mysqli_query($this -> connect(), 
            "UPDATE `companies` SET `com_name`='$company_name',`password`='$pass',`email`='$email',
            `com_type`='$com_type',`trade_name`='$trade_name',
            `ratings`='$ratings',`liq_ratio`='$liq_ratio',`variability`='$variability',
            `average_returns`='$average_returns',`assets_value`='$assets_value',
            `debts`='$debts'
             WHERE `com_id` = '$company_id'"
            );
        }

        //Delete company
        protected function  deleteCompany($company_id){
            $results = mysqli_query($this -> connect(), 
            "DELETE FROM `companies` WHERE `com_id` = $company_id"
            );  
        }

        //Insert company
        protected function insertCompany($com_name, $pass, $email, $com_type, $trade_name, $ratings,
        $liq_ratio, $variability, $average_returns, $assets_value, $debts){
            $results = mysqli_query($this -> connect(),
            "INSERT INTO `companies`(`com_name`, `password`, `email`, `com_type`, `trade_name`, 
            `ratings`, `liq_ratio`, `variability`, `average_returns`, `assets_value`, `debts`) 
            VALUES ('$com_name','$pass','$email','$com_type','$trade_name','$ratings',
            '$liq_ratio','$variability','$average_returns','$assets_value','$debts')"
           );
       }

       //Select orders from clients
       protected function selectAllOrders(){

       }
   
    }
?>