<?php
session_start();
mb_internal_encoding("UTF-8");
header('Content-Type: text/html; charset=utf-8');
$array = json_decode($_COOKIE['basket'], true);
$count_goods = (isset($array['count_goods']))? $array['count_goods'] : 0;
// foreach ($array as $key => $value) {
//     print_r($value);
//     echo '<br>';
// }
// echo 'Общяя стоимость заказов: '. $array['total_price'];
// echo '<br>';
// echo 'Общее кол-во  позиций в корзине: '. $array['count_goods'];
//setcookie('test', 'value');
$state = ($_SESSION['auth'] == 'yes')? 'Выход' : 'Вход';
$menu = ($_SESSION['auth'] == 'yes')? '<li class="nav__item"><a href="?page=admin">Админка</a></li>' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="auth/css/style.css">
    <link rel="stylesheet" href="css/normal.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="fonts/ligature.css">
    <title>Домашняя страница</title>
</head>
<body>
<div class="nav">
    <a href="#" class="nav__trigger">
        <div class="bars"></div>
    </a>
    
    <div class="nav__content">
        <nav class="nav__list">
            <ul>
                <li class="nav__item"><a href="?page=home">Домой</a></li>
                <li class="nav__item"><a href="?page=catalog">Товары</a></li>
                <li class="nav__item"><a href="?page=comments">Отзывы</a></li>
                <li class="nav__item"><a href="?page=auth"><?=$state?></a></li>
                <?=$menu?>

            </ul>
        </nav>
    </div>    
</div>

<div class="container">

<div class="sasisaful">
Обновлено
</div>
<div class="basket">
    <a href="?page=basket"">
        <img src="img/back.png" alt=""> 
    </a>
    <p class="pcs_content"><?=$count_goods?></p>
</div>



<?php 


switch ($_GET['page']) {
    case 'auth':
        require 'auth.php';
        break;

    case 'home':
        require 'home.php';
        break;

    case 'catalog':
        require 'catalog/catalog.php';
         break;
    case 'basket':
         require 'basket.php';
            break;

    case 'comments':
        require 'comment/comment.php';
        break;
    case 'admin':
    $pageadmin =  ($_SESSION['auth'] == 'yes') ? 'admin': 'home';
        require $pageadmin.'.php';
        break;
    
    default:
        require 'home';
        break;
}
//require 'ajax.php';
//print_r($_COOKIE['urna']);
//setcookie('basket', json_encode($_SESSION));

//print_r(json_decode($_COOKIE['urna']));

$array = json_decode($_COOKIE['basket'], true);

//print_r($array);

?>
</div>
<footer>
      <div class="row">
      
          <div class="twelve columns footer">
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="twitter">Twitter</a> 
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="facebook">Facebook</a>
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="pinterest">Pinterest</a>
              <a href="" class="lsf-icon" style="font-size:16px" title="instagram">Instagram</a>
          </div>
      </div>
</footer>
<script src="scrypt/menu.js"></script>
</body>
</html>