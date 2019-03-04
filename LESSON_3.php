<?php

// 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
$cicle = 0;
while ($cicle <= 100) {
    if($cicle%3 === 0) {
         $oth[] = $cicle;
    }
$cicle++;
}
print_r(implode(",",$oth));

echo "\n";
echo "\n";
// 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
$i = 0;
do {
    $count = "$i не четное число\n";
    if($i == false) {
        $count = "$i равен нулю\n";
    }
    elseif($i%2 == 0) {
        $count= "$i Четное число\n";
    }
echo $count;
$i++;
} while ($i <= 10);
echo "\n";

$city = [
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань', 'Касимов', 'Сасово', 'Михайлов', ' (названия городов можно найти на maps.yandex.ru)   '
    ]
    ];
  //  3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
    foreach ($city as $key => $value) {
        echo $key .':' . "\n";
        echo implode(",", $value);
        echo "\n";
    }
    echo "\n";

// вывод городов. начинабщихся на букку К
    foreach ($city as $key => $value) {
        echo $key .':' . "\n";
      foreach ($value as $key2 => $row) {
         // echo $row . "\n";
         if(mb_substr($row,0,1) == 'К') {
             echo $row . "\n";
         }
      }
    }
    echo "\n";

//Транслит
print_r(rus2translit('Привет пупсик, как дела'));
//Цикл for  без тела
echo "\n";
for ($i = 0; $i < 10; print_r($i++ . "\n"));
echo "\n";


// 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
function rus2translit($string) {
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
    return replace_earth(strtr($string, $converter));
}
// 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
function replace_earth($str) {
return str_replace(' ', '_', $str);
}