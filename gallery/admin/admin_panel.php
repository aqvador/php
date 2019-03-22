
<?php
if (isset($_SESSION['nick'])) {

    echo 'Hi, ' . $_SESSION['name'] . '<br>';
  
    unset($_SESSION['nick']);
  
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-86400, '/'); // содержимое сессии - пустая строка
    }
                      // setcookie сработает безошибочно, так как мы только сейчас
    ob_end_flush();   // отправили браузеру вывод
  
    session_destroy();
}
?>