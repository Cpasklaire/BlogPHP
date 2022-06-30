<?php 
//je suis ici
namespace App\Database;

 //utiliser .env ? $_ENV[""]
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'blogphp';


/*// Create connection
//$sql = new mysqli($_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
$sql = new PDO('mysql:host=localhost;dbname=blogphp;charset=utf8',$username, $password);

// Check connection
//if ($sql->connect_error) {
//    die("Connection failed: " . $sql->connect_error);
//}
 */

class DataConnect {
    // \ = pas dans namespace
    public ?\PDO $db = null;
    
    public function getConnection() {
        if($this->db == null) {
            $this->db = new \PDO('mysql:host=localhost;dbname=blogphp;charset=utf8','root', 'root');
        }
        return $this->db; 
    }

}