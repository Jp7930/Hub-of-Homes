<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];

        $mysqli = new mysqli('localhost', 'root', '', 'hubofhomes');
        $query = "INSERT INTO newsletter (email) VALUES ('$email')";
        $mysqli -> query($query);
        $mysqli -> close();
    }
    header('Location: ../about.html')
?>