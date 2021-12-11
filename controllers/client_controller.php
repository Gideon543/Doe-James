<?php
namespace controllers;
    require __DIR__."/../models/client_model.php";

    class ClientController extends ClientModel{
        
        
        //Create a new client
        // , $address, $risk_tol, $debts, $networth, $profit_p, $location
        public function addClient ($fname, $lname, $pass, $email){
            $results = $this -> insertClient($fname, $lname, $pass, $email);
            return $results;
        }
        
        //Access a client by id
        public function displayClient($client_id){
            $results = $this -> selectClient($client_id);
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Access a client by email
        public function displayEmail($email){
            $results = $this -> selectEmail($email);
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Access a client by email and passwoard
        public function displayEmailPass($email, $password){
            $results = $this -> selectEmailPass($email, $password);
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Display all clients
        public function displayAllClients(){
            $results = $this -> selectAllClients();
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Change details of a client
        public function changeClient($client_id, $fname, $lname, $email , $address, $risk_tol, $debts, $networth, $profit_p, $location){
            $results = $this -> updateClient($client_id, $fname, $lname, $email , $address, $risk_tol, $debts, $networth, $profit_p, $location);
            echo "Done";
        }

        //Delete Client
        public function removeClient($client_id){
           $results = $this -> deleteClient($client_id);
        }

        //Display best company match for clients
        public function displayMatches($client_id){
            $results = $this -> matchClient($client_id);
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }
    }

?>