
function d(delete_id, file){
	$('#delete' + delete_id).remove();
	$('#see' + delete_id).remove();
	$('#summ' + delete_id).remove();
	$('#' + delete_id).remove();

	for (widthset = $('#div_' + delete_id).width(); widthset >= 0 ; widthset--) {
		$('#div_' + delete_id).css("width", widthset);
	}

	for (hei = $('#div_' + delete_id).width(); hei >= 0 ; hei--) {
		$('#div_' + delete_id).css("height", hei);
	}
	$.ajax({
			method:"GET",
			url:"/delete_and_see.php?id=" + delete_id + "&file=" + file  +  "&action=delete"
		})
		.done(function(answer){
			$('#head_' + delete_id).remove();
        });
	}
function county(count_id){	
	var contactHTML = $('#paragraff_' + count_id).html();
var count = contactHTML.replace("&nbsp;", ""); 
		var nb = contactHTML.substr(0, 4);
		var para = contactHTML.substr(-1);
	//console.log(count + 'Это значение блока' + count_id);
	$('#paragraff_' + count_id).css("opacity", "0");
	if (count < 9) {
		$('#summ' + count_id).css("left", "30px");
	} else {
		$('#summ' + count_id).css("left", "25px");
	}
	
	$.ajax({
			method:"GET",
			url:"/delete_and_see.php?id=" + count_id  +  "&action=count"
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