<?php
session_start();

function getDBConnection() {
    $host = 'localhost';
    $dbname = 'Origin - store2';  
    $username = 'root';
    $password = '';
    
    $conn = new mysqli($host, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
    }
    
    return $conn;
}
?>