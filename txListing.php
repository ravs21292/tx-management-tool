<?php
ini_set('display_errors', 0); // Disable displaying errors
ini_set('log_errors', 1); // Enable error logging
ini_set('error_log', __DIR__ . '/php-error.log'); // Set the error log file


require_once __DIR__ . '/Database/Database.php';
require_once __DIR__ . '/Handler/TxHandler.php';

use ManagementTxTool\Handler\TxHandler;
header('Content-Type: application/json'); // Ensure the content type is JSON

$getTxs = new TxHandler();
echo $getTxs->getAllTx();

?>
