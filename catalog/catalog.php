<h1 class="wrap-h1">Каталог товаров</h1>
<div class="container-wrap">
  <?php
$catalog = 'catalog/catalog_img/';
$img = array_diff( scandir('catalog/catalog_img/'), array('..', '.'));
$full = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.';
require 'gallery/config/config.php';
$discr = 'Lorem ipsum dolor sit amet.';

//print_r($img);
$select = "SELECT * FROM catalog order by name";
$res = $omysqli->query($select);
foreach ($res as $key => $value):?>
<?php
?>
      <div class="product-wrap">
        <div class="product-item">
          <img src="<?=$catalog.$value['img']?>">
          <div class="product-buttons">
            <a href="" class="button">В корзину</a>
          </div>
        </div>
        <div class="product-title">
          <a href=""><?=$value['name']?></a>
          <span class="product-price">₽ <?=$value['price']?></span>
        </div>
      </div>
        <?php endforeach; 

function rand_size() {
  $c = rand(3,8);
  $s = rand(20,45);
  $arr = [];
  for ($i = 0; $i <= $c  ; $i++) { 
    $arr[] = $s;
    $s +=2;
  }
  return implode(',', $arr);
}
//$sql = "INSERT INTO `catalog` (`name`, `price`, `category`, `img`, `discr`, `full_discr`, `size`) 
//        VALUES ("."'Кроссовки № ".rand(0,100)."', ".rand(999,2999).", 3, '$value', '$discr', '$full', '".rand_size()."' );";
//
?>

   

</div>