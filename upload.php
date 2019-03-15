<!-- ФОРМА ЗАГРУЗКИ -->
<form enctype="multipart/form-data" method="post" action="#" id="upload" >
		<div class="upload_form">
		<h2>Загрузите ваши фотографии на сервер</h2>


<label>

	<input name="file[]" type="file" class="main_input_file" multiple accept="image/jpeg,image/gif">
	<div class="obozrenie">Обзор...</div>
	<input class="f_name" type="text" id="f_name" value="Файл не выбран." disabled />
	<div class="obozrenie"><input type="submit" class="obozrenie" value="Загрузить" name="upload"></div>

</label>

</div>
	</form>
<?php
/* ВЫВОД ИНФОРМАЦИИ НА ЭКРАН */
if ($_POST['upload'] == 'Загрузить') {
	// если есть переменная то значит нажата кнопка отправить. проверяем файлы
	$files = upload_in_array();
	if ($files[0]['error'] != '4') {
		require 'config/config.php';
		$path = 'img/';
		$accept_type = array(
			'image/jpeg',
			'image/png'
		);
		foreach($files as $key => $value) {
			if (in_array($value['type'], $accept_type)) {
				$f_name = translit(pathinfo($value['name'], PATHINFO_FILENAME)) . '.' . pathinfo($value['name'], PATHINFO_EXTENSION);
				$save_file = $path . $f_name;
				move_uploaded_file($value['tmp_name'], $save_file);
				$resize = explode('/', $save_file);
				$res= resize_photo($path.'small/', $f_name, $value['size'],$value['type'],$value['tmp_name']);
				echo $res;
				$upload = "INSERT INTO `photo` (`url_photo`, `views`) VALUES ('$f_name', 0)";
				//echo $upload;
				$omysqli->query($upload);
				
			} elseif($value['type'] == 'application/x-php') {
				echo 'Иди на хуй со своими скриптами'."<br>";
			} else {
				echo 'Файл '.$value['type'].' Я загружать на сайт не буду'."<br>";
			}
		}
		header("Location: http://lesson_5.geekbrains.club/");
	}

}
?>

