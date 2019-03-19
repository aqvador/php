<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <meta name="viewport" content="width=800,initial-scale=0.5"> -->
<link rel="stylesheet" href="css/css.css">
<script src="js/js.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<?php 
$_SESSION = array();

// сбросить куки, к которой привязана сессия
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
$head = '';
// уничтожить сессию
session_destroy();
require 'gallery/function/function.php';
if($_GET['page'] == 'gallery' or $_GET['page'] == '' or $_GET['page'] == 'catalog'){
$head .= '<script type="text/javascript" src="gallery/css/fliplightbox.min.js"></script>';
} elseif($_GET['page'] == 'admin_panel') {
    if($_POST['submit'] != 'Вход') {

    if(empty($_SESSION['authorization'])){
$head .=  '<link rel="stylesheet" href="css/authoriz.css">';
    }
}
}
echo $head;

?>

</head>
<body>
    <header>
        <div class="naw">
        <ul class="h_menu">
            <li class="menu" id="menu_1"><a id="link_calcu"  href="/?page=calcucator">Калькулятор</a></li>
            <li class="menu" id="menu_2"><a id="link_comment"  href="/?page=comments">Комментарии</a></li>
            <li class="menu" id="menu_3"><a id="link_catalog"  href="/?page=catalog">Каталог</a></li>
            <li class="menu" id="menu_4"><a id="link_admin_panel"  href="/?page=admin_panel">Панель</a></li>
            <li class="menu" id="menu_4"><a id="link_gallery"  href="/?page=gallery">Галерея</a></li>
        </ul>
        </div>
    </header>

<?php
$log = 'admin@admin.ru';
$pass = 'admin';

switch ($_GET['page']) {
    case 'calcucator':
        require_once 'index_calc.php';
        break;
    case 'gallery':
        require_once 'gallery/index.php';
        break;
    case 'comments':
        require_once 'comment/comment.php';
        break;
    case 'catalog':
        require_once 'catalog/catalog.php';
        break;
    case 'admin_panel':
        if($_POST['email'] == 'admin@admin.ru') {
            $_SESSION['authorization'] = 'session-'.rand(10000000000000,100000000000).rand(1000000,1000000000);
            require 'admin/admin_panel.php';
        } else {
            if(empty($_SESSION['authorization'])) {
                require_once 'authorization.php';
            } else {
                echo "ТУТА";
                require 'admin/admin_panel.php';
            }
        
        }
        break;
    case '':
    require_once 'gallery/index.php';
        break;
    
    default:
    require_once 'gallery/index.php';
        break;
}
if ($_GET['page'] != 'comments' and $_GET['page'] != 'admin_panel' ) {
require_once 'comment/comment.php';
}
//phpinfo();
//print_r($_SESSION);
?>
<script>
$(function () {
    var location = window.location.href;
    var cur_url = '/' + location.split('/').pop();
    console.log(cur_url);
    $('.h_menu li').each(function () {
        var link = $(this).find('a').attr('href');
        console.log(link);
        if (cur_url == link) {
            $(this).addClass('current');
        } else {

        }
    });
});
</script>

</body>
</html>


