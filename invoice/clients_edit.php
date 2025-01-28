<?php
session_start();
include('functions.php');
check_session_id();

// IDを取得
$id = $_GET['id'] ?? null;

if (!$id) {
    exit('Error: ID is not provided.');
}

// DB接続
$pdo = connect_to_db();

// データ取得
$sql = 'SELECT * FROM clients_table WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$record) {
        exit('Error: Record not found.');
    }
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATIO取引先編集</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-700">
    <div>
        <div class="w-1/6 p-3 bg-blue-500 text-white h-screen fixed top-0 left-0">
            <!-- ナビゲーション -->
            <nav>
                <ul>
                    <li class="p-3 hover:bg-blue-300 rounded-md">
                        <a href="index.php">ホーム</a>
                    </li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">
                        <a href="invoices.php">請求書</a>
                    </li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">
                        <a href="clients.php">取引先一覧</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="ml-[16.666%] p-3 h-screen">
            <!-- メイン -->
            <main class="bg-white">
                <div class="p-3">
                    <h1 class="text-2xl font-bold mb-4">取引先の編集</h1>
                    <form action="clients_update.php" method="POST">
                        <!-- 取引先情報 -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="font-semibold">取引先名 <span class="text-orange-500">*</span></label>
                                <input type="text" name="client_name" value="<?= htmlspecialchars($record['client_name']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2" required>
                            </div>
                            <div>
                                <label class="font-semibold">管理コード</label>
                                <input type="text" name="management_code" value="<?= htmlspecialchars($record['management_code']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">部署・担当者</label>
                                <input type="text" name="department_person" value="<?= htmlspecialchars($record['department_person']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">メールアドレス</label>
                                <input type="email" name="email" value="<?= htmlspecialchars($record['email']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">メールアドレス（CC）</label>
                                <input type="email" name="email_cc" value="<?= htmlspecialchars($record['email_cc']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">郵便番号</label>
                                <input type="text" name="postal_code" value="<?= htmlspecialchars($record['postal_code']) ?>" placeholder="123-4567" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">住所（都道府県・市区町村）</label>
                                <input type="text" name="address_city" value="<?= htmlspecialchars($record['address_city']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">住所（番地・ビル名）</label>
                                <input type="text" name="address_building" value="<?= htmlspecialchars($record['address_building']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">郵送先の宛名</label>
                                <input type="text" name="recipient_name" value="<?= htmlspecialchars($record['recipient_name']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">敬称</label>
                                <input type="text" name="name_honorific" value="<?= htmlspecialchars($record['name_honorific']) ?>" placeholder="御中" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">電話番号</label>
                                <input type="tel" name="phone" value="<?= htmlspecialchars($record['phone']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">FAX番号</label>
                                <input type="tel" name="fax" value="<?= htmlspecialchars($record['fax']) ?>" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                        </div>
                        <!-- メモ -->
                        <div class="mt-4">
                            <label class="font-semibold">メモ</label>
                            <textarea name="memo" rows="4" class="border border-gray-300 rounded-md w-full p-2 my-2"><?= htmlspecialchars($record['memo']) ?></textarea>
                        </div>
                        <!-- 隠しフィールド -->
                        <input type="hidden" name="id" value="<?= htmlspecialchars($record['id']) ?>">
                        <!-- 送信ボタン -->
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">更新する</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
