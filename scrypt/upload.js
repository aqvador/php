var files; // переменная. будет содержать данные файлов

// заполняем переменную данными, при изменении значения поля file 
$('input[type=file]').on('change', function(){
	files = this.files;
});

// обработка и отправка AJAX запроса при клике на кнопку upload_files
$('.upload_files').on( 'click', function( event ){


event.stopPropagation(); // остановка всех текущих JS событий
event.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега
var id_click =  $(this).attr("id");
// ничего не делаем если files пустой
if( typeof files == 'undefined' ) return;

// создадим объект данных формы
var data = new FormData();
// заполняем объект данных файлами в подходящем для отправки формате
$.each( files, function( key, value ){
    data.append( key, value );
});

// добавим переменную для идентификации запроса
data.append( 'my_file_upload', 1 );
data.append( 'click_id', id_click );

// AJAX запрос
$.ajax({
    url         : 'ajax.php',
    type        : 'POST', // важно!
    data        : data,
    cache       : false,
    dataType    : 'json',
    // отключаем обработку передаваемых данных, пусть передаются как есть
    processData : false,
    // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
    contentType : false, 
    // функция успешного ответа сервера
    success     : function( respond, status, jqXHR ){
       // console.log(respond);

        // ОК - файлы загружены
        if( typeof respond.error === 'undefined' ){
            // выведем пути загруженных файлов в блок '.ajax-reply'
            var files_path = respond.files;
            $('#add_ajax_p' + id_click).remove();
            $('#add_ajax_img' + id_click).remove();
           var answerp = '<p id="add_ajax_p' + id_click + '">Новое фото:</p>';
           var answerimg = '<img src="uploads/' + files_path + '" alt="Новое фото" id="add_ajax_img' + id_click + '">';
            $('#img_id_' + id_click).after( answerp +  answerimg);
        }
        // ошибка
        else {
            console.log('ОШИБКА: ' + respond.error );
        }
    },
    // функция ошибки ответа сервера
    error: function( jqXHR, status, errorThrown ){
        console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
    }

});

});