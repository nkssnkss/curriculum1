<?php
require_once('db_connect.php');
// セッション開始

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    if (!empty($_POST["name"]) && !empty($_POST["password"]) ) {
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>新規登録</h1>
<form method="POST" action="">
user:<br>
<input type="text" name="name" id="name">
<br>
password:<br>
<input type="password" name="password" id="password"><br>
<input type="submit" value="submit" id="signUp" name="signUp">

</form>
</body>
</html>