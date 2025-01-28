<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ペンギン会話録</title>
    <link rel="stylesheet" href="./output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" bg-white">

    <!-- メインコンテンツ -    
        
        <!-- LEFT -->
        <div class="w-1/6 p-3 bg-blue-500 text-white h-screen fixed top-0 left-0">
        <!-- ナビゲーション -->
            <nav>
                <div id="dashboard" class="w-full text-base bg-blue-400 rounded-md my-3">
                    <!-- ダッシュボード -->
                    <div class="flex items-center hover:bg-orange-400 rounded-md p-1">
                        <img src="img/Ratiosymbol.PNG" alt="" class="w-8 h-8 mr-2 bg-white rounded-full border border-gray-200">
                        <a href="" class="text-sm font-semibold">Dashboard</a>
                    </div>
                </div>
                <div id="" class="w-full text-base bg-blue-400 rounded-md my-3">
                    <div class="flex items-center hover:bg-orange-400 rounded-md p-1">
                        <img src="img/Ratioblue.PNG" alt="" class="w-8 h-8 mr-2 bg-white rounded-full border border-gray-200">
                        <a href="" class="text-sm font-semibold">RATIOチームに相談</a>
                    </div>
                </div>
                <div class="py-6">
                    <ul class="relative">
                        <!-- アプリケーション -->
                        <li class="pl-3 py-2 hover:bg-blue-300 rounded-md group relative">
                        アプリケーション
                        <!-- サブメニュー -->
                        <ul
                            class="absolute top-0 left-full hidden group-hover:block bg-white border border-gray-200 shadow-lg rounded-md w-36 text-slate-800 text-xs"
                        >
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">Box App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">
                                <a href="invoices.php">請求書 App</a>
                            </li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">経費 App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">債務支払 App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">給与 App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">社会保険 App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">年末調整 App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">勤怠 App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">マイナンバー App</li>
                            <li class="px-4 py-2 border border-gray-200 hover:bg-gray-100 cursor-pointer">契約 App</li>
                        </ul>
                        </li>
                        <!-- 設定 -->
                        <li class="pl-3 py-2 hover:bg-blue-300 rounded-md">
                        設定
                        </li>
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
        <!-- RIGHT -->
        <div class="ml-[16.666%] p-3 h-screen">
            <!-- ヘッダー -->
            <div class="flex flex-col">
                <header class="bg-white h-20 w-full flex justify-start items-center ">
                <div class="flex justify-start items-center h-full p-3">
                    <!-- 選択肢 -->
                    <select name="" id="conversation-partner" class=" bg-white text-gray-900 text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 hover:bg-gray-100">
                        <option value="ratipen"><img src="img/Ratipen_nothing.PNG" alt="">Ratipen</option>
                        <option value="mosopen">Mosopen</option>
                        <option value="garapen">Garapen</option>
                        <option value="poso-chan">Poso-Chan</option>
                    </select>
                </div>
                </header>
            </div>
            <!-- チャットエリア -->
            <div class="w-full h-screen flex justify-center items-center">
                <div id="image-container" class="flex flex-col justify-center items-center">
                    <!-- ペンギン画像 -->
                    <img id="character-image" src="img/Ratipen_nothing.PNG" alt="" class="h-24">
                    <!-- セリフ -->
                    <p class="text-center text-2xl mt-4 mb-8 text-gray-700 font-bold">お手伝いできることはありますか？</p>
                </div>
            </div>
            <!-- 入力エリア -->
                <div class="absolute bottom-0 w-4/5 p-3 flex flex-col justify-center items-center">
                    <div class="flex justify-center w-full">
                        <!-- Form starts here -->
                        <form action="invoices.php" method="POST" class="flex w-full justify-center items-center">
                            <!-- Textbox with the button inside -->
                            <div class="relative w-1/2 my-6">
                                <input 
                                    name="user_message" 
                                    id="user_message"
                                    placeholder="ペンギンAIにメッセージを送信する"
                                    class="rounded-md w-full p-3 pr-12 bg-gray-100 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                >
                                <!-- SVG button inside the textbox -->
                                <button 
                                    type="submit" 
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 text-blue-500 hover:text-blue-600"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                    </svg>

                                </button>
                            </div>
                        </form>
                        <!-- Form ends here -->
                    </div>
                    <p class="text-sm text-gray-400 mt-3">回答は必ずしも正しいとは限りません。重要な情報は確認するようにしてください。</p>
                </div>

            </div>
            
        </div>
        </div>

    <script>
        // キャラクター画像のマッピング
        const imageMap = {
            ratipen: "img/Ratipen_nothing.PNG",
            mosopen: "img/mosopen_nothing.PNG",
            garapen: "img/Garapen_nothing.PNG",
            "poso-chan": "img/Poso-chan_nothing.PNG"
        };

        // イベントリスナーの追加
        document.getElementById("conversation-partner").addEventListener("change",function(){
            const selectedValue = this.value;
            const imageElement = document.getElementById("character-image");

            // 選択されたキャラクターに対応する画像に切り替え
            if(imageMap[selectedValue]){
                imageElement.src = imageMap[selectedValue];
            }
        })

        document.querySelector("form").addEventListener("submit", function(event) {
            const userMessage = document.getElementById("user_message").value;
            if (!userMessage) {
                event.preventDefault(); // Prevent form submission if input is empty
                alert("メッセージを入力してください！");
            }
        });

    </script>
</body>
</html>