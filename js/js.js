

function calcularot(id_link) {
   //$('#select').removeClass("calcularot2")
   //$('#'+ id_link).addClass("calcularot2")
   $('.calcularot2').toggleClass('calcularot2 calcularot');
   $('#'+ id_link).toggleClass('calcularot calcularot2');
    var a = parseInt($("#texta").val());
    var b = parseInt($("#textb").val());
    $("#textb").val(b);
    $("#texta").val(a);

    switch (id_link) {
        case 'stack':
        $("#value_calc").html('+');
        break;

        case 'subtract':
        $("#value_calc").html('-');
        break;

        case 'multiply':
        $("#value_calc").html('*');
        break;

        case 'divide':
        $("#value_calc").html('/');
        break;
    }
    
}

function country(id) {
    var a = parseInt($("#texta").val());
    var b = parseInt($("#textb").val());
    if(isNaN(b)) {
        b = '';
    }
var variable = $(".calcularot2").attr("id");
calcularot(variable);
$.ajax({
    method:"GET",
    url:"/calc.php?a=" + a + "&b=" + b  +  "&o=" + variable
    })
    .done(function(answer){
        
$('#result').html(answer);


});

}


