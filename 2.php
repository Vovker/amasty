<?php


$data = ['red','blue','green','yellow','magenta','black','gold','gray','tomato'];
for($i = 0; $i < 5; $i++){
    for($j = 0; $j < 5; $j++){
        $elem = array_rand($data,2);
        echo "<span style='color:".$data[$elem[0]]."'>".$data[$elem[1]]."</span> ";
    }
    echo '<br>';
}