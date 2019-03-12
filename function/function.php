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

    return str_replace(' ', '_', strtr($string, $converter));
}

function resize_photo($path,$filename,$filesize,$type,$tmp_name){
    $quality = 60; //Качество в процентах. В данном случае будет сохранено 60% от начального качества.
    $size = 20485760; //Максимальный размер файла в байтах. В данном случае приблизительно 10 МБ.
    if($filesize>$size){
        switch($type){
            case 'image/jpeg': $source = imagecreatefromjpeg($tmp_name); break; //Создаём изображения по
            case 'image/png': $source = imagecreatefrompng($tmp_name); break;  //образцу загруженного  
            case 'image/gif': $source = imagecreatefromgif($tmp_name); break; //исходя из его формата
            default: return false;
        }
        imagejpeg($source, $path.$filename, $quality); //Сохраняем созданное изображение по указанному пути в формате jpg
        imagedestroy($source);//Чистим память
        return true;
    }
    else return false;     
}
