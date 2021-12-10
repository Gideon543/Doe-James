<?php

    require __DIR__."/../models/dashboard_model.php";

    class DashController extends DashModel{
        
        //Display all Companies 
        public function getCompanies(){
            $results = $this -> countCompanies();
            $enlistedComp = mysqli_fetch_all($results, MYSQLI_ASSOC);
            return $enlistedComp[0]["COUNT(1)"];
        }

        //Display Top 5 companies based on assets valuation
        public function getOrders(){
            $results = $this -> totalOrders();
            $orders = mysqli_fetch_all($results, MYSQLI_ASSOC);
            return $orders[0]["COUNT(1)"];
        }

        //Display top 5 companies based on assets valuation
        public function rankedCompanies(){
            $results = $this -> fetchRankedCompanies();
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        public function recommendCompanies($client_id){
            return $this->getMatchCompanies($client_id);
        }
    }




?>