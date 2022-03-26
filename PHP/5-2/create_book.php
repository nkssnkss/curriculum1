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
    if (empty($_POST["date"])) {
        echo "発売日が未入力です。";
    }
    if (empty($_POST["stock"])) {
        echo "在庫数が未入力です。";
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])) {
        // 入力したtitleとcontentを格納
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];
        
        $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";

        // 関数db_connect()からPDOを取得する
        $pdo = db_connect();
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':stock', $stock);
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>本登録画面</h1>
    <form method="POST" action="">
        <br>
        <input type="text" placeholder="タイトル" name="title" id="title" style="width:200px;height:30px;">
        <br>
        <br>
        <input type="date" placeholder="発売日" name="date" id="date" style="width:200px;height:30px;"><br>
        <br>
        在庫数
        <br>
        <select placeholder="選択してください" name="stock" style="width:200px;height:30px;">
            <?php for ($i=1;$i<=20;$i++){ ?>
            <option value="<?php echo $i; ?>">
            <?php echo $i; ?>
            </option>
            <?php } ?>
        </select>
        <br>
        <br>
        <input type="submit" value="登録" id="post" name="post" class="button1">
    </form>
    <br>
    <a class="button2" href="main.php">在庫一覧</a>
</body>
</html>