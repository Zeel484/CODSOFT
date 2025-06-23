<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'app_db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name     = $_POST['name'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 


$sql_check = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Email already registered!";
} else {
    
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);
    
    if ($stmt->execute()) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
