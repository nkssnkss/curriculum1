<?php
// db_connect.phpの読み込み
require_once('db_connect.php');
// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in() ;

// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];
// もし、$idが空であったらmain.phpにリダイレクト
// 不正なアクセス対策
if (empty($id)) {
    header("Location: main.php");
    exit;
}

$sql = "DELETE FROM books WHERE id = :id";

// PDOのインスタンスを取得
$pdo = db_connect();

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        header("Location: main.php");
        exit;
    } catch (PDOException $e) {
        echo 'エラー' . $e->getMessage();
    die();
    }

?>
