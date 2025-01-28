<?php

function connect_to_db()
{

    $server_info = $_SERVER;
	
    $db_name = "";
    $db_id = "";
    $db_pw = "";
    $db_host = "";

    // ローカルの場合
    if ($server_info["SERVER_NAME"] == "localhost") {
        // XAMPPやMAMPなどのローカル環境用
        $db_name = 'work_penguin_db';       // データベース名
        $db_id   = 'root';                    // アカウント名
        $db_pw   = '';                        // パスワード：XAMPPはパスワード無し、MAMPの場合はroot
        $db_host = 'localhost';               // DBホスト
    } else {
        
    }

    // PDOで接続
    try {
        // テンプレートリテラルでの書き方の場合
        $pdo = new PDO("mysql:dbname={$db_name};charset=utf8;host={$db_host}", $db_id, $db_pw);
        
        // $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

// functions.php

function check_session_id()
{
    if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] !== session_id()) {
        header('Location:invoice_login.php');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
    }
}


?>