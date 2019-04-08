<body style="background-color: #ebf4ee">
<?php

if($_SESSION['registry'] == 'yes') {
  echo '<p>Отлично' . $_COOKIE['name'] . '</p>';
  echo '<p>Теперь необходимо авторизоваться:</p>';
  $_SESSION['registry'] = '';

}
if($_SESSION['auth'] != '') {
  $_SESSION['auth'] = '';
  header("Location: http://lesson_8.geekbrains.club/?page=auth");
}

?>
  <div class="form">
    <ul class="tab-group">
      <li class="tab active"><a href="#login">Вход</a></li>
      <li class="tab "><a href="#signup">Регистрация</a></li>
    </ul>
    <div class="tab-content">
      <div id="login">
        <h1>Добро пожаловать</h1>
        <form action="auth/valid_auth.php" method="post">
          <div class="field-wrap">
            <label>
              Ваш логин/email<span class="req">*</span>
            </label>
            <input type="email"  name="auth_mail"  equired autocomplete="off"  id="auth_login">
          </div>
          <div class="field-wrap">
            <label>
              Ваш пароль<span class="req">*</span>
            </label>
            <input type="password"  name="auth_pass"  required autocomplete="off" id="auth_pass">
          </div>
          <button type="submit" name="type_auth" value="auht_form"  class="button button-block" >вперед</button>
        </form>
      </div>
      <div id="signup">
        <h1>Зарегистрируйтесь</h1>
        <form action="auth/valid_auth.php" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Имя<span class="req">*</span>
              </label>
              <input type="text" name="reg_name" required autocomplete="off" id="reg_name">
            </div>
            <div class="field-wrap">
              <label>
                Фамилия<span class="req">*</span>
              </label>
              <input type="text"  id="reg_last_name" name="reg_last_name" required autocomplete="off">
            </div>
          </div>
          <div class="field-wrap">
            <label>
              Телефон<span class="req">*</span>
            </label>
            <input type="number" value="<?=$_COOKIE['number']?>" required autocomplete="off" name="reg_phone"  id="reg_phone">
          </div>
          <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email" value="<?=$_COOKIE['login']?>" required autocomplete="off" name="reg_email"  id="reg_email">
          </div>
         
          <div class="field-wrap">
            <label>
              Пароль<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off"   name="reg_pass" id="reg_pass">
          </div>
          <button type="submit" name="type_auth" value="registry_form"  class="button button-block" >Вперед</button>
        </form>
      </div>
    </div><!-- tab-content -->
  </div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="auth/js/index.js"></script>