<?php
    function db_last_id() {
        return mysqli_insert_id(db_connect());
    }

    function db_fetch_array($query) {
        $result = db_query($query);
        return mysqli_fetch_array($result);
    }

    function db_fetch_all($query) {
        $rows = array();
        $result = db_query($query);
        while(($row = mysqli_fetch_array($result))) {
            $rows[] = $row;
        }
        return $rows;
    }

    function db_stmt($raw) {
        $connection = db_connect();
        $stmt = $connection->prepare($raw);
        return $stmt;
    }

    function db_query($query) {
        // Connect to the database
        $connection = db_connect();
        // Query the database
        $result = mysqli_query($connection,$query);

        if ($result === false) {
           echo mysqli_error($connection);
        }
        return $result;
    }

    function db_connect() {
<<<<<<< HEAD
        // $user = 'auction2';
       $user = 'root';
       $password = 'root';
        //  $password = 'password';
        //  $db = 'COMP3013';
       $db = 'Auction_database';
        $host = 'localhost';
        $port = 8889;
=======
   //     $user = 'kirthi';
        $user = 'b43ee9b63abc2a';
        $password = '9afd1fd9';
//         $password = 'kirthi';
         $db = 'acsm_2d90a53fdf17f22';
//        $db = 'Auction_database';
        $host = 'eu-cdbr-azure-north-d.cloudapp.net';
        $port = 3306;
>>>>>>> 2f7f5bb8beb0c27eba4c9d2fe7fc735bdf82f2d6
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
