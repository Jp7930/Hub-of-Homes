<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $id = $_POST['property_id'];

        $mysqli = new mysqli('localhost', 'root', '', 'hubofhomes');
        $query = "INSERT INTO visit_requests (property_id, name, email, phone, date, message) VALUES ('$id', '$name', '$email', '$phone', '$date', '$message')";
        $mysqli -> query($query);
        $mysqli -> close();
    }
    header("Location: ../property-details.php?id=$id");
?>