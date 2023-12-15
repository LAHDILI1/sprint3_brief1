<?php
//namespace App\database;


require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// final 
class Connection{
    private static $instance;
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;

    private $conn;
    
    private function __construct(){
        $this->servername = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->connntion();    
    }

    public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConn(){
        return $this->conn;
    }
    
    private function connntion(){
        
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if ($this -> conn -> connect_error) {
            die("Connection failed: ". $this -> conn -> connect_error);
        }
        return $this->conn;
    }
}

?>
