<?php
// invoice_create.php

session_start();
include('functions.php');
check_session_id();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATIO請求書</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-700">
    <div>
    <div class="w-1/6 p-3 bg-blue-500 text-white h-screen fixed top-0 left-0">
        <!-- ナビゲーション -->
        <nav>
            <div id="" class="w-full text-base bg-blue-400 rounded-md my-3">
                <div class="flex items-center hover:bg-orange-400 rounded-md p-1">
                    <img src="img/Ratipen_nothing.PNG" alt="" class="w-8 h-8 mr-2 bg-white rounded-full border border-gray-200">
                    <a href="" class="text-sm font-semibold">ラティペンと話す</a>
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
                    <li class="p-3 bg-blue-400 hover:bg-blue-300 rounded-md">
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
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">取引先</li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">品目管理</li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">ご利用履歴</li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">設定</li>
                </ul>
            </div>
            <div class="py-6">
                <ul>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">サポート</li>
                    <li class="pl-3 py-2 hover:bg-blue-300 rounded-md flex">
                        ログアウト
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="ml-[16.666%] p-3 h-screen">
        <!-- メイン -->
        <main class="bg-white">
                <div class="p-3">
                    <h1 class="text-2xl font-bold mb-4">品目の新規登録</h1>
                    <form action="items_create.php" method="POST">
                        <!-- 品目情報 -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="font-semibold">品番 <span class="text-orange-500">*</span></label>
                                <input type="text" name="item_code" class="border border-gray-300 rounded-md w-full p-2 my-2" required>
                            </div>
                            <div>
                                <label class="font-semibold">品名 <span class="text-orange-500">*</span></label>
                                <input type="text" name="item_name" class="border border-gray-300 rounded-md w-full p-2 my-2" required>
                            </div>
                            <div>
                                <label class="font-semibold">単位</label>
                                <input type="text" name="unit" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">単価</label>
                                <input type="number" name="unit_price" step="0.01" class="border border-gray-300 rounded-md w-full p-2 my-2">
                            </div>
                            <div>
                                <label class="font-semibold">消費税率</label>
                                <select name="tax_rate" class="border border-gray-300 rounded-md w-full p-2 my-2">
                                    <option value="10%">10%</option>
                                    <option value="軽減8%">軽減8%</option>
                                    <option value="8%">8%</option>
                                    <option value="対象外">対象外</option>
                                    <option value="5%">5%</option>
                                </select>
                            </div>
                            <div>
                                <label class="font-semibold">源泉税</label>
                                <div class="flex items-center">
                                    <input type="checkbox" name="withholding_tax" value="1" class="mr-2">
                                    <span>対象</span>
                                </div>
                            </div>
                        </div>
                        <!-- メモ -->
                        <div class="mt-4">
                            <label class="font-semibold">メモ</label>
                            <textarea name="memo" rows="4" class="border border-gray-300 rounded-md w-full p-2 my-2"></textarea>
                        </div>
                        <!-- 送信ボタン -->
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-400 text-white py-2 px-4 rounded-md hover:bg-blue-600">保存する</button>
                        </div>
                    </form>
                </div>
            </main>
    </div>
    </div>
</body>
</html>