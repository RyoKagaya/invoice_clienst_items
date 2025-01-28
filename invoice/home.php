<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATIO請求書ホーム</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-700">
    <div class="flex">
    <div class="w-1/6 p-3 bg-blue-500 text-white h-screen">
        <!-- ナビゲーション -->
        <nav>
            <div id="" class="w-full text-base bg-blue-400 rounded-md my-3">
                <div class="flex items-center hover:bg-yellow-200 rounded-md p-1">
                    <img src="img/Ratipen_nothing.PNG" alt="" class="w-8 h-8 mr-2 bg-white rounded-full border border-gray-200">
                    <a href="" class="text-sm font-semibold">ラティペンと話す</a>
                </div>
            </div>
            <div id="" class="w-full text-base bg-blue-400 rounded-md my-3">
                <div class="flex items-center hover:bg-yellow-200 rounded-md p-1">
                    <img src="img/Ratioblue.PNG" alt="" class="w-8 h-8 mr-2 bg-white rounded-full border border-gray-200">
                    <a href="" class="text-sm font-semibold">RATIOチームに相談</a>
                </div>
            </div>
            <div>
                <ul>
                    <li class="p-3 hover:bg-blue-300 rounded-md">ホーム</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">見積書</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">納品書</li>
                    <li class="p-3 hover:bg-blue-300 rounded-md">請求書</li>
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
    <div class="w-5/6 p-3 h-screen">
        <!-- メイン -->
        <main>
            <div class="flex justify-between">
                <div class="p-3 text-xl font-bold hover:bg-gray-200 rounded-md">
                    <h1>ホーム</h1>
                </div>
                <div>
                    <button id="createNewButton" class="p-3 font-semibold bg-yellow-500 hover:bg-yellow-400 text-white rounded-md">
                        新規作成
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
            <div class="m-3 p-3 bg-blue-50 hover:bg-yellow-50 rounded-md">
                <div class="p-3 ">
                    <h2>RATIOへようこそ</h2>
                </div>
                <div class="p-3">
                    <p>現在、無料プランを提供中です。</p>
                    <p>無料体験プラン適用中に有償プラン（年契約）に変更すると、さらに1年無料で有償機能がご利用いただける初年度無償キャンペーンを実施中です。</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 place-items-center mx-3 my-6 gap-6 text-gray-700">
                <!-- 画像アクションリスト -->
                <div class="p-6 w-64 border border-gray-300 border-2 hover:border-blue-500 rounded-md shadow-sm flex flex-col items-center justify-center">
                    <img src="img/estimates.PNG" alt="" class="w-20">
                    <p class="flex justify-center py-3 text-xl font-semibold">見積書</p>
                </div>
                <div class="p-6 w-64 border border-gray-300 border-2 hover:border-blue-500 rounded-md shadow-sm flex flex-col items-center justify-center">
                    <img src="img/delivery_slips.PNG" alt="" class="w-20">
                    <p class="flex justify-center py-3 text-xl font-semibold">納品書</p>
                </div>
                <div class="p-6 w-64 border border-gray-300 border-2 hover:border-blue-500 rounded-md shadow-sm flex flex-col items-center justify-center">
                    <img src="img/invoices.PNG" alt="" class="w-20">
                    <p class="flex justify-center py-3 text-xl font-semibold">請求書</p>
                </div>
                <div class="p-6 w-64 border border-gray-300 border-2 hover:border-blue-500 rounded-md shadow-sm flex flex-col items-center justify-center">
                    <img src="img/orders.PNG" alt="" class="w-20">
                    <p class="flex justify-center py-3 text-xl font-semibold">受注管理</p>
                </div>
                <div class="p-6 w-64 border border-gray-300 border-2 hover:border-blue-500 rounded-md shadow-sm flex flex-col items-center justify-center">
                    <img src="img/clients.PNG" alt="" class="w-20">
                    <p class="flex justify-center py-3 text-xl font-semibold">取引先</p>
                </div>
                <div class="p-6 w-64 border border-gray-300 border-2 hover:border-blue-500 rounded-md shadow-sm flex flex-col items-center justify-center">
                    <img src="img/dealing_items.PNG" alt="" class="w-20">
                    <p class="flex justify-center py-3 text-xl font-semibold">品目管理</p>
                </div>
            </div>
        </main>
    </div>
    </div>
</body>
</html>