<?php
require_once('db_connect.php');
// セッション開始

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        // 入力したユーザIDとパスワードを格納
        $name = $_POST["name"];
        $password = $_POST["password"];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

// :passwordにバインドする場合は、$password_hashを使用する
        $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";

        // 関数db_connect()からPDOを取得する
        $pdo = db_connect();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password_hash);
            $stmt->execute();
            echo '登録が完了しました。';
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
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>ユーザー登録画面</h1>
<form method="POST" action="">
<br>
<input type="text" placeholder="ユーザー名" name="name" id="name" style="width:300px;height:25px;">
<br>
<br>
<input type="password" placeholder="パスワード" name="password" id="password" style="width:300px;height:25px;"><br>
<br>
<br>
<input type="submit" value="新規登録" id="signUp" name="signUp" class="button">

</form>
</body>
</html>