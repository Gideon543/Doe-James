<?php
    require __DIR__."/../models/orders_model.php";

    class OrdersController extends OrdersModel{

        //Create an order
        public function createAnOrder($client_id, $com_id, $order_type, $quantity, $price, $commission){
            $results = $this -> insertAnOrder($client_id, $com_id, $order_type, $quantity, $price, $commission);  
        }

        //Display all orders
        public function displayAllOrders($client_id){
            $results = $this -> fetchAllOrders($client_id);
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Display a particular order
        public function displayAnOrder(){
            $results = $this -> fetchAnOrder();
            return mysqli_fetch_all($results, MYSQLI_ASSOC);
        }

        //Change details of an order
        public function changeOrder(){
            $results = $this -> updateAnOrder();
        }

        //Remove an order
        public function removeOrder($order_id){
            $results = $this -> deleteAnOrder($order_id);
        }
    }










?>