<?php
$my_number = $_GET['my_number'];
$select_number = mt_rand(-1,strlen($my_number));
$furtune_number = substr($my_number, $select_number, 1);

?>
<p><?php echo date("Y年m月d日", time()) ?>の運勢は</p>
<p>選ばれた数字は<?php echo $furtune_number ?></p>
<p><?php if ($furtune_number == 0){
                echo "凶";
        } elseif($furtune_number <= 3){
                echo "小吉";
        } elseif($furtune_number <= 6){
                echo "中吉";
        } elseif($furtune_number <= 8){
                echo "中吉";
        } else{
                echo "大吉";
        }?></p>

