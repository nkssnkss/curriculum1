<?php

$fruits = ["りんご" => "300", "みかん" => "150", "もも" => "3000"];

function getSum($price, $pieces) {
    $sum = $price * $pieces;
}

foreach($fruits as $key => $value){
    print $key."は".$value."円です。";
    echo '<br>';
}

?>