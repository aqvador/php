
<div class="administration">
    <h1>Админочка</h1>
<ul>
    <?php
    $menu = menuadmin();
    foreach ($menu as  $value):?>
     <li><a href="?page=admin&type=<?=$value['page']?>"><?=$value['name']?></a></li>
<?php endforeach;?>
</ul>

<?php

if($_GET['page'] == 'admin') {
    foreach ($menu as $value) {
      if($_GET['type'] == $value['page']) {

          require_once 'admin/'.$_GET['type'].'.php';
      }
      elseif(empty($_GET['type'])) {
        require_once 'admin/goods.php'; 
      }
   
    }
}

?>

</div>