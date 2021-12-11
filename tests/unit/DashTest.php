<?php

    class DashTest extends \PHPUnit\Framework\TestCase
    {
        // Testing adding a user to the database
        public function testGetCompanies() 
        {
             $crud = new controllers\DashController;

              $status = $crud->getCompanies();

            $this->assertEquals($status, 10);
        }
        
    }
?>














