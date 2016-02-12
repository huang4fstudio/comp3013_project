<?php
    echo "Test Starts";
    $results = db_query("SELECT * FROM Test_Table");
    echo $results;

    function db_stmt($raw) {
        $connection = db_connect();
        $stmt = $connection->prepare($raw);
        return $stmt;
    }

    function db_query($query) {
        // Connect to the database
        $connection = db_connect();
        echo $connection;

        // Query the database
        $result = mysqli_query($connection,$query);
        echo $result;
        
        if ($result === false) {
           echo "?"; 
        }
        return $result;
    }

    function db_connect() {
        $user = 'auction2';
        $password = 'password';
        $db = 'Test';
        $host = 'localhost';
        $port = 8889;
        // Define connection as a static variable, to avoid connecting more than once 
        static $connection;

        // Try and connect to the database, if a connection has not been established yet
        if(!isset($connection)) {
             // Load configuration as an array. Use the actual location of your configuration file
            $connection = mysqli_connect($host, $user,$password,$db);
        }

        // If connection was not successful, handle the error
        if($connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return mysqli_connect_error(); 
        }
        return $connection;
    }
?>
