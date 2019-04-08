<?php
if(!empty($_GET['comment_form']) and !empty($_GET['name_form'])) {
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
echo json_encode(array('answer' => 'ok', 'id' =>$good_id, 'total' => $total_price, 'count_basket' => $c));
}


if( isset( $_POST['my_file_upload'] ) ){  
	// ВАЖНО! тут должны быть все проверки безопасности передавемых файлов и вывести ошибки если нужно

	$uploaddir = './uploads'; // . - текущая папка где находится submit.php

	// cоздадим папку если её нет
	if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );

	$files      = $_FILES; // полученные файлы
	$done_files = array();
    
	// переместим файлы из временной директории в указанную
	foreach( $files as $file ){
		$file_name = $_POST['click_id'] .'_'.date("Y-d-m_His").'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
		if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
			$done_files[] = realpath( "$uploaddir/$file_name" );
		}
	}

	$data = $done_files ? array('files' => $file_name ) : array('error' => 'Ошибка загрузки файлов.');
   // echo json_encode($_POST);
	die( json_encode( $data ) );
}

if(!empty($_POST['editgood']) and $_POST['editgood'] == 'yes_to_one') {

$id = (int) $_POST['editid'];
$name = $_POST['editname'];
$price = $_POST['editprice'];
$discr = $_POST['editdiscr'];
$full_discr = $_POST['full_discr'];
$size = $_POST['editsize'];
$show = ($_POST['show'] == 'Показать') ? 'N' : 'Y';
if($_POST['photo']['add'] == 'yes') {
    $fname = explode('/',$_POST['newphoto'])[1];
    $tmp_dir = $_POST['photo']['src'];
    exec('rm catalog/catalog_img/' . $id . '*');
    exec('mv ' . $tmp_dir .' catalog/catalog_img/'.$fname);
} else {
 $fname = explode('/',$_POST['nowphoto'])[2];
}

$replace = "REPLACE INTO `catalog` (`id`, `name`, `price`, `discr`, `full_discr`, `size`, `img`, `show`) VALUES ";
$replace .= "(\"$id\", \"$name\", \"$price\",  \"$discr\",  \"$full_discr\", \"$size\", \"$fname\", \"$show\");";
require 'conf/config.php';
$omysqli->query($replace);
die( json_encode(array('up_photo' => $_POST['photo']['add'], 'fname' => $fname)));
}

if(isset($_POST['id_show_edit'])) {
     $s = (isset($_POST['status_show'])) ? $_POST['status_show'] : 'N';

     $status = ($s == 'Y') ? "N" : "Y";
     $answer  = ($s == 'N') ? "скрыть" : "Показать";

    if(!empty($status)) {
         require 'conf/config.php'; 
         $sql = "UPDATE `catalog` SET `show`='$status' where id =$_POST[id_show_edit]";
         $omysqli->query($sql);
        // echo $sql;   
        echo json_encode($answer);
    }
}

if(isset($_POST['add_good'])) {
   // echo json_encode('GOOD_ADD_NEW');
   require 'conf/config.php';
   $sql = "SELECT * from `catalog` where `name` =''";
   $num_rows = $omysqli->query($sql)->num_rows;
    if($num_rows === 0) {
        $sql = "INSERT INTO `catalog` (`show`, `img`) VALUES ('N', 'add_good.png')"; 
        $omysqli->query($sql);
        $resid = $omysqli->insert_id;
        
$answer = '<div class="editgoods" id="editgoods_'.$resid.'" style="background: #e65555b0; display: none">
            <div class="editparams" id="editparams_'.$resid.'">
            <div class="editid">
            <label>id товара:</label><input type="text" disabled value="'.$resid.'">
            </div>
            <div class="editname">
                <label>Название товара:</label><input type="text" value="">
            </div>
            <div class="editprice">
                <label>Цена &#8381;:</label><input type="text" value="">
            </div>
            <div class="editdiscr">
                <label>Описание:</label><input type="text" value="">
            </div>
            <div class="full_discr">
                <label> Полное Описание: </label>
                <textarea></textarea>
            </div>
            <div class="editsize">
                <label> Размеры: </label><input type="text" value="">
            </div>
        </div>
        <div class="editphoto">
            <input type="file" accept="image/jpeg">
            <a href="#" class="upload_files button" id="'.$resid.'">Загрузить файлы</a>
            <div class="ajax-reply"></div>
            <div class="editphotoupload">
                <p>Текущее фото:</p>
                <img src="catalog/catalog_img/add_good.png" alt="основное фото" id="img_id_'.$resid.'">
            </div>
        </div>
        <div class="saveeditgood">
        <button  onclick="cancel_adding('.$resid.')">Отменить</button>
        <button  onclick="saveeditgoor('.$resid.')">Сохранить</button>
        </div>
    </div>';
$arr['block'] =  $answer;
$arr['id'] = $resid;

    echo json_encode($arr);
    }
}

if(isset($_POST['cancel_good']) and $_POST['cancel_good'] == 'new_good_cancel') {


    $id = (int) $_POST['cancel_good_id'];
    require 'conf/config.php';
    $sql = "DELETE FROM `catalog` where id =$id";
    $num_rows = $omysqli->query($sql);
    echo json_encode($num_rows);
}

if(!empty($_POST['place_your_order']) and $_POST['place_your_order'] == 'yes'  and $_POST['name'] != '' and $_POST['phone'] != '' and $_POST['email'] != '' ) {
    $name = strip_tags($_POST['name']);
    $phone = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    $basket = json_decode($_COOKIE['basket'], true);
    $tp = $basket['total_price'];
    $client_id = (empty($basket['client'])) ? $name.'_guest_'.date('Y-m-d_H_i_s') : $basket['client'] ;
    require 'conf/config.php';
         $sql = "INSERT INTO `order` (`date_order`, `client_id`, `name`, `email`, `phone`, `total_price`) VALUES (NOW(), '$client_id', '$name', '$email', '$phone', '$tp');"; 
        //  echo json_encode($sql);
        //  die();
         $omysqli->query($sql);
         $resid = $omysqli->insert_id;
         $to_sql = "INSERT INTO `orders` (`id_basket`, `id_product`, `count`, `price`) VALUES ";
        foreach ($basket['goods'] as $key => $good) {
            $to_sql .= '('."$resid".', '.$key.', '.$good['count'].', '.$good['price'].'),';
        }
        $sql = substr($to_sql,0,-1).';';
        $res = $omysqli->query($sql);
        if ($res === true) {
        setcookie('basket', '');
        }
    echo json_encode($res);
}

if(isset($_POST['edit_status_orders']) and $_POST['edit_status_orders'] == 'edit_status') {
    require 'conf/config.php';
    $id = preg_replace("/[^,.0-9]/", '', $_POST['id_status']);
    $name = strip_tags($_POST['status_name']);
    $sql = "UPDATE `order` SET `status` = '$name' where  id = '$id'";
    $res = $omysqli->query($sql);
    $answ['answ'] = $res;
    $answ['id'] = $id;
    echo json_encode($answ);


}