<?php

for ($i = 1; $i <= 100 ; $i++) {
    if  ($i % 3 === 0 && $i % 5 === 0) {
        echo 'FizzBazz!!' ; 
        echo '<br>';
    } elseif ($i % 3 === 0) {
        echo 'Fizz!' ;
        echo '<br>';
    } elseif ($i % 5 === 0) {
        echo 'Bazz!' ;
        echo '<br>';
    } else {
        echo $i ; 
        echo '<br>';
    }
}

?>