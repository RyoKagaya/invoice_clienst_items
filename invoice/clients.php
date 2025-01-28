<?php

// 1) DB接続

session_start();
include('functions.php');
check_session_id();

$pdo = connect_to_db();

$sql = 'SELECT * FROM clients_table';
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

    $idValue     = $record["id"];
    $clientName  = $record["client_name"];
    $managementCode = $record["management_code"];
    $addressCity    = $record["address_city"];
    $amount1     = $record["amount_1"];

    // 例: 小数以下を表示しない & カンマ区切り
    $formattedAmount = number_format($amount1, 0);

    $output .= "
    <!-- チェックボックス -->
        <td class='border-b-2 p-2 '>
            <label>
                <input type='checkbox' name='check_list[]' value='{$idValue}'>
            </label>
        </td>
        <!-- 会社名/件名 (今回は会社名のみの例) -->
        <td class='border-b-2 p-2'>{$clientName}</td>

        <!-- 管理コード -->
        <td class='border-b-2 p-2'>{$managementCode}</td>
        
        <!-- 住所 -->
        <td class='border-b-2 p-2'>{$addressCity}</td>

        <td class='border-b-2 p-2'>
            <!-- Editボタン -->
            <a href='clients_edit.php?id={$record["id"]}' 
            class='inline-flex items-center text-green-400 hover:text-green-500'>

            <!-- Pencil アイコン -->
            <svg xmlns='http://www.w3.org/2000/svg' 
                    fill='none' viewBox='0 0 24 24' 
                    stroke-width='1.5' stroke='currentColor' 
                    class='w-5 mr-1'>
                <path stroke-linecap='round' stroke-linejoin='round'
                d='M16.862 3.487c.34-.34.9-.165.900.283v4.95c0 .55-.45 1-1 1h-4.95c-.448 0-.623-.56-.283-.9l7.333-7.333z' />
                <path stroke-linecap='round' stroke-linejoin='round'
                d='M19.5 11.25V19.5A2.25 2.25 0 0 1 17.25 21.75H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 4.5 4.5h8.25' />
            </svg>
            </a>

            <!-- Deleteボタン -->
            <a href='clients_delete.php?id={$record["id"]}' 
            class='inline-flex items-center text-red-400 hover:text-red-500'>

            <!-- Trash アイコン -->
            <svg xmlns='http://www.w3.org/2000/svg'
                    fill='none' viewBox='0 0 24 24'
                    stroke-width='1.5' stroke='currentColor'
                    class='w-5 mr-1'>
                <path stroke-linecap='round' stroke-linejoin='round'
                d='M3 6h18m-2 0v13.5a2.25 2.25 0 0 1-2.25 2.25H7.25A2.25 2.25 0 0 1 5 19.5V6m3 0v1.5m6-1.5v1.5' />
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
    <title>取引先</title>
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
                    <li class="pl-3 py-2 bg-blue-400 hover:bg-blue-300 rounded-md">
                        <a href="clients.php" class="block w-full h-full">
                        取引先
                        </a>
                    </li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">
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
                    <h1>取引先</h1>
                </div>
                <div>
                    <button id="createNewButton" onclick="location.href='createclient.php'" class="p-3 font-semibold bg-orange-400 hover:bg-orange-300 text-white rounded-md" >
                        取引先の新規作成
                    </button>
                </div>
                <div id="selectMenu" class="hidden p-3 hover:bg-gray-200 rounded-md">
                    <select class="p-3">
                        <option value="">見積書</option>
                        <option value="">納品書</option>
                        <option value="">請求書</option>
                        <option value="">領収書</option>
                        <option value="">受注情報</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-center text-left">
                <table class="w-4/5 my-12 border-b-2">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border-b-2 p-2 text-sm">
                                <input type="checkbox">
                            </th>
                            <th class="border-b-2 p-2 text-sm">取引先</th>
                            <th class="border-b-2 p-2 text-sm">管理コード</th>
                            <th class="border-b-2 p-2 text-sm">送り先</th>
                            <th class="border-b-2 p-2 text-sm">更新 / 削除</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?= $output ?>
                    </tbody>
                </table>
            </div>
            <div>
                <div>
                    <form action=""></form>
                </div>
            </div>
        </main>
    </div>
    </div>
</body>
</html>