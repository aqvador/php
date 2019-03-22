<?php
$disable =  ($_SESSION['name']) ? 'disabled' : '';
?>
<link rel="stylesheet" href="css/comm.css">
<div class="container">
<h2 class="your_comments">Оставьте свой след тут:</h2>
    <div class="comments">
    <form action="">
        <h4>Ваше имя:</h4> <input type="text" id="mess_name" name="name" <?=$disable?>  value="<?=$_SESSION['name']?>" maxlength="50">
        <h4>Ваш комментарий:</h4>
    <div class="textarea">
    <textarea name="message" maxlength="300" id="mess_comm" onKeyDown="limitText(this,this.form.count,300);" onKeyUp="limitText(this,this.form.count,300);"></textarea >
    символов осталось:<input readonly type="text" id="count" name="count" size="3" value="300"> 
    <div onclick="comment()" name="comment" class="submit">Отправить</div>
    </div>
    </form>
    <?php 
    require_once 'conf/config.php';
    require_once 'func/function.php';
    
    $uri = $_SERVER['REQUEST_URI'];
    $result = substr($uri, strpos($uri, '=') + 1, strlen($uri));
    if ($result == '') {
        $result = 'ttp://lesson_7.geekbrains.club/';
    }
    
    $sql = "SELECT * from comment where page = '$result' order by eventtime DESC ";
    $comm = $omysqli->query($sql);
    $h2=$comm->num_rows;
   if( $h2 == 0) {
    $t_h2 = 'Ваш комментарий будет первым!';
   }elseif($h2 == 1) {
    $t_h2 = 'Ваш комментарий(или не ваш):';
   } else {
    $t_h2 = 'Ваши комментарии:';
   }


    ?>



    <h2 class="your_comments"><?php echo $t_h2; ?></h2>
    <div class="answer_comm">

<?php


$div_com = '';
foreach ($comm as $key => $value) {
$name = $value['name'];
$text = $value['text'];
$time = substr($value['eventtime'],-8);
$date = data_rus($value['eventtime']) . 'г. в ' . $time;
if ($uri == '188.162.64.217' or $uri == '82.151.209.202') {
    $text == '<h4>Откровенность </h4> — сообщение или готовность сообщать о приватных, интимных, обычно скрываемых аспектах своей жизни';
}
$div_com .= '<div class="comm">';
$div_com .= '<p class ="name_comment">' .$name . '</p>';
$div_com .= '<p class="date_comment">' .$date. '</p>';
$div_com .= '<h5>' .$text. '</h5></div>';
}
echo $div_com;
?>



</div>

    </div>
    </div>
    <script>
    (function($) {
        $.fn.extend( {
            limiter: function(limit, elem) {
                $(this).on("keyup focus", function() {
                    setCount(this, elem);
                });
                function setCount(src, elem) {
                    var chars = src.value.length;
                    if (chars > limit) {
                        src.value = src.value.substr(0, limit);
                        chars = limit;
                    }
                    elem.html( limit - chars );
                }
                setCount($(this)[0], elem);
            }
        });
    })(jQuery);

    function limitText(limitField, limitCount, limitNum) { if (limitField.value.length > limitNum) { limitField.value = limitField.value.substring(0, limitNum); } else { limitCount.value = limitNum - limitField.value.length; } }
   
    function comment() {
        var name = $("#mess_name").val();
   
        var text = $("#mess_comm").val();
        console.log('Name: ' + name + ' comm: ' + text);
        $(".comments").css('cursor', "wait");
        $.ajax({
    method:"GET",
    url:"ajax.php?comment_form=" + text + "&name_form=" + name
    })
    .done(function(answer){
   $(".comments").css('cursor', "default");
   console.log(answer);
   $("#mess_name").val('');
   
   $("#mess_comm").val('');
   $("#count").val('300');
   $(".answer_comm").prepend(answer);
});

    }

    </script>