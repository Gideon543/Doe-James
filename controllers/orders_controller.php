<?php
namespace controllers;
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

        //Remove an order
        public function removeOrder($order_id){
            $results = $this -> deleteAnOrder($order_id);
        }
    }










?>