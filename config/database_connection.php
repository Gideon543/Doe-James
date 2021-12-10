<?php
    # Importing connection variables
    require ("database_credentials.php");

    # Establishing a database connection
    class DatabaseConnection {
        private $server = SERVERNAME;
        private $user   = USERNAME;
        private $pass   = PASSWORD; 
        private $db     = DATABASE;
        private $conn;

        public function connect(){
            $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
            return $conn;
        }
    }
?>