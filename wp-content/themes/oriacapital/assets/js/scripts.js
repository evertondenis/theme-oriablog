var nextidea = (function() {
	function init(){
		menu();
		showMenu();
	}

	function menu() {
		jQuery('ul.menu li.dropdown, ul.menu li.dropdown-submenu').hover(function() {
			jQuery(this).find('.dropdown-toggle').attr("aria-expanded","true");
			jQuery(this).find(' > .dropdown-menu').stop(true, true).delay(50).fadeIn();
		}, function() {
			jQuery(this).find('.dropdown-toggle').attr("aria-expanded","false");
			jQuery(this).find(' > .dropdown-menu').stop(true, true).delay(50).fadeOut();
		});

		jQuery(".menu-menu-principal-container ul").append('<li class="linkedin"><a href="https://br.linkedin.com/in/oria-gest%C3%A3o-de-recursos-603a82124">Siga no Linkedin&nbsp;&nbsp;<i class="fa fa-linkedin" aria-hidden="true"></i></a></li>');
	}

	function showMenu(){
		jQuery('.c-hamburger').on('click', function(){
			(this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
			jQuery('.menu').toggleClass('is-active');
		});
	}

	return {
		init: init
	}

}());

(function(){
	nextidea.init();
}());