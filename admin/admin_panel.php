<h1>Панель администратора</h1>
<div class="admin_panel_block">
<form action="admin/admin_upload.php" enctype="multipart/form-data" class="form_admin_panel" method="POST">

Название товара: <br><input type="text" name="name"> <br>
Цена  <br><input type="text" name="price"> <br>
Краткое описание товара: <br>
<div class="textarea">
<textarea   name="discr" cols="30" rows="10" >
</textarea>
</div>

<div class="textarea">
<textarea  name="fulldiscr" cols="30" rows="10">
</textarea>
</div>
<input name="file" type="file"  accept="image/jpeg,image/gif">
<div class="obozrenie"><input type="submit" class="obozrenie" value="Загрузить" name="upload"></div>

</form>
</div>


<?php

?>

<script>
function goods_admin() {
  var discr = $("#discr").val();
  var fulldiscr = $("#fulldiscr").val();
  var price = $("#price").val();
  var name = $("#name").val();
  console.log(discr + fulldiscr);
}
</script>