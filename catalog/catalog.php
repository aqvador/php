<link rel="stylesheet" href="css/css_cat.css">
<h1 class="wrap-h1">Каталог товаров</h1>
<div class="container-wrap">
  <?php
$catalog = 'catalog/catalog_img/';
$img = array_diff( scandir('catalog/catalog_img/'), array('..', '.'));
$full = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto corporis sequi voluptatum. Perspiciatis iusto consectetur aut nesciunt explicabo, quia est.';
require 'conf/config.php';
$discr = 'Lorem ipsum dolor sit amet.';

$select = "SELECT * from catalog where `show` != 'N' order by name";
$res = $omysqli->query($select);
foreach ($res as $key => $value):?>

<div class="product-wrap">
  <div class="block_air"id="product-wrap2_<?=$value['id']?>"></div>
        <div class="product-item" id="idgoods_<?=$value['id']?>">
          <img src="<?=$catalog.$value['img']?>">
          <div class="product-buttons">
            <a href="javascript:void(0)" id="<?=$value['id']?>"  onclick="basket('<?=$value['id']?>', '<?=$_SESSION['client_id']?>')" class="button">В корзину</a>
            
          </div>
        </div>
        <div class="product-title">
          <a href="?page=full_discr&id_product=<?=$value['id']?>"><?=$value['name']?></a>
          <span class="product-price" id="good_id_<?=$value['id']?>">₽ <?=$value['price']?></span>
        </div>
      </div>
        <?php endforeach; ?>

   

</div>

<script>
document.querySelector('.button').addEventListener("click", function(event){
    event.preventDefault();
    return false;
}, false);

function basket(id, client) {
  //console.log(client);
  
  $(".sasisaful").css('display', 'block');
  var num = parseInt($(".pcs_content").text());
  var price = $('#good_id_'+id).text();
  $(".pcs_content").text(num +1);
    setTimeout(function() { $(".sasisaful").css('display', 'none'); }, 2000);
    setTimeout(function() { 
        
            }, 2000);
    $.ajax({
    type: 'post',
    url: 'ajax.php', // без http:// и домена
    dataType: 'json',
    data: {type:'bask_add', client: client, goods_id: id, price: price},
    success: function(data) {
   // console.log(client);

  }
});

}


$(function(){
  $('.product-item  a').click(function(){
    var id = $(this).attr('id');
   // alert(id);
    $('#idgoods_' + id).clone()  
       .css({'position' : 'absolute', 'z-index' : '10000'})  
           .appendTo('#product-wrap2_' + id).animate({
		top: $(".pcs_content").offset()['top'],
    left: $(".pcs_content").offset()['left'],
		opacity: 0,
		width: 40
	},1500, function(){
	  $(this).remove();
});
});			
});

</script>