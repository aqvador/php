<?php
/* ВЫВОД ИНФОРМАЦИИ НА ЭКРАН */
if ($_POST['upload'] == 'Загрузить') {
    print_r($_POST);
	// если есть переменная то значит нажата кнопка отправить. проверяем файлы
    $file = $_FILES['file']; //upload_in_array();
    if ($file[0]['error'] != '4') {
        require '../gallery/config/config.php';
        require '../gallery/function/function.php';
        $accept_type = array(
			'image/jpeg',
			'image/png'
        );
        $name = $_POST['name'];
        $discr = $_POST['discr'];
        $fulldiscr = $_POST['fulldiscr'];
        $price = $_POST['price'];
print_r($_POST);
        $path = '../catalog/catalog_img/';
        foreach($file as $key => $tmp) {
            $files[0][$key] = $tmp;
            }
        foreach($files as $key => $value) {
            
			if (in_array($value['type'], $accept_type)) {
				$f_name = translit(pathinfo($value['name'], PATHINFO_FILENAME)) . '.' . pathinfo($value['name'], PATHINFO_EXTENSION);
                $save_file = $path . $f_name;
                width_photo($save_file);
				move_uploaded_file($value['tmp_name'], $save_file);
				$resize = explode('/', $save_file);
				$res= resize_photo($path.'small/', $f_name, $value['size'],$value['type'],$save_file);
				$upload = "INSERT INTO `catalog` (`name`, `price`, `category`, `img`, `discr`, `full_discr`) VALUES ('$name', '$price', 3, '$f_name', '$discr', '$fulldiscr')";
                $omysqli->query($upload);
                echo $upload;

				
			}
        }
    }
}

header("Location: http://lesson_6.geekbrains.club/?page=admin_panel");