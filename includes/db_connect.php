<?php
    $SECRET = '12345678910111213141516';
    include_once 'psl-config.php';

    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    $connection = mysqli_connect(HOST, USER, PASSWORD);
    mysqli_select_db($connection, DATABASE);

    if ($mysqli->connect_error) {
        header("Location: ../error.php?err=Unable to connect to MySQL");
        exit();
}