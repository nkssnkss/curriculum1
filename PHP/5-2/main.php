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
    $sql = "SELECT * FROM books";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>在庫一覧画面</h1>
    <div class="container">
        <a class="button3" href="create_book.php">本の新規登録</a>
        <div class="space"></div>
        <a class="button2" href="logout.php">ログアウト</a>
    </div>
    <br>

    <table>
    <tr>
        <th>タイトル</th>
        <th>発売日</th>
        <th>在庫数</th>
        <th></th>

    </tr>

    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a class="buttom4" href="delete_book.php?id=<?php echo $row['id']; ?>">削除</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>