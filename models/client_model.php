<?php
namespace controllers;
    require __DIR__."/../config/database_connection.php";

    class ClientModel extends DatabaseConnection{
        
        //Select all clients
        protected function selectAllClients(){
            $results = mysqli_query($this -> connect(), 
                "SELECT * FROM clients"
            );
            return $results;
        }

        //Select a particular client
        protected function selectClient($client_id){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM clients
             WHERE client_id = $client_id"
            );
            return $results;
        }

        //Select a client by email
        protected function selectEmail($email){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM clients
             WHERE `client_email` = '$email'"
            );
            return $results;
        }

        //Select a client's email and passwoard for authentication
        protected function selectEmailPass($email, $password){
            $results = mysqli_query($this -> connect(), 
            "SELECT * FROM `clients`
             WHERE `client_email`='$email' AND `password`='$password'"
            );
            return $results;
        }


        //Update client
        protected function updateClient($client_id, $fname, $lname, $email , $address, $risk_tol, $debts, $networth, $profit_p, $location){
            $result = mysqli_query($this -> connect(), 
            "UPDATE `clients` SET `client_fname` = '$fname', `client_lname` = '$lname',
              `client_email` = '$email', `address` = '$address', `risk_tolerance` = '$risk_tol', 
             `debts` = '$debts', `networth` = '$networth',
             `profit_percent` = '$profit_p', `location` = '$location'
             WHERE `client_id` = '$client_id'"
            );
        }

        //Delete client
        protected function  deleteClient($client_id){
            $results = mysqli_query($this -> connect(), 
            "DELETE FROM `clients` WHERE `client_id` = $client_id"
            );  
        }

        //Insert client
        //  , $address, $risk_tol, $debts, $networth, $profit_p, $location
        // `address`, `risk_tolerance`, `debts`, `networth`, `profit_percent`, `location`
        protected function insertClient($fname, $lname, $pass, $email){
            $results = mysqli_query($this -> connect(),
            "INSERT INTO `clients`(`client_fname`, `client_lname`, `password`, `client_email`) 
            VALUES ('$fname','$lname','$pass','$email')"
           );
           return $results;
       }

       //Find the best match for client
       protected function matchClient($client_id){
           $fetchClientAsset = $this -> selectClient($client_id);
           $querryResults = mysqli_fetch_all($fetchClientAsset, MYSQLI_ASSOC);
           $clientAsset = $querryResults[0]["networth"];
           
           $results = mysqli_query($this -> connect(), 
           "SELECT * FROM `companies`  WHERE `assets_value` <= '$clientAsset'"
            );
            return $results;
       }

   
    }
?>