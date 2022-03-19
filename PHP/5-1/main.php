<?php
// db_connect.phpの読み込み
require_once('db_connect.php');
// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();
?>

<?php
    // 実行したいSQL文を準備
    $sql = "SELECT * FROM posts";
    // 関数db_connect()からPDOを取得する
    $pdo = db_connect();
        try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        } ?>
    
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
</head>
<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
    <a href="logout.php">ログアウト</a>
    <a href="create_post.php">記事投稿！</a><br />
    <table>
    <tr>
        <td>記事ID</td>
        <td>タイトル</td>
        <td>本文</td>
        <td>投稿日</td>
    </tr>
    // ループ文を使用して、1行ずつ読み込んで$rowに代入する
    // 読み込むものがなくなったらループ終了
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['time']; ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>