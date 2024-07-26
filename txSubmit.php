<?php
require_once __DIR__ . '/Database/Database.php';
require_once __DIR__ . '/Handler/TxHandler.php';

use ManagementTxTool\Handler\TxHandler;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $txType = htmlspecialchars(strip_tags($_POST['tx_type']));
    $amount = htmlspecialchars(strip_tags($_POST['amount']));
    $description = htmlspecialchars(strip_tags($_POST['description']));
    $description = htmlspecialchars(strip_tags($_POST['description']));

    $createTx = new TxHandler();
    $result = $createTx->createTx($txType, $amount, $description);

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Transaction created successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to create transaction."]);
    }
}
?>
