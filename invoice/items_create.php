<?php

session_start();
include('functions.php');
check_session_id();

// 1) POSTデータの受け取りと必須項目の確認
if (
    !isset($_POST['item_code']) || $_POST['item_code'] === '' ||
    !isset($_POST['item_name']) || $_POST['item_name'] === ''
) {
    exit('ParamError: 必須項目が入力されていません');
}

// POSTデータの受け取り
$itemCode = $_POST['item_code'];
$itemName = $_POST['item_name'];
$unit = $_POST['unit'] ?? ''; // 任意項目
$unitPrice = $_POST['unit_price'] !== '' ? $_POST['unit_price'] : 0; // Default to 0 if empty
$taxRate = $_POST['tax_rate'] ?? '10%'; // 任意項目、デフォルト値は10%
$withholdingTax = isset($_POST['withholding_tax']) ? 1 : 0; // チェックされている場合は1、されていない場合は0
$memo = $_POST['memo'] ?? ''; // 任意項目

// 2) DB接続
$pdo = connect_to_db();

// 3) SQL作成と実行
$sql = 'INSERT INTO items_table (
            item_code, item_name, unit, unit_price, tax_rate, withholding_tax, memo, created_at, updated_at
        ) VALUES (
            :item_code, :item_name, :unit, :unit_price, :tax_rate, :withholding_tax, :memo, NOW(), NOW()
        )';

$stmt = $pdo->prepare($sql);

// バインド変数の設定
$stmt->bindValue(':item_code', $itemCode, PDO::PARAM_STR);
$stmt->bindValue(':item_name', $itemName, PDO::PARAM_STR);
$stmt->bindValue(':unit', $unit, PDO::PARAM_STR);
$stmt->bindValue(':unit_price', $unitPrice, PDO::PARAM_STR);
$stmt->bindValue(':tax_rate', $taxRate, PDO::PARAM_STR);
$stmt->bindValue(':withholding_tax', $withholdingTax, PDO::PARAM_INT);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);

// 実行
try {
    $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// データ登録後、items.phpにリダイレクト
header('Location:items.php');
exit();

?>
