<?php
require_once 'func/function.php';
$product = GetProduct();
//print_r($product);
$catalog = 'catalog/catalog_img/';
?>
<div class="chair">
<div class="photo" style="background-image: url(<?=$catalog.$product[0]['img']?>)">
</div>
<div class="discription">
    <h2><?=$product[0]['name']?></h2>
    <div class="price">
        <p>₽ &ensp;</p>
        <p id="good_id_<?=$product[0]['id']?>"><?=$product[0]['price']?></p>
    </div>
    <a href="javascript:void(0)" onclick="basket('<?=$product[0]['id']?>', '<?=$_SESSION['client_id']?>')">В корзину</a>
    <p><?=$product[0]['discr']?></p>
    <p><?=$product[0]['full_discr']?></p>
</div>
</div>



<script>
function basket(id, client) {
  console.log(id + 'ИД товара');
  
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
    console.log(client);

  }
});

}
</script>