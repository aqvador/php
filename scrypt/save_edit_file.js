function saveeditgoor(id) {
    $('#editgoods_' + id).css('background', '#45b330a6');
    var status = $('#edit_show_'+ id).html();
    var bgc = '#4c55c942';
    if(status == 'Показать') {
    bgc = '#ec393954';
    }
    var param = {editgood: 'yes_to_one'};
    param.editid = id;
    param.editname = $('#editparams_' + id + ' .editname' + ' input').val();
    param.editprice = $('#editparams_' + id + ' .editprice' + ' input').val();
    param.editdiscr = $('#editparams_' + id + ' .editdiscr' + ' input').val();
    param.full_discr = $('#editparams_' + id + ' .full_discr' + ' textarea').val();
    param.editsize = $('#editparams_' + id + ' .editsize' + ' input').val();
    param.nowphoto = $('#img_id_' + id).attr('src');
    param.newphoto = $('#add_ajax_img' + id).attr('src');
    param.show = status;

    var photo = $('#add_ajax_p' + id).html();
    param.photo = {add: 'no'};
    if (photo == 'Новое фото:') {
        param.photo = {add: 'yes'};
        param.photo.src = $('#add_ajax_img' + id).attr('src');
    }
    
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'json',
        data:param,
        success: function (data) {
           // console.log(param);
          //  console.log(data);
            if(data.up_photo == 'yes') {
            $('#editgoods_'+ id + '> .editphoto > .editphotoupload').empty();
            $('#editgoods_'+ id + '> .editphoto > .editphotoupload').css("opacity", 0);
            setTimeout(function() { 
                $('#editgoods_'+ id + '> .editphoto > .editphotoupload').css("opacity", 1);
                $('#editgoods_'+ id + '> .editphoto > .editphotoupload').append("<p>Текущее фото:<p>");
                $('#editgoods_'+ id + '> .editphoto > .editphotoupload').append('<img src="catalog/catalog_img/' + data.fname + '" alt="основное фото" id="img_id_' + id + '">');
            }, 1000);
            }
            setTimeout(function() { $('#editgoods_' + id).css('background', bgc); }, 500);
        }
    });
}

function edit_show(id, status) {
    var st = status == 'Y' ? 'N' : 'Y';
    var bcg = status == 'Y' ? '#ec393954' : '#4c55c942';
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {id_show_edit:id, status_show:status},
        success: function (data) {
            $('#editgoods_' + id + ' > .saveeditgood > .edit_show').html(data);
            $('#editgoods_' + id + ' > .saveeditgood > .edit_show').attr('onclick', 'edit_show('+id+', \''+st+'\')');
            $('#editgoods_' + id).css('background', bcg);
            // console.log(data);
        }
    });
}

function add_good() {
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {add_good: 'new_good_add'},
        success: function (data) {
        $('.add_gud_but').after(data.block);
        $("#editgoods_" + data.id).slideDown(800, "linear");
            $.getScript('scrypt/upload.js');
        }
    });
}

function cancel_adding(id) {
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {cancel_good: 'new_good_cancel', cancel_good_id: id},
        success: function (data) {
// console.log(data);
            if(data === true) {

                $("#editgoods_" + id).slideUp(800, "linear", function(){
                $('#editgoods_' + id).remove();
                  });

           
            }
            $.getScript('scrypt/upload.js');
        }
    });

}