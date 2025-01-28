<?php
// invoice_create.php

session_start();
include('functions.php');
check_session_id();


// 1) POST送信されているかを確認
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('POSTでアクセスしてください');
}

// 2) 必須項目のチェック
if (
    !isset($_POST['client_name']) || $_POST['client_name'] === '' ||
    !isset($_POST['amount_1'])    || $_POST['amount_1'] === ''
) {
  exit('ParamError'); // 必須項目が未入力の場合はエラー終了
}

// 3) 必須項目も含めてすべての項目を受け取り

// 【必須項目】
$clientName = $_POST['client_name'];
$amount1    = $_POST['amount_1'];

// 【任意項目】(空でもOK) 
//  存在しない or 空の場合は、''(空文字)やnullなどで受けておく
$billingDate     = $_POST['billing_date']     ?? '';
$deadline        = $_POST['deadline']         ?? '';
$invoiceNumber   = $_POST['invoice_number']   ?? '';
$invoiceSubject  = $_POST['invoice_subject']  ?? '';
$companyName     = $_POST['company_name']     ?? '';
$companyZip      = $_POST['company_zip']      ?? '';
$companyAddress1 = $_POST['company_address1'] ?? '';
$companyAddress2 = $_POST['company_address2'] ?? '';
$companyAddress3 = $_POST['company_address3'] ?? '';
$companyTel      = $_POST['company_tel']      ?? '';
$companyFax      = $_POST['company_fax']      ?? '';
$companyEmail    = $_POST['company_email']    ?? '';
$companyInvoiceNo= $_POST['company_invoice_no']?? '';
$deliveryDate1= $_POST['delivery_date_1']?? '';
$itemName1= $_POST['item_name_1']?? '';
$quantity1= $_POST['quantity_1']?? '';
$unit1= $_POST['unit_1']?? '';
$unitPrice1= $_POST['unit_price_1']?? '';
$TaxRate1= $_POST['tax_rate_1']?? '';
$remarks         = $_POST['remarks']          ?? '';
$bankInfo        = $_POST['bank_info']        ?? '';
// ... 必要な項目を追加

// 4) DB接続

$pdo = connect_to_db();

// SQL作成&実行　INSERT処理

$sql =  'INSERT INTO invoices (
        client_name, amount_1,
        billing_date, deadline,
        invoice_number, invoice_subject,
        company_name, company_zip,
        company_address1, company_address2, company_address3,
        company_tel, company_fax, company_email, company_invoice_no,
        remarks, bank_info,
        created_at
    ) VALUES (
        :client_name, :amount_1,
        :billing_date, :deadline,
        :invoice_number, :invoice_subject,
        :company_name, :company_zip,
        :company_address1, :company_address2, :company_address3,
        :company_tel, :company_fax, :company_email, :company_invoice_no,
        :remarks, :bank_info,
        NOW()
    )
';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
// 値をバインド (PARAM_STR で十分対応可能)
$stmt->bindValue(':client_name',       $clientName,       PDO::PARAM_STR);
$stmt->bindValue(':amount_1',         $amount1,          PDO::PARAM_STR);
$stmt->bindValue(':billing_date',     $billingDate,      PDO::PARAM_STR);
$stmt->bindValue(':deadline',         $deadline,         PDO::PARAM_STR);
$stmt->bindValue(':invoice_number',   $invoiceNumber,    PDO::PARAM_STR);
$stmt->bindValue(':invoice_subject',  $invoiceSubject,   PDO::PARAM_STR);
$stmt->bindValue(':company_name',     $companyName,      PDO::PARAM_STR);
$stmt->bindValue(':company_zip',      $companyZip,       PDO::PARAM_STR);
$stmt->bindValue(':company_address1', $companyAddress1,  PDO::PARAM_STR);
$stmt->bindValue(':company_address2', $companyAddress2,  PDO::PARAM_STR);
$stmt->bindValue(':company_address3', $companyAddress3,  PDO::PARAM_STR);
$stmt->bindValue(':company_tel',      $companyTel,       PDO::PARAM_STR);
$stmt->bindValue(':company_fax',      $companyFax,       PDO::PARAM_STR);
$stmt->bindValue(':company_email',    $companyEmail,     PDO::PARAM_STR);
$stmt->bindValue(':company_invoice_no',$companyInvoiceNo, PDO::PARAM_STR);
$stmt->bindValue(':remarks',          $remarks,          PDO::PARAM_STR);
$stmt->bindValue(':bank_info',        $bankInfo,         PDO::PARAM_STR);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('Location:invoices.php');
exit();

?>
