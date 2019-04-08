<?php
function upload_in_array() {
$input_name = 'file';
    $files = array();
    $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
    if ($diff == 0) {
        $files = array($_FILES[$input_name]);
    } else {
        foreach($_FILES[$input_name] as $k => $l) {
            foreach($l as $i => $v) {
                $files[$i][$k] = $v;
            }
        }        
    }  
return $files;
}
function translit($string, $task='5') {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    $chars = ['-', '"', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '{', '}', '|', ':', '"', '<', '>', '?', '[', ']', ';', "'", ',', '.', '/', '', '~', '`', '=', ' ']; 
    return str_replace($chars, '', strtr($string, $converter));
}
function user_browser($agent) {
	preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info); // регулярное выражение, которое позволяет отпределить 90% браузеров
        list($browser,$version) = $browser_info; // получаем данные из массива в переменную
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera '.$opera[1]; // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
        if ($browser == 'MSIE') { // если браузер определён как IE
                preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie); // проверяем, не разработка ли это на основе IE
                if ($ie) return $ie[1].' based on IE '.$version; // если да, то возвращаем сообщение об этом
                return 'IE '.$version; // иначе просто возвращаем IE и номер версии
        }
        if ($browser == 'Firefox') { // если браузер определён как Firefox
                preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); // проверяем, не разработка ли это на основе Firefox
                if ($ff) return $ff[1].' '.$ff[2]; // если да, то выводим номер и версию
        }
        if ($browser == 'Opera' && $version == '9.80') return 'Opera '.substr($agent,-5); // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
        if ($browser == 'Version') return 'Safari '.$version; // определяем Сафари
        if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko'; // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
        return $browser.' '.$version; // для всех остальных возвращаем браузер и версию
}
function resize_photo($path,$filename,$filesize,$type,$tmp_name){
    $quality = 10; //Качество в процентах. В данном случае будет сохранено 60% от начального качества.
    $size = 10485760; //Максимальный размер файла в байтах. В данном случае приблизительно 10 МБ.
    if($filesize<$size){
        switch($type){
            case 'image/jpeg': $source = imagecreatefromjpeg($tmp_name); 
            break; //Создаём изображения по
            case 'image/png': $source = imagecreatefrompng($tmp_name); break;  //образцу загруженного  
            case 'image/gif': $source = imagecreatefromgif($tmp_name); break; //исходя из его формата
            default: return false;
        }
        echo $source;
        imagejpeg($source, $path.$filename, $quality); //Сохраняем созданное изображение по указанному пути в формате jpg
        imagedestroy($source);//Чистим память 
    }
}

function data_rus($date) {


    $date =  date("d.m.Y", strtotime($date));
    //текущая дата
//список месяцев с названиями для замены
$_monthsList = array(
  ".01." => "января",
  ".02." => "февраля",
  ".03." => "марта",
  ".04." => "апреля",
  ".05." => "мая",
  ".06." => "июня",
  ".07." => "июля",
  ".08." => "августа",
  ".09." => "сентября",
  ".10." => "октября",
  ".11." => "ноября",
  ".12." => "декабря"
);
//Наша задача - вывод русской даты, 
//поэтому заменяем число месяца на название:
$_mD = date(".m."); //для замены
return $date = str_replace($_mD, " ".$_monthsList[$_mD]." ", $date);
}

function id_goods($array) {
    if(!empty($array)) {
    foreach ($array['goods'] as $key => $value) {
        $id_goods[] = $key;
        }
    if (!empty($id_goods)) {
    require 'conf/config.php';
    $id = implode(',',$id_goods);
    $select = "SELECT * from `catalog` where id IN ($id)";
        return $omysqli->query($select);

        }
    }
}

function all_goods($kategory='') {
    require 'conf/config.php';
    $select = "SELECT * from `catalog`  order by `show`, id desc";
    return $omysqli->query($select);

}
function GetProduct() {
    $id = (int) $_GET['id_product'];
    require 'conf/config.php';
    $select = "SELECT * from `catalog` where id = '$id'";
    $res = $omysqli->query($select);
    if (!empty($id)) {
    foreach ($res as $key => $value) {
        $answer[$key] = $value;
        }
    return $answer;
    }
}

function menuadmin() {
    $dir = 'admin/';
    $files = array_diff( scandir($dir), array('..', '.'));
    foreach ($files as $key => $value) {
        if(substr($value,0,-4) == 'orders') {
            $menu[] = array('page' => substr($value,0,-4), 'name' => 'Заказы');
        }
        elseif(substr($value,0,-4) == 'goods') {
            $menu[] = array('page' => substr($value,0,-4), 'name' => 'Товары');
        }
    }
    return $menu;
}

function admin_oreders(){
$status  = [
    'open' => 'Открыт',
    'close' => 'Закрыт',
    'job' => 'В работе',
    'cancel' => 'Отменен',
];
	require 'conf/config.php';
	$select = "SELECT order.id, order.name as name, phone, email, `status`, id_product, count, orders.price, catalog.name as cat_name, total_price from `order`
    Inner Join orders on   id = id_basket
    inner join catalog on id_product = catalog.id
    where `status` NOT REGEXP 'close|cancel' ;";
	$res = $omysqli->query($select);
	if ($res->num_rows != 0) {
		foreach($res as $key => $value) {
			$arr[$value['id']]['order'][] = ['name' => $value['cat_name'], 'id_product' => $value['id_product'], 'count' => $value['count'], 'price' => $value['price']];
			$arr[$value['id']]['info']['name'] = $value['name'];
			$arr[$value['id']]['info']['phone'] = $value['phone'];
            $arr[$value['id']]['info']['email'] = $value['email'];
            $arr[$value['id']]['info']['total_price'] = $value['total_price'];
            $arr[$value['id']]['info']['status'] = $status[$value['status']];
        }
        
        foreach ($arr as $key => $value) {
            $select = '';
          $s = $value['info']['status'];
            foreach ($status as $key1 => $value1) {
                if($s == $value1) {
                    $select .= '<option selected value='.$key1.'>'.$value1.'</option>';
                } else {
                    $select .= '<option value='.$key1.'>'.$value1.'</option>';
                }
            }
            $arr[$key]['info']['select'] = $select;
        }
		return $arr;
	}
}

?>