<?php
// db_connect.phpの読み込み
require_once('db_connect.php');
// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in() ;

// 提出ボタンが押された場合
if (isset($_POST["post"])) {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    }
    if (empty($_POST["content"])) {
        echo "コンテンツが未入力です。";
    }

    if (!empty($_POST["title"]) && !empty($_POST["content"])) {
        // 入力したtitleとcontentを格納
        $title = $_POST["title"];
        $content = $_POST["content"];
        
        $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";

        // 関数db_connect()からPDOを取得する
        $pdo = db_connect();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':content', $content);
            $stmt->execute();
            header("Location: main.php");
                exit;
        } catch (PDOException $e) {
            echo 'データベースエラー' . $e->getMessage();
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>記事登録</h1>
    <form method="POST" action="">
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;">
        <br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;"><br>
        <input type="submit" value="submit" id="post" name="post">
    </form>
</body>
</html>