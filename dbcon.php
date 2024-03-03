<?php
    define("HOST", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "crud_operations");

    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    IF (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>