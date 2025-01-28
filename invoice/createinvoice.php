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
            <div class="flex justify-between">
                <div class="p-3 text-xl font-bold hover:bg-gray-200 rounded-md">
                    <h1>請求書の新規作成</h1>
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
            <div class="p-3">
                <!-- 基本設定リスト -->
                <div >
                    <ul class="flex justify-start">
                            <li class="p-3 text-center">基本情報</li>
                            <li class="p-3 text-center">送付先</li>
                            <li class="p-3 text-center">課税設定</li>
                            <li class="p-3 text-center">テンプレート</li>
                    </ul>
                </div>
                <div>
                    <form action="invoice_create.php" method="POST">
                        <div class="flex justify-start">
                            <!-- 請求情報 -->
                            <div class="p-3 w-1/2">
                                <div class="py-3">
                                    <h2 class="font-semibold">請求情報</h2>
                                </div>
                                <!-- 取引先 -->
                                <div class="py-2">
                                    <div class="flex">
                                        <p class="font-semibold">取引先</p>
                                        <p class="font-semibold bg-orange-400 text-white text-xs p-1 w-10 ml-2 rounded-md text-center">必須</p>
                                    </div>
                                    <input type="text" name="client_name" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                </div>
                                <div class="flex justify-start">
                                    <!-- 請求日 -->
                                    <div class="py-2 w-1/2">
                                        <div class="flex">
                                            <p class="font-semibold">請求日</p>
                                            <p class="font-semibold bg-orange-400 text-white text-xs p-1 w-10 ml-2 rounded-md text-center">必須</p>
                                        </div>
                                        <input type="date" name="billing_date" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                    </div>
                                    <!-- お支払い期限 -->
                                    <div class="py-2 w-1/2">
                                        <p class="font-semibold">お支払い期限</p>
                                        <input type="date" name="deadline" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                    </div>
                                </div>
                                <!-- 請求書番号 -->
                                <div class="py-2">
                                    <div class="flex">
                                        <p class="font-semibold">請求書番号</p>
                                        <p class="font-semibold bg-orange-400 text-white text-xs p-1 w-10 ml-2 rounded-md text-center">必須</p>
                                    </div>
                                    <input type="number" name="invoice_number" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                </div>
                                <!-- 件名 -->
                                <div class="py-2">
                                    <p class="font-semibold">件名</p>
                                    <input type="text" name="invoice_subject" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                </div>
                            </div>
                            <!-- 請求元情報 -->
                            <div class="p-3 w-1/2">
                                <div class="py-3">
                                    <h2 class="font-semibold">請求元情報</h2>
                                </div>
                                <div class="py-2">
                                    <div class="flex">
                                        <p class="font-semibold">自社名</p>
                                        <p class="font-semibold bg-orange-400 text-white text-xs p-1 w-10 ml-2 rounded-md text-center">必須</p>
                                    </div>
                                    <input type="text" name="company_name" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                </div>
                                <div>
                                    <div>
                                        <details class="py-2">
                                            <summary class="text-blue-500 text-sm">詳細（住所・連絡先など）</summary>
                                            <div class="py-2">
                                                <p class="font-semibold">郵便番号</p>
                                                <p class="text-xs">000-0000形式（半角）で入力してください</p>
                                                <input type="text" name="company_zip" placeholder="000-0000" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                            </div>
                                            <div class="py-2">
                                                <p class="font-semibold">住所</p>
                                                    <div>
                                                        <input type="text" name="company_address1" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                                        <input type="text" name="company_address2" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                                        <input type="text" name="company_address3" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                                    </div>
                                            </div>
                                            <div class="py-2">
                                                <p class="font-semibold">TEL</p>
                                                <input type="tel" name="company_tel" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                            </div>
                                            <div class="py-2">
                                                <p class="font-semibold">FAX</p>
                                                <input type="tel" name="company_fax" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                            </div>
                                            <div class="py-2">
                                                <p class="font-semibold">メールアドレス</p>
                                                <input type="email" name="company_email" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                            </div>
                                            <div class="py-2">
                                                <p class="font-semibold">登録番号</p>
                                                <p class="text-xs">適格請求書（インボイス）に記載が必要な番号です</p>
                                                <input type="text" name="company_invoice_no" placeholder="T1234567890123" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 p-3">
                                            </div>
                                            <div class="py-2">
                                                <p class="font-semibold">ロゴ</p>
                                                <p class="text-xs">1MBまでのpng/jpeg/gif形式に対応</p>
                                                <input type="file" name="company_logo">
                                            </div>
                                            <div class="py-2">
                                                <p class="font-semibold">印影</p>
                                                <p class="text-xs">1MBまでのpng/jpeg/gif形式に対応</p>
                                                <input type="file" name="company_stamp">
                                            </div>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 請求テーブル -->
                        <div class="px-3 py-3">
                            <table class="w-full border border-gray-200 text-sm">
                                <thead>
                                    <tr>
                                        <th class="w-1/12">納品日</th>
                                        <th class="w-3/12">品番・品名</th>
                                        <th class="w-1/12">数量</th>
                                        <th class="w-1/12">単位</th>
                                        <th class="w-1/12">単価</th>
                                        <th class="w-1/12">税区分</th>
                                        <th class="w-2/12">金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="calcRow">
                                        <td class="border border-gray-200 p-2">
                                            <input type="date" name="delivery_date_1" id="" class="w-full p-2">
                                        </td>
                                        <td class="border border-gray-200 p-2">
                                            <input type="text" name="item_name_1" id="" class="w-full p-2">
                                        </td>
                                        <td class="border border-gray-200 p-2">
                                            <input type="number" name="quantity_1" id="" class="w-full p-2">
                                        </td>
                                        <td class="border border-gray-200 p-2">
                                            <input type="text" name="unit_1" id="" class="w-full p-2">
                                        </td>
                                        <td class="border border-gray-200 p-2">
                                            <input type="number" name="unit_price_1" id="" class="w-full p-2">
                                        </td>
                                        <td class="border border-gray-200 p-2">
                                            <select name="tax_rate_1" id="">
                                                <option value="0.1">10%</option>
                                                <option value="0.08">軽減8%</option>
                                                <option value="0.08">8%</option>
                                                <option value="0">対象外</option>
                                                <option value="0.05">5%</option>
                                            </select>
                                        </td>
                                        <!-- 金額自動表示 -->
                                        <td class="border border-gray-200 p-2">
                                            <input type="number" name="amount_1" id="" class="w-full p-2">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- 計算結果テーブル -->
                        <div>
                            
                        </div>
                        <!-- 備考 -->
                        <div class="p-3">
                            <div>
                                <p class="font-semibold">備考</p>
                                <input name="remarks" id="" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 px-3"></input>
                            </div>
                            <!-- お振込先 -->
                            <div>
                                <p class="font-semibold">お振込先</p>
                                <input name="bank_info" id="" class="border border-gray-200 border-2 rounded-md w-full my-2 h-10 px-3"></input>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <!-- 自動計算 -->
                            <p class="m-3">小計円</p>
                            <p class="m-3">消費税円</p>
                            <p class="my-3 mx-6">合計</p>
                            <div>
                                <input 
                                    class="m-3 bg-blue-500 text-white rounded-md" 
                                    type="submit" 
                                    value="保存する" 
                                    name="save_btn"
                                />
                            </div>     
                    </form>
                </div>       
                </div>
            </div>
        </main>
    </div>
    </div>
</body>
</html>