<div class="admingoods">
    <h2>Товары</h2>
    <div class="add_gud_but">
    <button onclick="add_good()">Добавить новый товар</button>
    </div>
    <?php
$good = all_goods();
foreach ($good as $key => $value):?>
    <div class="editgoods" id="editgoods_<?=$value['id']?>" style="background: <?=($value['show'] == 'N')? '#ec393954':'#4c55c942'?>">
        <div class="editparams" id="editparams_<?=$value['id']?>">
            <div class="editid">
                <label>id товара:</label><input type="text" disabled value="<?=$value['id']?>">
            </div>
            <div class="editname">
                <label>Название товара:</label><input type="text" value="<?=$value['name']?>">
            </div>
            <div class="editprice">
                <label>Цена &#8381;:</label><input type="text" value="<?=$value['price']?>">
            </div>
            <div class="editdiscr">
                <label>Описание:</label><input type="text" value="<?=$value['discr']?>">
            </div>
            <div class="full_discr">
                <label> Полное Описание: </label>
                <textarea><?=$value['full_discr']?></textarea>
            </div>
            <div class="editsize">
                <label> Размеры: </label><input type="text" value="<?=$value['size']?>">
            </div>
        </div>
        <div class="editphoto">
            <input type="file" accept="image/jpeg">
            <a href="#" class="upload_files button" id="<?=$value['id']?>">Загрузить файлы</a>
            <div class="ajax-reply"></div>
            <div class="editphotoupload">
                <p>Текущее фото:</p>
                <img src="catalog/catalog_img/<?=$value['img']?>" alt="основное фото" id="img_id_<?=$value['id']?>">


            </div>

        </div>
        <div class="saveeditgood">
        <button class="edit_show" id="edit_show_<?=$value['id']?>" onclick="edit_show('<?=$value['id']?>', '<?=$value['show']?>')"><?=($value['show'] == 'Y')? 'Скрыть':'Показать'?></button>
        <button  onclick="saveeditgoor(<?=$value['id']?>)">Сохранить</button>
        </div>
    </div>
    <?php endforeach ?>
</div>

<script src="scrypt/upload.js"></script>
<script src="scrypt/save_edit_file.js"></script>