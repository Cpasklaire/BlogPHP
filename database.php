<?php 
//utiliser .env ? $_ENV[""]
$servername = "localhost";
$username = "username";
$password = "password";


// Create connection
//$sql = new mysqli($_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
$sql = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";