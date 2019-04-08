var $select = $('select');
$select.click(function(){
    var $this = $(this);
    var status = $this.val();
   var id = $(this).attr('id');
   $.ajax({
    url: 'ajax.php',
    type: 'POST',
    dataType: 'json',
    data: {edit_status_orders: 'edit_status', id_status: id, status_name: status},
    success: function (data) {
        if(data.answ === true) {
            if(status == 'close' || status == 'cancel')
            $("#admin_" + data.id).slideUp(800, "linear", function(){
                $('#admin_' + data.id).remove();
                  });
        }
       
           

    }
});


})
