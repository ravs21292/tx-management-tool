<?php 
namespace ManagementTxTool\Database;

use PDO;
use PDOException;
class Database { 
    // Define variables 
    private $host = 'localhost';
    private $db = 'db_tx_management';
    private $db_user = 'root';
    private $db_password = 'seasia@123';
    public $conn = null;
    public function getConnection() { 
        // Connect to the database 
        $this->conn = null; 
        try{
            
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->db_user,$this->db_password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            if($this->conn){
                echo "DB is connected \n";
            }
        } catch ( PDOException $e) { 
            return json_encode(["success"=>false,"message"=>$e->getMessage()]);
        }

        return $this->conn;
    }
}

?>