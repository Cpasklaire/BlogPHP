<?php 
//utiliser .env ? $_ENV[""]
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'oc-backend-p5';


// Create connection
//$sql = new mysqli($_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
$sql = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}

