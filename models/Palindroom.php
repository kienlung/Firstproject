<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


echo flipText("Piet");

function flipText($text){
    $flippedText= "";
    for($i=strlen($text);$i>=0;$i--){
        $flippedText = $flippedText . $text[$i];
        
    }
    return $flippedText;
}
