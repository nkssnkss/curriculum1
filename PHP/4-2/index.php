<?php
require_once("getData.php");

$Blog = new getData();
$post = $Blog->getPostData();
$user = $Blog->getUserData();
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ブログ</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
         <div class="box1">
             <span><img src="logo.png"></span>
         </div>
         <div class="box2">
            <div class="box3">
                <span class="upper"><?php echo "ようこそ".  $user['last_name'] .$user['first_name'] ."さん"?></span>
            </div>
            <div class="box4">
                <span class="upper"><?php echo "最終ログイン日" .$user['last_login'] ?></span>
            </div>
        </div>
    </div>
    <table align="center">
        <tr>
            <th>記事ID</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>投稿日</th>
        </tr>
        <?php while ($data = $post->fetch(PDO::FETCH_ASSOC)) :?>
            <tr>
                <td> <?php echo $data['id'] ; ?> </td>
                <td> <?php echo $data['title'] ; ?> </td>
                <td> <?php if ($data['category_no'] == 1) {
                                echo "食事";
                            } elseif ($data['category_no'] == 2) {
                                echo "旅行" ;
                            } else {
                                echo "その他" ;
                            } ?> </td>
                <td> <?php echo $data['comment'] ; ?> </td>
                <td> <?php echo $data['created'] ; ?> </td>
            </tr>
        <?php endwhile ?>
    </table>
    <div class="footer">
        <span class="bottom">Y&I Group.inc</span>
    </div>
    </body>
</html>