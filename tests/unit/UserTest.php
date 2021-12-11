<?php

require "Doe-James/controllers/client_controller.php";


class UserTest extends \PHPUnit\Framework\TestCase
{
    // Testing adding a user to the database
    public function testforRegistration() 
    {
        $crud = new controllers\ClientController;

        $password = base64_encode("derdanson221");

        $status = $crud->addClient('David', 'Quarshie', '@Heriosd3333', 'davidquarsh@gmail.com');

        !$this->assertCount($status, 0);
    }

    public function testAccessToEmailPassword() 
    {
        $crud = new controllers\ClientController;

        $password = base64_encode("derdanson221");

        $status = $crud->displayEmailPass('davidquarsh@gmail.com', '@Heriosd3333');

        !$this->assertCount(sizeof($status), 0);
    }
}
?>