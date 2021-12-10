<?php
namespace controllers;
    require __DIR__."/../config/database_connection.php";
    class OrdersModel extends DatabaseConnection{
        
        //Insert an order
        protected function insertAnOrder($client_id, $com_id, $order_type, $quantity, $price, $commission){
            $sql = "INSERT INTO `orders`(`client_id`, `com_id`, `order_type`, `quantity`, `price`, `commission`) 
            VALUES ('$client_id', '$com_id','$order_type','$quantity','$price','$commission')";
            $result = mysqli_query($this -> connect(), $sql);
        }

        //Select all orders
        protected function fetchAllOrders($client_id){
            $sql =  "SELECT orders.order_id AS order_id, companies.com_name AS company, 
            orders.quantity AS quantity, orders.order_type AS order_type 
            FROM orders INNER JOIN companies ON orders.com_id = companies.com_id
            WHERE client_id = $client_id";           
            $result = mysqli_query($this -> connect(), $sql);
            return $result;
        }

        //Delete an order
        protected function deleteAnOrder($order_id){
           $sql = "DELETE FROM `orders` WHERE `order_id` = '$order_id'";
           $result = mysqli_query($this -> connect(), $sql);
        }
    }







?>