<?php

if($_GET['a'] or $_GET['b']) {

$a = $_GET['a'];
$b = $_GET['b'];
$operator = $_GET['o'];
if(($a == '' or $b == '') or ($a == 'NaN' or $b == 'NaN') ) {
    $c = '&#9785;';
}else {
    switch ($operator) {
        case 'stack':
        if ($a != '' and $b != '') {
            $tmp = $a + $b;
            $c = $a . ' + ' . $b . ' = ' . $tmp; 
         }
        break;
        case 'subtract':
        if ($a != '' and $b != '') {
        $tmp = $a - $b;
        $c = $a . ' - ' . $b . ' = ' . $tmp; 
        }
        break;
        case 'multiply':
        if ($a != '' and $b != '') {
        $tmp = $a * $b;
        $c = $a . ' * ' . $b . ' = ' . $tmp; 
        }
        break;
        case 'divide':
        if ($a != '' and $b != '') {
        if ($b != 0) {
            $tmp = $a / $b;
            $c = $a . ' / ' . $b . ' = ' . $tmp; 
        }  else {
                $c = '&#9785;';
            }   
        }
    }
    
}
echo $c;
}

if($_GET['comment_form'] and $_GET['name_form']) {
    require 'gallery/config/config.php';
    require 'gallery/function/function.php';
    
    if($_GET['comment_form'] != strip_tags($_GET['comment_form'])) {
        $comm = 'Я дебил, хотел хакнуть систему, но меня раскрыли =(';
    } else{
        $comm = strip_tags($_GET['comment_form']);
    }

    $name = strip_tags($_GET['name_form']);
   $ip =  $_SERVER['REMOTE_ADDR'];
   $uri = $_SERVER['HTTP_REFERER'];
   $result = substr($uri, strpos($uri, '=') + 1, strlen($uri));
    $sql = "INSERT INTO `comment` (`name`, `text`, `eventtime`, `person_ip_addr`, `page`) VALUES ('$name', '$comm', NOW(), '$ip', '$result') ;";
    $omysqli->query($sql);
    
$time = substr($value['eventtime'],-8);
$date = data_rus(date('d.m.Y')) . 'г. в ' . date('H:i:s');

$div_com = '<div class="comm">';
$div_com .= '<p class ="name_comment">' .$name . '</p>';
$div_com .= '<p class="date_comment">' .$date. '</p>';
$div_com .= '<h5>' .$comm. '</h5></div>';

echo $div_com;

}