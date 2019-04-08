<?php
if (json_decode($_COOKIE['basket'], true)['count_goods'] == 0 or json_decode($_COOKIE['basket'], true)['count_goods'] == '') {
    echo '<div class="cintain_bask"><h1>Корзина пуста</h1></div>'; 
    die();
}?>
<div class="content">
				<button class="open-modal">Оформить заказ</button>
			</div>
			<div class="modal-overlay"></div>
			<div class="modal-wrapper">
				<div class="modal js-blur">
                    <button class="close-modal">×</button>

                    <h2>Оформление заказа</h2>
                    <label for="">Ваше Имя:</label>
                    <input id="name" type="text" value="<?=$_COOKIE['name']?>" placeholder="Вася" required>
                    <label for="">Телефон:</label>
                    <input id="phone" type="text" value="<?=$_COOKIE['phone']?>" placeholder="начни ввод с 8-ки" required>
                    <label for="">email</label>
                    <input  id="email" type="text" value="<?=$_COOKIE['email']?>" placeholder="email@example.ru" required>
                   <button type="submit" class="now_add_orders" onclick="now_add_orders()">Оформить заказ</button>
				</div>
            </div>
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
$idd_goods = id_goods(json_decode($_COOKIE['basket'], true));
if(empty($idd_goods)) {
    echo '<h2 style="text-align: center"> ПУСТО</h2>';
    die();
}
$catalog = 'catalog/catalog_img/';

foreach ($idd_goods as $key => $value):?>

    <div class="good_item" id="block_goods<?=$value['id']?>">
    <div class="good_item-1">
    <img src="<?=$catalog.$value['img']?>" alt="">
    
    <h4><a href="?page=full_discr&id_product=<?=$value['id']?>"><?=$value['name']?></a></h4>
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
    <button class="delete_goods" onclick="delete_goods(<?=$value['id']?>)"> Удалить </button>
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js'></script>
<script src="scrypt/basket.js"></script>

