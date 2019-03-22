<?php
session_start();
require '../conf/config.php';
if($_POST['type_auth'] == 'registry_form') {

$name = strip_tags($_POST['reg_name']);
$last_name = strip_tags($_POST['reg_last_name']);

$login = strip_tags($_POST['reg_email']);
$_SESSION['login'] = $login;
$pass = strip_tags($_POST['reg_pass']);
setcookie('pass', $pass);
$prov = strip_tags($_POST['reh_name'].$_POST['reg_last_name'].$_POST['reg_email']);
$prov2 = $_POST['reh_name'].$_POST['reg_last_name'].$_POST['reg_email'];
if ($prov == $prov2) {
    $hesh = 'f&x!gyq!';
    $pass = md5($hesh.$pass);
    $insert = $omysqli->prepare("INSERT INTO `users` (`name`, `last_name`, `login`, `pass`) VALUES (?, ?, ?, ?)"); 
    $insert->bind_param('ssss', $name, $last_name, $login, $pass); 
    $insert->execute(); 
    $id = $insert->insert_id; 
    //$name = iconv('', 'utf-8', $name);
    setcookie('name', $name, time() + 3600*7*24, '/');
    $_SESSION['name'] = "$name";
    if(empty($_COOKIE['client_id'])) {
        setcookie('client_id', "$id");
        $_SESSION['client_id'] = $id;
        $_SESSION['registry'] = 'yes';
    }
    
    header("Location: http://lesson_7.geekbrains.club/?page=auth");
} else {
    
}

} elseif ($_POST['type_auth'] == 'auht_form') {
    print_r($_POST);
    $login = strip_tags($_POST['auth_mail']);
    $pass = strip_tags($_POST['auth_pass']);
    $prov = strip_tags($_POST['auth_mail'].$_POST['auth_pass']);
    $prov2 = $_POST['auth_mail'].$_POST['auth_pass'];
    if ($prov == $prov2) {
echo "nn";
        if ($select = $omysqli->prepare("SELECT name, last_name, id FROM users WHERE login = ? and pass = ?")) { 
            $hesh = 'f&x!gyq!';
            $pass = md5($hesh.$pass);
            $select->bind_param("ss", $login, $pass); 
            $select->execute(); 
            /* Объявление переменных для заготовленного выражения*/ 
           $res =  $select->bind_result($name, $l_name, $id); 
       // print_r($select);
        echo "тут";
            /* Выборка значений */ 
            while ($select->fetch()) { 
                $_SESSION['client_id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['l_name'] = $l_name;
                $_SESSION['auth'] = 'yes';
            }
            if(!empty($id)) { 
            header("Location: http://lesson_7.geekbrains.club/?page=catalog");
        } else {
            header("Location: http://lesson_7.geekbrains.club/?page=auth");
        }
        
            /* Закрытие выражения */ 
            $select->close(); 
        } 








    }

}



setcookie('urna', $_POST, time() + 3600*7*24, '/');