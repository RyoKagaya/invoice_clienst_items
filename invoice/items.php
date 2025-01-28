<?php

// 1) DB接続

session_start();
include('functions.php');
check_session_id();

$pdo = connect_to_db();

$sql = 'SELECT * FROM items_table';
$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {

    $idValue    = $record["id"];
    $itemCode   = $record["item_code"];
    $itemName   = $record["item_name"];
    $unit       = $record["unit"];
    $unitPrice  = number_format($record["unit_price"], 0); // 小数点2桁
    $taxRate    = $record["tax_rate"];
    $withholdingTax = $record["withholding_tax"] ? "対象" : "対象外";

    

    $output .= "
    <tr>
        <!-- チェックボックス -->
        <td class='border-b-2 p-2'>
            <label>
                <input type='checkbox' name='check_list[]' value='{$idValue}'>
            </label>
        </td>
        <!-- 品番 -->
        <td class='border-b-2 p-2'>{$itemCode}</td>
        <!-- 品名 -->
        <td class='border-b-2 p-2'>{$itemName}</td>
        <!-- 単位 -->
        <td class='border-b-2 p-2'>{$unit}</td>
        <!-- 単価 -->
        <td class='border-b-2 p-2'>{$unitPrice}円</td>
        <!-- 消費税率 -->
        <td class='border-b-2 p-2'>{$taxRate}</td>
        <!-- 源泉税 -->
        <td class='border-b-2 p-2'>{$withholdingTax}</td>
        <!-- 更新 / 削除 -->
        <td class='border-b-2 p-2'>
            <a href='items_edit.php?id={$record["id"]}' 
            class='inline-flex items-center text-green-400 hover:text-green-500'>

            <!-- Pencil アイコン -->
            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 mr-1'>
                <path stroke-linecap='round' stroke-linejoin='round' d='M16.862 3.487c.34-.34.9-.165.900.283v4.95c0 .55-.45 1-1 1h-4.95c-.448 0-.623-.56-.283-.9l7.333-7.333z' />
                <path stroke-linecap='round' stroke-linejoin='round' d='M19.5 11.25V19.5A2.25 2.25 0 0 1 17.25 21.75H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 4.5 4.5h8.25' />
            </svg>
            </a>

            <a href='items_delete.php?id={$record["id"]}' 
            class='inline-flex items-center text-red-400 hover:text-red-500'>

            <!-- Trash アイコン -->
            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 mr-1'>
                <path stroke-linecap='round' stroke-linejoin='round' d='M3 6h18m-2 0v13.5a2.25 2.25 0 0 1-2.25 2.25H7.25A2.25 2.25 0 0 1 5 19.5V6m3 0v1.5m6-1.5v1.5' />
            </svg>
            </a>
        </td>
    </tr>
    ";

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>品目管理</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-700">
    <div >
    <div class="w-1/6 p-3 bg-blue-500 text-white h-screen fixed top-0 left-0">
        <!-- ナビゲーション -->
        <nav>
            <div id="" class="w-full text-base bg-blue-400 rounded-md my-3">
                <div class="flex items-center hover:bg-orange-400 rounded-md p-1">
                    <img src="img/Ratipen_nothing.PNG" alt="" class="w-8 h-8 mr-2 bg-white rounded-full border border-gray-200">
                    <a href="index.php" class="text-sm font-semibold">ラティペンと話す</a>
                </div>
            </div>
            <div id="" class="w-full text-base bg-blue-400 rounded-md my-3">
                <div class="flex items-center hover:bg-orange-400 rounded-md p-1">
                    <img src="img/Ratioblue.PNG" alt="" class="w-8 h-8 mr-2 bg-white rounded-full border border-gray-200">
                    <a href="" class="text-sm font-semibold">RATIOチームに相談</a>
                </div>
            </div>
            <div>
                <ul>
                    <li class="p-3 hover:bg-blue-300 rounded-md">ホーム</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">見積書</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">納品書</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">
                        <a href="invoices.php" class="block w-full h-full">
                        請求書
                        </a>
                    </li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">領収書</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">受注管理</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">レポート</li>
                </ul>
            </div>
            <div class="py-6">
                <ul>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">
                        <a href="clients.php" class="block w-full h-full">
                        取引先
                        </a>
                    </li>
                    <li class="pl-3 py-2 bg-blue-400 hover:bg-blue-300 rounded-md">
                        <a href="items.php" class="block w-full h-full">
                        品目管理
                        </a>
                    </li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">ご利用履歴</li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">設定</li>
                </ul>
            </div>
            <div class="py-6">
                <ul>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">サポート</li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md flex" hr>
                        <a href="invoice_logout.php" class="block w-full h-full">
                            ログアウト
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="ml-[16.666%] p-3 h-screen">
        <!-- メイン -->
        <main>
                <div class="flex justify-between">
                    <div class="p-3 text-xl font-bold hover:bg-gray-200 rounded-md">
                        <h1>品目管理</h1>
                    </div>
                    <button onclick="location.href='createitem.php'" class="p-3 font-semibold bg-orange-400 hover:bg-orange-300 text-white rounded-md">
                        品目の新規登録
                    </button>
                </div>
                <div class="mt-6 flex justify-center">
                    <table class="w-4/5 my-12 border-b-2 text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border-b-2 p-2 text-sm">選択</th>
                                <th class="border-b-2 p-2 text-sm">品番</th>
                                <th class="border-b-2 p-2 text-sm">品名</th>
                                <th class="border-b-2 p-2 text-sm">単位</th>
                                <th class="border-b-2 p-2 text-sm">単価</th>
                                <th class="border-b-2 p-2 text-sm">消費税率</th>
                                <th class="border-b-2 p-2 text-sm">源泉税</th>
                                <th class="border-b-2 p-2 text-sm">更新 / 削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $output ?>
                        </tbody>
                    </table>
                </div>
            </main>
    </div>
    </div>
</body>
</html>