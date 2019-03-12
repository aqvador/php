<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LESSON_4</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="#" id="upload">
        <p>Загрузите ваши фотографии на сервер</p>
        <input type="file" name="file[]" multiple>
        <input type="submit" value="Отправить" name="upload"></p>

    </form>

<?php
if ($_POST['upload'] == 'Отправить') {
	// если есть переменная то значит нажата кнопка отправить. проверяем файлы
	require 'function/function.php';
	$files = upload_in_array();
	if ($files[0]['error'] != '4') {
		$path = 'img/';
		$accept_type = array(
			'image/jpeg',
			'image/png'
		);
		foreach($files as $key => $value) {
			if (in_array($value['type'], $accept_type)) {
				$save_file = $path . translit(pathinfo($value['name'], PATHINFO_FILENAME)) . '.' . pathinfo($value['name'], PATHINFO_EXTENSION);
				move_uploaded_file($value['tmp_name'], $save_file);
				// resize_photo($path, $save_file, $value['type']);
				//  resize_photo($path,$filename,$filesize,$type,$tmp_name){
			}
		}
	}
}
foreach($_POST as $key => $value) {
	break;
}
if (substr($key, 0, 6) == 'delete') {
	exec('rm img/' . explode(",", $key)[1] . '*');
}
$photos = array_diff(scandir('img/') , array(
	'..',
	'.',
	'small'
));
if (!empty($photos)) {
	$content = '<div class="photos">';
	$link = 1;
	foreach($photos as $photo) {
		$file = 'img/' . $photo;
		$content.= '<div class="photo"  style="background-image: url(' . $file . ')">
                <a href="' . $file . '" class="flipLightBox">
               <span></span></a> 
                <input type="submit" value="Удалить" name="delete,' . pathinfo($photo, PATHINFO_FILENAME) . '" form="upload"> 
                </div>';
		$link++;
	}
}
$content.= '</div>';
echo $content;
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="css/fliplightbox.min.js"></script>
<script type="text/javascript">
$('body').flipLightBox({
    
    lightbox_text_status: 0,
    lightbox_navigation_status: 0
    
})
</script>
</body>
</html>