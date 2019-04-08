
<h2>Заказы</h2>
<div class="orders_admin">
<?php $orders = admin_oreders();
//print_r($orders);
if(!empty($orders)){
foreach ($orders as $id_order => $value) : ?>

<div class="block_order_admin" id="admin_<?=$id_order?>">
<div class="info_client_order">
<h3>Заказ &#8470; <?=$id_order?></h3>
<h4>Заказчик: <?=$value['info']['name']?> </h4> 
<h4>Телефон:   <?=$value['info']['phone']?> </h4>
<h4>Email:  <?=$value['info']['email']?> </h4>
<h4>Сумма заказа: <?=$value['info']['total_price']?> &#8381;</h4>
<select id="select_<?=$id_order?>">
<?php echo $value['info']['select']; ?>
</select>
</div>
<div class="allblock_produck">
<?php foreach ($value['order'] as $order) : ?>
<div class="onfo_from_order">
<p>Наименование товара: <?=$order['name']?> </p> 
<p>ID товара на складе: <?=$order['id_product']?> </p> 
<p>ко-во заказанных позиций: <?=$order['count']?> </p> 
<p>Цена за 1 единицу: <?=$order['price']?> &#8381;</p> 
</div>
<?php endforeach;?>
</div>
</div>

<?php endforeach;
}?>
</div>

<script src="scrypt/edit_orders.js"></script>