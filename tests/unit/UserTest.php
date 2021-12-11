<?php

use function PHPSTORM_META\type;

require "./controllers/client_controller.php";


class UserTest extends \PHPUnit\Framework\TestCase
{
    // Testing adding a user to the database
    public function testforRegistration() 
    {
        $crud = new controllers\ClientController;

        $status = $crud->addClient('David', 'Quarshie', '@Heriosd3333', 'davidquarsh@gmail.com');

        $this->assertEquals($status, true);
    }

    public function testAccessToEmailPassword() 
    {
        $crud = new controllers\ClientController;

        $status = $crud->displayEmailPass('davidquarsh@gmail.com', '@Heriosd3333');

        $this->assertEquals(is_array($status), true);
    }

    public function testdisplayMatches() 
    {
        $crud = new controllers\ClientController;

        $status = $crud->displayMatches(1003);

        $result = $this->assertEquals(is_array($status), true);

        foreach ($status as $key => $value) {
            var_dump($value);
        }
        return $result;
    }
}
?>