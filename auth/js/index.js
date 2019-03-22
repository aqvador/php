$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});



function reg_form() {
  var regname = $('#reg_name').val();
  console.log(regname);
  
}

function auth_site() {
  var auth_login = $('#auth_login').val();
  var auth_pass = $('#auth_pass').val();
  alert(auth_login + '  ' +  auth_pass);
  someObj = {'auth_login': auth_login, 'auth_pass': auth_pass};
  $.ajax({
  type: 'post',
  url: 'ajax.php', // без http:// и домена
  dataType: 'json',
  data: someObj,
  success: function(data) {
              alert(data)
  }
});

  
}