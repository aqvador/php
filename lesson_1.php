<?php
echo '<h1 text_align="center">LESSON_1</h1>';   
 $a = 5;
    $b = '05';
    var_dump($a == $b);
	echo 'var_dump($a == $b);' . ' <br>// Почему true? <br> true потому что проверятся не точно по типу. а раз int=5 а string=05 то это true<hr>';
    var_dump((int)'012345');
	echo 'var_dump((int)\'012345\');' . ' <br>// Почему 12345? <br>  Потому что тип данных int, показывается целое число<hr>';
    var_dump((float)123.0 === (int)123.0); // Почему false?
	echo ' var_dump((float)123.0 === (int)123.0); ' . '<br>// Почему false? <br> потому что тип данных не совпадает, 
				идет проверка не только по значениям но и по типу данных<hr>';
    var_dump((int)0 === (int)'hello, world'); // Почему true?
	echo 'var_dump((int)0 === (int)\'hello, world\');' . '<br>// Почему true? <br> потому что  строка \'hello, world\' не содержит цифр присваивается значнеие 0<hr>';

    //решение 1;
    echo "Решение 1 <br>";
    $a=1;
    $b=2;
    
    
    $a= [$a, $b];
    $b=$a[0];
    $a=$a[1];
    echo '$a стала = ' . $a .'<br>$b стала = ' . $b . '<hr>';
    //решение 2;
    echo "Решение 2 <br>";
    $a=1;
    $b=2;
    $a = $a.'_'.$b;
    $b= substr($a, 0, 1);
    $a= substr($a, -1);
    echo '$a стала = ' . $a .'<br>$b стала = ' . $b . '<hr>';

        //решение 3;
        echo "Решение 3 <br>";
    $a=1;
    $b=2;
    $a = $a.'_'.$b;
    $b= explode('_', $a);
    $a=$b[1];
    $b=$b[0];
    echo '$a стала = ' . $a .'<br>$b стала = ' . $b . '<hr>';
echo 'И тд, отталкиваясь от задачи';




?>
