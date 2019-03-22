<link rel="stylesheet" href="css/css_cat.css">
<h1 class="wrap-h1">Каталог товаров</h1>
<div class="container-wrap">
  <?php
$catalog = 'catalog/catalog_img/';
$img = array_diff( scandir('catalog/catalog_img/'), array('..', '.'));
$full = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.';
require 'conf/config.php';
require 'conf/config.php';
$discr = 'Lorem ipsum dolor sit amet.';

//print_r($img);
$select = "SELECT * FROM catalog order by name";
$res = $omysqli->query($select);
foreach ($res as $key => $value):?>

<div class="product-wrap">
        <div class="product-item">
          <img src="<?=$catalog.$value['img']?>">
          <div class="product-buttons">
            <a href="javascript:void(0)"  onclick="basket('<?=$value['id']?>', '<?=$_SESSION['client_id']?>')" class="button">В корзину</a>
            
          </div>
        </div>
        <div class="product-title">
          <a href=""><?=$value['name']?></a>
          <span class="product-price" id="good_id_<?=$value['id']?>">₽ <?=$value['price']?></span>
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

<script>
document.querySelector('.button').addEventListener("click", function(event){
    event.preventDefault();
    return false;
}, false);

function basket(id, client) {
  console.log(client);
  
  $(".sasisaful").css('opacity', 1);
  $(".basket").css('opacity', 0);
  var num = parseInt($(".pcs_content").text());
  var price = $('#good_id_'+id).text();
  
    setTimeout(function() { $(".sasisaful").css('opacity', 0); }, 2000);
    setTimeout(function() { 
        $(".basket").css('opacity', 1); 
        $(".pcs_content").text(num +1);
            }, 2000);
    $.ajax({
    type: 'post',
    url: 'ajax.php', // без http:// и домена
    dataType: 'json',
    data: {type:'bask_add', client: client, goods_id: id, price: price},
    success: function(data) {
    console.log(client);

  }
});

}

</script>