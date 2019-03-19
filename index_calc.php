
<div class="container">
<div class="calculator">
<h1>Реальный калькулятор</h1>
<form>
<div class="calc">
<a href="#" class="calcularot2" id="stack">сложить</a>
<a href="#" class="calcularot" id="subtract">вычесть</a>
<a href="#" class="calcularot" id="multiply">умножить</a>
<a href="#" class="calcularot" id="divide">разделить</a>
</div>
<div class="text_calc">
<input type="number" value="" min="0"  autofocus id="texta"> 
<div class="enjoy-css" id ="value_calc">+</div>
<input type="number" value="" min="0" id="textb">
<div class="enjoy-css" id="res" onclick="country()">&#9745;</div>
</div>
<div class="res" id="result"></div>
</form>
</div>
</div>

<script>
$(document).ready(function(){
    $('.calcularot').click(function() {
        calcularot(this.id);
    });
});
$(document).ready(function(){
    $('.calcularot2').click(function() {
        calcularot(this.id);
    });
});

</script>