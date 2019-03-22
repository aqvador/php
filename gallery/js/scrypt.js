function d(delete_id, file){
	$('#delete' + delete_id).remove();
	$('#see' + delete_id).remove();
	$('#summ' + delete_id).remove();
	$('#' + delete_id).remove();
  
	function wTo0(selector, duration, callback) {
		console.log(selector + Date() + '  wTo0');
		selector = $(selector);
		if (selector.width() == 0) {
			callback();
			return true;
		}
		selector.width(selector.width() - 250);
		setTimeout(function() {
			wTo0(selector, duration, callback);
		}, duration);
		}
	
		function hTo0(selector, duration, callback) {
			console.log(selector + duration++ + '  hTo0');
		selector = $(selector);
		if (selector.height() == 0) {
			callback();
			return true;
		}
		selector.height(selector.height() - 250);
		setTimeout(function() {
			hTo0(selector, duration, callback);
		}, duration);
		}
	
		wTo0('#div_' + delete_id, 1, function() {
			hTo0('#div_' + delete_id, 1, function() {
			$.ajax({
		method:"GET",
		url:"/gallery/delete_and_see.php?id=" + delete_id + "&file=" + file  +  "&action=delete"
		})
		.done(function(answer){
		$('#head_' + delete_id).remove();
			});
			});
		});
}
  
  
  function county(count_id){
	var contactHTML = $('#paragraff_' + count_id).html();
  var count = contactHTML.replace("&nbsp;", "");
	  var nb = contactHTML.substr(0, 4);
	  var para = contactHTML.substr(-1);
	//console.log(count + 'РС‚Рѕ Р·РЅР°С‡РµРЅРёРµ Р±Р»РѕРєР°' + count_id);
	$('#paragraff_' + count_id).css("opacity", "0");
	if (count < 9) {
	  $('#summ' + count_id).css("left", "30px");
	} else {
	  $('#summ' + count_id).css("left", "25px");
	}
  
	$.ajax({
		method:"GET",
		url:"/gallery/delete_and_see.php?id=" + count_id  +  "&action=count"
	  })
	  .done(function(answer){
  
		$('#paragraff_' + count_id).text(answer);
		$('.see').attr('style', '');
		$('#paragraff_' + count_id).css("opacity", "1");
		$('#summ' + count_id).css("opacity", "1");
		$('#see' + count_id).css("opacity", "1");
		console.log(answer);
  
  
  
		  });
    }
    
    function go() {
        var poem = 'Ночь, улица, фонарь, !!! аптека,* Бессмысленный и тусклый свет.* Живи еще !!! хоть четверть века -* Все будет так. Исхода !!! нет.* Умрешь - начнешь опять сначала* И повторится !!! все, как встарь:* Ночь, ледяная !!! рябь канала,* Аптека, улица, !!! фонарь.*';
        poem = poem.replace(/!!!/g, ' ');
        var arr = poem.split('*');
        for (var i = 0; i < arr.length; i++) {
          setTimeout((function(index){ 
            return function() {
              console.log(index + ": " + arr[index])
            };
          })(i), 1000 * (i + 1))
        }
      }
      
			//go();
			
