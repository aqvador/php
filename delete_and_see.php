<?php

$action = $_GET['action'];
$id = $_GET['id'];
require 'config/config.php';
sleep(1);
switch ($action) {
	case 'delete':
		$file = $_GET['file'];
		$delete = "DELETE from photo where id = $id";
		$omysqli->query($delete);
		//exec('rm ' . $file);
		exec('find img/ -name "'.$file.'*" -delete');

		//echo 'Файл ' . $file . ' с ID ' . $id . ' Успешно удален с сервера';
		break;
	case 'count':
	$update = "UPDATE photo set views = views + 1 where id =  $id";
	$omysqli->query($update);
	$count = "SELECT views from photo where id =  $id";
	$res = $omysqli->query($count);
	foreach ($res as $key => $value) {
		$count = $value['views'];
	}
	echo $count;
		break;
}

?>