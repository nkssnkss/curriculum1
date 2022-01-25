<link rel="stylesheet" href="css/style.css">

<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$my_name = $_POST['my_name'];
$q0 = $_POST['q0'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
?>

<php?
function Judgement ($Q, $A) {
    if ($Q == $A){
            echo "正解";
        } else {
            echo "残念";
        } 
    } 
?>

<p><?php echo $my_name; ?>さんの結果は・・・？</p>

<!--作成した関数を呼び出して結果を表示-->
<p>①の答え
<br>
<php?
    Judgement($q0,80)
?>
</p>
<br>

<p>②の答え
    <br>
    <?php if ($q1 == "HTML"){
            echo "正解";
        } else {
            echo "残念";
        } ?> </p>

<p>③の答え
    <br>
    <?php if ($q2 == "select"){
            echo "正解";
        } else {
            echo "残念";
        } ?> </p>

</p>
