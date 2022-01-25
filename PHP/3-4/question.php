<link rel="stylesheet" href="css/style.css">
<?php $choices1 = ["80", "22", "20", "21"]; ?>
<?php $choices2 = ["PHP", "Python", "JAVA", "HTML"]; ?>
<?php $choices3 = ["join", "select", "insert", "update"]; ?>

<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];
?>
<p>お疲れ様です<?php echo $my_name; ?>さん</p>

<form action="answer.php" method="post">

<h2>①ネットワークのポート番号は何番？</h2>
<div>
<?php foreach($choices1 as $choice): ?>
<input type="radio" name="q0" value="<?php echo $choice?>" /><?php echo $choice?>
<?php endforeach ?>
</div>

<h2>②Webページを作成するための言語は？</h2>
<div>
<?php foreach($choices2 as $choice): ?>
<input type="radio" name="q1" value="<?php echo $choice?>" /><?php echo $choice?>
<?php endforeach ?>
</div>

<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<div>
<?php foreach($choices3 as $choice): ?>
<input type="radio" name="q2" value="<?php echo $choice?>" /><?php echo $choice?>
<?php endforeach ?>

<br>
<br>
<br>

<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<input type="hidden" name="my_name" value="<?php echo $my_name; ?>" />
<input type="submit" value="回答する" />
</form>
</div>

