<?php
namespace controllers;
    require __DIR__."/../models/client_model.php";

    class DashModel extends ClientModel{
        
        //Fetch Count of Companies 
        protected function countCompanies(){
            $results = mysqli_query($this -> connect(), 
                "SELECT COUNT(1) FROM `companies`"
            );
            return $results;
        }

        //Fetch top 5 companies based on assets valuation
        protected function totalOrders(){
            $results = mysqli_query($this -> connect(), 
            "SELECT COUNT(1) FROM `orders`"
            );
            return $results;
        }

        //Fetch top 5 companies based on assets valuation
        protected function fetchRankedCompanies(){
            $results = mysqli_query($this -> connect(), 
            "SELECT assets_value, com_name AS companies
            FROM companies
            ORDER BY assets_value DESC;"
            );
            return $results;
        }

        //Fetch number of recommended companies for client
        protected function getMatchCompanies($client_id){
            $results = $this -> matchClient($client_id);
            $array = mysqli_fetch_all($results, MYSQLI_ASSOC);
            return sizeof($array);
        }

    }




?>