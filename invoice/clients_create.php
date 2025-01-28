<?php
// client_create.php

session_start();
include('functions.php');
check_session_id();

// 1) POST送信されているかを確認
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('POSTでアクセスしてください');
}

// 2) 必須項目のチェック
if (!isset($_POST['client_name']) || $_POST['client_name'] === '') {
    exit('ParamError: 必須項目が入力されていません');
}

// 3) 必須項目も含めてすべての項目を受け取り

// 【必須項目】
$clientName = $_POST['client_name'];

// 【任意項目】(空でもOK)
$managementCode   = $_POST['management_code']   ?? '';
$departmentPerson = $_POST['department_person'] ?? '';
$email            = $_POST['email']            ?? '';
$emailCC          = $_POST['email_cc']         ?? '';
$postalCode       = $_POST['postal_code']      ?? '';
$addressCity      = $_POST['address_city']     ?? '';
$addressBuilding  = $_POST['address_building'] ?? '';
$recipientName    = $_POST['recipient_name']   ?? '';
$nameHonorific    = $_POST['name_honorific']   ?? '';
$phone            = $_POST['phone']           ?? '';
$fax              = $_POST['fax']             ?? '';
$memo             = $_POST['memo']            ?? '';

// 4) DB接続
$pdo = connect_to_db();

// 5) SQL作成 & 実行
$sql = 'INSERT INTO clients_table (
            client_name, management_code, department_person, email, email_cc,
            postal_code, address_city, address_building, recipient_name,
            name_honorific, phone, fax, memo, created_at
        ) VALUES (
            :client_name, :management_code, :department_person, :email, :email_cc,
            :postal_code, :address_city, :address_building, :recipient_name,
            :name_honorific, :phone, :fax, :memo, NOW()
        )';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':client_name',       $clientName,       PDO::PARAM_STR);
$stmt->bindValue(':management_code',  $managementCode,   PDO::PARAM_STR);
$stmt->bindValue(':department_person', $departmentPerson, PDO::PARAM_STR);
$stmt->bindValue(':email',            $email,            PDO::PARAM_STR);
$stmt->bindValue(':email_cc',         $emailCC,          PDO::PARAM_STR);
$stmt->bindValue(':postal_code',      $postalCode,       PDO::PARAM_STR);
$stmt->bindValue(':address_city',     $addressCity,      PDO::PARAM_STR);
$stmt->bindValue(':address_building', $addressBuilding,  PDO::PARAM_STR);
$stmt->bindValue(':recipient_name',   $recipientName,    PDO::PARAM_STR);
$stmt->bindValue(':name_honorific',   $nameHonorific,    PDO::PARAM_STR);
$stmt->bindValue(':phone',            $phone,            PDO::PARAM_STR);
$stmt->bindValue(':fax',              $fax,              PDO::PARAM_STR);
$stmt->bindValue(':memo',             $memo,             PDO::PARAM_STR);

// SQL実行
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// 正常終了時にリダイレクト
header('Location:clients.php');
exit();
?>
