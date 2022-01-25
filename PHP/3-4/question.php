<link rel="stylesheet" href="css/style.css">

<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];
?>
<p>お疲れ様です<?php echo $my_name; ?>さん</p>

<form action="answer.php" method="post">

<h2>①ネットワークのポート番号は何番？</h2>
<input type="radio" name="q1" value="<?php echo $choice?> " 80/><?php echo $choice?>80
<input type="radio" name="q1" value="<?php echo $choice?> " 22/><?php echo $choice?>>22
<input type="radio" name="q1" value="<?php echo $choice?> " 20/><?php echo $choice?>>20
<input type="radio" name="q1" value="<?php echo $choice?> " 21/><?php echo $choice?>>21

<h2>②Webページを作成するための言語は？</h2>
<input type="radio" name="q2" value="PHP">PHP
<input type="radio" name="q2" value="Python">Python
<input type="radio" name="q2" value="JAVA">JAVA
<input type="radio" name="q2" value="HTML">HTML

<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<input type="radio" name="q3" value="join">join
<input type="radio" name="q3" value="select">select
<input type="radio" name="q3" value="insert">insert
<input type="radio" name="q3" value="update">update
<br>
<br>
<br>

<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<input type="submit" value="回答する" />
</form>


