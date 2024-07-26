<?php 
namespace ManagementTxTool\Handler;
use ManagementTxTool\Database\Database;
use PDO;
use PDOEXception;
//require_once __DIR__."..\Database\Database.php";
require_once __DIR__.'/../Database/Database.php';

class TxHandler { 
    private $description;
    private $tx_date;
    private $running_balance;
    public $conn;
    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection(); 
    }

    public function createTx($txType, $amount, $description){ 
        try{
            $runningBalance = 0;
            $query = "INSERT INTO management_txs (description, credit, debit, running_balance, tx_date) VALUES(:description, :credit, :debit, :running_balance, :tx_date)";
            $stmt = $this->conn->prepare($query);
            // Define variable 
            $desc = htmlspecialchars(strip_tags($description));
            $cred = null;
            // Code to get the running balance to perform the required action on transaction
            $balStmt = $this->conn->prepare("SELECT * FROM management_txs ORDER BY id DESC LIMIT 1");
            $balStmt->execute();
            $resultBalStmt = $balStmt->fetch(PDO::FETCH_ASSOC);
            
            print_r($resultBalStmt);
           
            if($resultBalStmt){
                $runningBalance = $resultBalStmt['running_balance'];
            }

            if($txType == "credit"){
                // add the amount
                $cred = $amount;
                $deb = null;
                $runningBalance += $amount;
            }else{
                // subtract the amount
                $cred = null;
                $deb = $amount;
                $runningBalance -= $amount;
            }

            $timestamp = time();
            $currentDate = gmdate('d-d-Y', $timestamp);
            $stmt->bindParam(":description", $desc);
            $stmt->bindParam(":credit", $cred);
            $stmt->bindParam(":debit", $dbt);
            $stmt->bindParam(":tx_date", $currentDate);
            $stmt->bindParam(":running_balance", $runningBalance);
            if($stmt->execute()){
                return json_encode(["success"=>true,"code"=>200,"message"=>"Tx created successfully"]);
            }else{
                return json_encode(["success"=>false,"code"=>500,"message"=>"Something went wrong with TX"]);

            }
            
        } catch(PDOException $e ){
            return json_encode(["success"=>false,"code"=>500,"message"=>$e->getMessage()]);
        }
    }

    public function getAllTx(){
        try{
            $query = "SELECT * FROM management_txs ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode(["success"=>true,"code"=>200,"data"=>$result]);
        } catch(PDOException $e ){
            return json_encode(["success"=>false,"code"=>500,"data"=>[],"message"=>$e->getMessage()]);
        }
        
    }

}


$handler = new TxHandler();
$txType= "credit";
$description = "Testing descirpt";
$amount = 100;
$result = $handler->createTx($txType,$amount, $description );
print_r($result);
?>