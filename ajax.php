<?php
if($_GET['comment_form'] and $_GET['name_form']) {
    require 'conf/config.php';
    require 'func/function.php';
    
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

if(isset($_POST['type'])) {
    if($_POST['type'] == 'bask_add') {
        $take = json_decode($_COOKIE['basket'], true);
        $good_id = $_POST['goods_id'];
        $client = $_POST['client'];
        $price = preg_replace("/[^,.0-9]/", '', $_POST['price']);
        $counts = (isset($take['goods'][$good_id]['count'])) ? $take['goods'][$good_id]['count'] : 0;   
        $take['client'] = $client;
        $take['goods'][$good_id]['count'] = $counts+1;
        //$take['goods'][$good_id]['img'] = 'img';
        $take['goods'][$good_id]['price'] = $price;
        $take['goods'][$good_id]['sum'] = $price * $take['goods'][$good_id]['count'];
            $c = 0;
            $total_price = 0;
            foreach ($take['goods'] as $key => $value) {
                $c += $value['count'];
                $total_price += $value['sum'];
            }
            $take['count_goods'] = $c;
            $take['total_price'] = $total_price;
        setcookie('basket', json_encode($take));

    }
}

if(isset($_POST['oper_operation'])) {
if($_POST['oper_operation'] == 'plus' or $_POST['oper_operation'] == 'minus') {
    $good_id =  $_POST['id_production'];
    $take = json_decode($_COOKIE['basket'], true);
    switch ($_POST['oper_operation']) {
        case 'plus':
        $take['goods'][$good_id]['count'] = $take['goods'][$good_id]['count']+1;
        $take['goods'][$good_id]['sum'] = $take['goods'][$good_id]['price'] * $take['goods'][$good_id]['count'];
            break;
            case 'minus':
            $take['goods'][$good_id]['count'] = $take['goods'][$good_id]['count']-1;
            $take['goods'][$good_id]['sum'] = $take['goods'][$good_id]['price'] * $take['goods'][$good_id]['count'];
            break;
    }


    $c = 0;
    $total_price = 0;
    foreach ($take['goods'] as $key => $value) {
        $c += $value['count'];
        $total_price += $value['sum'];
    }
    $take['count_goods'] = $c;
    $take['total_price'] = $total_price;
setcookie('basket', json_encode($take));
$answer['total'] =  $total_price;
$answer['sum'] =  $take['goods'][$good_id]['sum'];
$answer['id'] =$good_id;
echo json_encode($answer);
}
}



if(isset($_POST['delete_id'])) {
$good_id = $_POST['delete_id'];
$take = json_decode($_COOKIE['basket'], true);
unset($take['goods'][$good_id]);
$c = 0;
$total_price = 0;
foreach ($take['goods'] as $key => $value) {
    $c += $value['count'];
    $total_price += $value['sum'];
}
$take['count_goods'] = $c;
$take['total_price'] = $total_price;
setcookie('basket', json_encode($take));
echo json_encode(array('answer' => 'ok', 'id' =>$good_id, 'total' => $total_price));
}