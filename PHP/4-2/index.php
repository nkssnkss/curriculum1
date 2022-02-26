<?php
require_once("getData.php");

$Post = new getData();
$Post->getPostData();
$post = $Post->getPostData();

$User = new getData();
$User->getUserData();
$user = $User->getUserData();
?>


<!doctype html>
<html>
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
                <span>ようこそ<?php $user[first_name]&[last_name] さん?></span>
            </div>
            <div class="box4">
            <span>最終ログイン日<?php $user[last_login] ?>:</span>
            </div>
        </div>
    </div>
        <div class="header"></div>
        <table width="80%" border="1">
            <tr>
                <th scope="col">記事ID</th>
                <th scope="col">タイトル</th>
                <th scope="col">カテゴリ</th>
                <th scope="col">本文</th>
                <th scope="col">投稿日</th>
            </tr>
        </table>
    <div class="footer">
        <span>Y&I Group.inc</span>
    </div>
    </body>
</html>