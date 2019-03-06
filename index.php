<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-1 Урок 3</title>
</head>
<?php
require 'function.php';
?>
<body>
    <div class="container">
        <div class="task1">
            <h3>1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка</h3>
            <?php
        echo '=> ' . implode(", ", task_1(100, 3)) . ' <=';
?>

        </div>
        <hr>
        <div class="task2">
            <h3>2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10</h3>
            <?php
        task_2(0, 10);
?>

        </div>
        <hr>
        <div class="task3">
            <h3>3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области.</h3>
            <?php
        foreach($city as $key => $value) {
		    echo $key . ':' . "\n";
		    echo implode(",", $value);
		    echo "<br /><hr>";
}
?>
        </div>

        <div class="task4">
            <h3>4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания. Написать функцию транслитерации строк</h3>
            <?php
        echo translit('Привет, как дела', 4);
?>
                <hr>
        </div>

        <div class="task5">
            <h3>5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку</h3>
            <?php
        echo replace_earth('Привет, как дела') . '<br />';
?>
        </div>

        <div class="task6">
            <h3>6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать</h3>
                <ul style="list-style-type:none">
                <?php
        foreach($menu as $key => $value) {
		    echo "<li><a style=\"text-decoration:none\" href='#'> $key </a>";
		    echo '<ul>';
		        foreach($value as $row) {
				    echo "<li  style=\"list-style-type:none; text-decoration:none\"><a style=\"text-decoration:none\" href='#'>$row</a></li>";
		    }
		    echo '</ul>';
		    echo "</li>";
}
?>
                </ul>
        </div>
        <hr>
        <div class="task7">
            <h3>7. Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла.</h3>
            <?php
        for ($i = 0; $i < 10; print_r($i++)) {
};
?>
        </div>

        <div class="task8">
            <h3>8. Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».</h3>
            <?php
        task_8($city);
?>
                <hr>
        </div>

        <div class="task9">
            <h3>9. Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания</h3>
            <?php
        echo translit('Привет, как дела');
?>
        </div>
    </div>

</body>

</html>