<div class="cintain_bask">
    <h1>Корзина</h1>
    <div class="names_basket">
        <p>ТОВАР</p>
        <p>ЦЕНА</p>
        <p>КОЛЛИЧЕСТВО</p>
        <p>СУММА</p>
    </div>
    <hr class="name_hr">
<?php
require 'func/function.php';
$array = json_decode($_COOKIE['basket'], true);
foreach ($array['goods'] as $key => $value) {
$id_goods[] = $key;
}
$catalog = 'catalog/catalog_img/';
$idd_goods = id_goods($id_goods);
//print_r($idd_goods);
foreach ($idd_goods as $key => $value):?>

    <div class="good_item" id="block_goods<?=$value['id']?>">
    <div class="good_item-1">
    <img src="<?=$catalog.$value['img']?>" alt="">
    <h4><a href=""><?=$value['name']?></a></h4>
    </div>
    <div class="good_item-2">
        <p>₽ <?=$value['price']?></p>
    </div>
    <div class="good_item-3">
    
    <div class="plus_minus">
    <button onclick="add_del('<?=$value['id']?>', 'minus','<?=$value['price']?>')">-</button>
    <input   type="number" min="0" disabled id="count_<?=$value['id']?>" value="<?=$array['goods'][$value['id']]['count']?>"> 
    <button onclick="add_del('<?=$value['id']?>', 'plus','<?=$value['price']?>')">+</button>
    </div>
    <button class="delete_goods" onclick="delete_fun(<?=$value['id']?>)"> Удалить </button>
    </div>

    <div class="good_item-4" >
        <p id="summ_id_<?=$value['id']?>">₽ <?=$array['goods'][$value['id']]['sum']?></p>

    </div>

    </div>
<?php endforeach;?>
<hr class="name_hr">
<div class="total_price">
    <p> Итого: ₽ 
        <?=$array['total_price']?>
    </p>
</div>
</div>

<script>
function add_del(id, oper, price) {
    $(".sasisaful").css('opacity', 1);
  var num = parseInt($(".pcs_content").text());
  var price = $('#good_id_'+id).text();
  var countid = parseInt($('#count_' + id).val());
  
 
  //alert(oper);
  switch (oper) {
      case 'plus':
      $('#count_' + id).val(countid +1);
      $(".pcs_content").text(num +1);
      setTimeout(function() { $(".sasisaful").css('opacity', 0); }, 2000);
        
          break;
        case 'minus':
        if(countid != 0) {
        $('#count_' + id).val(countid -1);
        $(".pcs_content").text(num -1);
      setTimeout(function() { $(".sasisaful").css('opacity', 0); }, 2000);
        }
          break;
  }
  if(countid != 0 || oper == 'plus') {
  $.ajax({
    type: 'post',
    url: 'ajax.php', // без http:// и домена
    dataType: 'json',
    data: {id_production:id, oper_operation:oper},
    success: function(data) {
   // console.log(data.sum);
    $('.total_price p').text('Итого: ₽ ' +data.total);
    $('#summ_id_' + id).text(' ₽ ' +data.sum);

        }
    });
  }
}

function delete_fun(id) { {
   // alert('kr');
    $.ajax({
    type: 'post',
    url: 'ajax.php', // без http:// и домена
    dataType: 'json',
    data: {delete_id:id},
    success: function(data) {
   // console.log(data.sum);
   // $('.total_price p').text('Итого: ₽ ' +data.total);
   // $('#summ_id_' + id).text(' ₽ ' +data.sum);
   //alert(data.answer);
   if(data.answer == 'ok') {
    $('#block_goods'+data.id).css('opacity', 0);
    $('.total_price p').text('Итого: ₽ ' +data.total);
    setTimeout(function() { $('#block_goods'+data.id).remove(); }, 2000);
    //alert('ok');
            }
        }
    });
}
    
}
</script>