
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
const NewPassword = document.querySelector('#NewPassword');
const newpassword = document.querySelector('#repassword');

togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';

  password.setAttribute('type', type);
  // toggle the eye / eye slash icon
  if(type=='password'){
    this.classList.toggle('fa-eye-slash');
    this.classList.remove('fa-eye');
  }else{
    this.classList.toggle('fa-eye');
    this.classList.remove('fa-eye-slash');
  }

});

NewPassword.addEventListener('click', function (e) {
	// toggle the type attribute
	const type = newpassword.getAttribute('type') === 'password' ? 'text' : 'password';
  
	newpassword.setAttribute('type', type);
	// toggle the eye / eye slash icon
	if(type=='password'){
	  this.classList.toggle('fa-eye-slash');
	  this.classList.remove('fa-eye');
	}else{
	  this.classList.toggle('fa-eye');
	  this.classList.remove('fa-eye-slash');
	}
  
  });

$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
