<?php 
//je suis ici
namespace App\Database;

 //utiliser .env ? $_ENV[""]
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'blogphp';

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