<?php
       session_start();

        $servername = "localhost";
        $database = "Northwind";
        $_SESSION['username'] = $_POST['username'] ; //bring in POST variable
        $_SESSION['password'] = $_POST['password']; //bring in POST variable
        
        try {
        $conn = new PDO( "sqlsrv:Server=$servername;Database=$database",$_SESSION['username'],$_SESSION['password'] );
        } catch ( Exception $e ) {
        die( print_r( $e->getMessage() ) );
        } 
        //if try/catch fails, do nothing. other wise create session variables

        Header('location:index.php');

?>