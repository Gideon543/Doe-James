<?php
    require __DIR__."/../models/company_model.php";

    class CompanyController extends CompanyModel{
        
        
        //Create a company
        public function addCompany ($com_name, $pass, $email, $com_type, $trade_name, $ratings,
                                    $liq_ratio, $variability, $average_returns, $assets_value, $debts){
            $results = $this -> insertCompany($com_name, $pass, $email, $com_type, $trade_name, $ratings,
                                            $liq_ratio, $variability, $average_returns, $assets_value, $debts);
        }
        
        //Display a particular company
        public function displayCompany($company_id){
            $results = $this -> selectCompany($company_id);
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Display all companies
        public function displayAllCompanies(){
            $results = $this -> selectAllCompanies();
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Change details of a particular company
        public function changeCompany($company_id, $company_name, $com_type, $trade_name,
                                        $pass, $email , $ratings, $liq_ratio, 
                                        $variability, $average_returns, $assets_value, $debts){
            $results = $this ->updateCompany($company_id, $company_name, $com_type, $trade_name,
                                                $pass, $email , $ratings, $liq_ratio, 
                                                $variability, $average_returns, $assets_value, $debts);
        }

        //Delete a company
        public function removeCompany($company_id){
           $results = $this -> deleteCompany($company_id);

        }

        //Display all client orders
        public function displayAllOrders(){
            selectAllOrders();
        }

    }

?>