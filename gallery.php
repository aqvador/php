<?php

require 'config/config.php';
$arr = "SELECT * from photo order by views DESC";
$photos = $omysqli->query($arr);

if ($photos->num_rows > 0) {
	$content = '<div class="photos">';
	$img = 'img/';
	$img_icon = $img. 'small/';
	foreach($photos as $photo) {
		$file = $photo['url_photo'];
		$id = $photo['id'];
		$count = $photo['views'];

		$bg = filesize($img_icon.$file);
		$bgc = $img_icon.$file;
		if ($bg == 0) {
			$bgc = $img.$file;
		}

		$left = '25px';
		if($count <10) {
			$left = '30px';
		}
		
		$content.= '<div class="head_div" id="head_'.$id.'">
		<div class="photo" id="div_'.$id.'"  style="background-image: url('.$bgc . ')">
				
                <a href="' .$img. $file . '" onclick="county(\''.$id.'\')" class="flipLightBox" data-lightbox="imagegroup" id="'.$id.'">
			   <span></span>
			   <img class="see" id="see'.$id.'" src="icon/see.png" alt="see"></a> 
			   
				<div class="delete" id="delete'.$id.'"> <a  onclick="d(\''.$id.'\',\''.$file.'\')"> Удалить</a></div>
			
				<div class="count" id="summ'.$id.'" style="left: '.$left.'"> <p id="paragraff_'.$id.'">'.$count.'</p> </div>
						
				</div></div>';
	}
}
$content.= '</div>';
echo $content;

?>