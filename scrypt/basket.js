function add_del(id, oper, price) {
    $(".sasisaful").css('opacity', 1);
  var num = parseInt($(".pcs_content").text());
  var price = $('#good_id_'+id).text();
  var countid = parseInt($('#count_' + id).val());
  
 
  //alert(oper);
  switch (oper) {
      case 'plus':
      $('#count_' + id).val(countid +1);
      $(".pcs_content").text(num +1);
      setTimeout(function() { $(".sasisaful").css('opacity', 0); }, 2000);
        
          break;
        case 'minus':
        if(countid != 1) {
        $('#count_' + id).val(countid -1);
        $(".pcs_content").text(num -1);
      setTimeout(function() { $(".sasisaful").css('opacity', 0); }, 2000);
        }
          break;
  }
  if(countid != 1 || oper == 'plus') {
  $.ajax({
    type: 'post',
    url: 'ajax.php', // без http:// и домена
    dataType: 'json',
    data: {id_production:id, oper_operation:oper},
    success: function(data) {
   // console.log(data.sum);
    $('.total_price p').text('Итого: ₽ ' +data.total);
    $('#summ_id_' + id).text(' ₽ ' +data.sum);

        }
    });
  }
}

function delete_goods(id) {
    $.ajax({
    type: 'post',
    url: 'ajax.php', // без http:// и домена
    dataType: 'json',
    data: {delete_id:id},
    success: function(data) {
   if(data.answer == 'ok') {
    $('#block_goods'+data.id).css('opacity', 0);
    $('.total_price p').text('Итого: ₽ ' +data.total);
    $(".pcs_content").text(data.count_basket);
    setTimeout(function() { $('#block_goods'+data.id).remove(); }, 2000);
    //alert('ok');
            }
        }
    });
}

(function(){
        isUpdatingBlur=false,
        updateBlurStopTimeout=null,
        multiplier=0.25
    ;
        
	$.fn.toggleBlur=function(v){
		var blurId=$(this).data("blur-id");
		var value=v?"url(#"+blurId+")":"none";
		$(this).css({
			webkitFilter:value,
			filter:value
		});
	}
	$.fn.setBlur=function(v){
		var blur=$(this).data("blur");
		v=Math.round(v);
		if($(this).data("blur-value")!=v){
			if(v==0){
				$(this).toggleBlur(false);
			}else{
				$(this).toggleBlur(true);

				blur.firstElementChild.setAttribute("stdDeviation",v+",0");
				$(this).data("blur-value",v);
			}
		}
	}
	$.fn.initBlur=function(_multiplier){
		if(typeof _multiplier=="undefined") _multiplier=0.25;
		multiplier=_multiplier;
	}

	$.updateBlur=function(){
		$(".js-blur").each(function(){
			var pos=$(this).offset();
			$(this).data("last-pos",pos);

		})
		if(isUpdatingBlur){
			requestAnimationFrame($.updateBlur);
		}
	}
	$.startUpdatingBlur=function(stopDelay){
		if(typeof stopDelay=="undefined"){
			stopDelay=-1;
		}
		if(updateBlurStopTimeout!=null){
			clearTimeout(updateBlurStopTimeout);
			updateBlurStopTimeout=null;
		}
		if(!isUpdatingBlur){
			isUpdatingBlur=true;
			$.updateBlur();
		}
		if(stopDelay>-1){
			updateBlurStopTimeout=setTimeout($.stopUpdatingBlur,stopDelay);
		}
	}
	$.stopUpdatingBlur=function(){
		isUpdatingBlur=false;
	}
})();

// Modal Window
$(document).ready(function() {
    var $modal = $(".modal"),
        $overlay = $(".modal-overlay"),
        blocked = false,
        unblockTimeout=null
    ;

    TweenMax.set($modal,{
    	autoAlpha:0
    })

    var isOpen = false;

    function openModal() {
        if (!blocked) {
        	block(400);

            TweenMax.to($overlay, 0.3, {
                autoAlpha: 1
            });

            TweenMax.fromTo($modal, 0.5, {
                x: (-$(window).width() - $modal.width()) / 2 - 50,
                scale:0.9,
                autoAlpha:1
            }, {
                delay: 0.1,
            	rotationY:0,
            	scale:1,
            	opacity:1,
                x: 0,
                z:0,
                ease: Elastic.easeOut,
                easeParams: [0.4, 0.3],
                force3D: false
            });
        	$.startUpdatingBlur(800);
        }
    }

    function closeModal() {
    	if(!blocked){
    		block(400);
	        TweenMax.to($overlay, 0.3, {
	            delay: 0.3,
	            autoAlpha: 0
	        });
	        TweenMax.to($modal, 0.3,{
	            x: ($(window).width() + $modal.width()) / 2 + 100,
	            scale:0.9,
	            ease: Quad.easeInOut,
	            force3D: false,
	            onComplete:function(){
	            	TweenMax.set($modal,{
	            		autoAlpha:0
	            	});
	            }
	        });
	    	$.startUpdatingBlur(400);
	    }
    }
    function block(t){
    	blocked=true;
    	if(unblockTimeout!=null){
    		clearTimeout(unblockTimeout);
    		unblockTimeout=null;
    	}
    	unblockTimeout=setTimeout(unblock,t);
    }
    function unblock(){
    	blocked=false;
    }
    $(".open-modal").click(function() {
        openModal();
    })
    $(".close-modal,.modal-overlay,.input-submit").click(function() {
        closeModal();
    })

    $modal.initBlur(0.5);

})

function now_add_orders() {
	var name = $('#name').val();
	var phone = $('#phone').val();
	var email = $('#email').val();

var bgcn = name == '' ? '#f71b1b52' : '#00fff217';
var bgcp = phone == '' ? '#f71b1b52' : '#00fff217';
var bgce = email == '' ? '#f71b1b52' : '#00fff217';
$('#name').css("background", bgcn);
$('#phone').css("background", bgcp);
$('#email').css("background", bgce);
if(name == '' || phone == '' || email == '') {
	return;
}
var param = {};
param.name = name;
param.phone = phone;
param.email = email;
param.place_your_order = 'yes';
$.ajax({
    type: 'post',
    url: 'ajax.php',
    dataType: 'json',
    data: param,
    success: function(data) {
        // console.log(data);
		if(data === true) {
			alert('Спасибо ' +name+ '! Ваш заказ оформлен.');
			window.location.href = "http://lesson_8.geekbrains.club/?page=catalog";
		}

        }
    });

}