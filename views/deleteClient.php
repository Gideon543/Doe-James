<?php
    require __DIR__."/../controllers/client_controller.php";

    //Get client id from url
    $client_id = $_GET["id"];
    
    //Delete advisor from database
    $deleteClientObj = new ClientController();
    $deleteClientObj -> removeClient($client_id);

    //Redirect to advisor page
    //header("Location: advisors.php");
?>
