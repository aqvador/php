<?php

//Дата по русски
print_r(rus_date());
echo "\n";
//Степень
echo pow(3, 3);
echo "\n";
//Математика
print_r(mathOperation(20, 2, '+'));
echo "\n";
/* С помощью свитч, вывод чисел от заданного до 15;  
/* Предлагаемый в задании способ не рациональный на мой взгляд.
*/ 
$count = 13;
switch ($count) { 
    default:
       if (is_numeric($count) and $count >= 0 and $count <= 15  ){
           for ($i=$count; $i <=15 ; $i++) { 
              echo "count = $i\n";
           }
       }
        break;
}
// Часы минуты по русски
function rus_date()
{
	$hour = date('H');
	$minute = date('i');
	if (in_array($hour, array(1,21))) {
		$ru_hour = 'Час';
	}
	elseif (in_array($hour, array(2,3,4,22,23,24))) {
		$ru_hour = "Часа";
	}
	else {
		$ru_hour = 'Часов';
	}
	if (in_array($minute, array(1,21,31,41,51))) {
		$ru_minute = 'Минута';
	}
	elseif (in_array($minute, array(2,3,4,22,23,24,32,33,34,42,43,44,52,53,54))) {
		$ru_minute = 'Минуты';
	}else {
		$ru_minute = 'Минут';
	}
	return $hour . ' ' . $ru_hour . ' ' . $minute . ' ' . $ru_minute;
}
// В степень
function power($val, $pow)
{
	if ($pow != 1) {
		return $val * power($val, $pow - 1);
	}
	else {
		return $val;
	}
}
// матем. операции с параметром
function mathOperation($a, $b, $delim){
	switch ($delim) {
	case '-':
		return deduction($a, $b);
		break;

	case '+':
		return addition($a, $b);
		break;

	case '*':
		return multiplier($a, $b);
		break;

	case '/':
		return share($a, $b);
		break;

	default:
		return 'Вы ушиблись =)';
		break;
	}
}
// вычесть
function deduction($a = 0, $b = 0)
{
	if ($a > $b) {
		return $a - $b;
	}
	return $b - $a;
}
// сложить
function addition($a = 0, $b = 0){
	return $a + $b;
}
// умноджить
function multiplier($a = 0, $b = 0){
	return $a * $b;
}
// разделить
function share($a = 0, $b = 0){
	if ($b != 0) {
		return $a / $b;
	}
	return 'Деление на ноль запрещено!';
}