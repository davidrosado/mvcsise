<?php
$host = "localhost";
$dbname = "db_hotel";
$username = "root";
$password = "";

try {
    $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    /*echo "Connected to $dbname at $host successfully.";*/
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}