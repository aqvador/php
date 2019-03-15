<?php
	$user_agent = user_browser($_SERVER['HTTP_USER_AGENT']);
	
	if (strpos($user_agent, "Firefox") !== false) $browsery = "Firefox";
	elseif (strpos($user_agent, "Opera") !== false) $browsery = "Opera";
	elseif (strpos($user_agent, "Chrome") !== false) $browsery = "Chrome";
	elseif (strpos($user_agent, "MSIE") !== false) $browsery = "Internet Explorer";
	elseif (strpos($user_agent, "Safari") !== false) $browsery = "Safari";
	else $browsery = "Неизвестный";
	

$browser = '<div class="browser">';
$browser .= 'Ваш браузер: '.$browsery;
$browser .= '</div>';

		echo $browser;
?>