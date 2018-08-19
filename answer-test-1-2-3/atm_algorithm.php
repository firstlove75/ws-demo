<?php
function countCurrency($amount){
    $note_items = array(50, 10, 5, 1);
    $note_count = array(0, 0, 0, 0);
     
    for ($i = 0; $i < count($note_items); $i++) {
        if ($amount >= $note_items[$i]) {
            $note_count[$i] = intval($amount / $note_items[$i]);
            $amount = $amount - ($note_count[$i] * $note_items[$i]);
        }
    }     
    for ($i = 0; $i < 4; $i++) {
        if ($note_count[$i] != 0) {
            echo ($note_items[$i] . " : " . $note_count[$i] . "<br>");
        }
    }
}
 
$amount = 2018;
countCurrency($amount);
