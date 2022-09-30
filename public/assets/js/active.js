$(document).ready(function(){
	const activePage = window.location.pathname;
	// console.log(activePage);
	const navLinks = document.querySelectorAll('.link .nav-link').
	forEach(link => {
		if(link.href.includes(`${activePage}`)){
            // console.log(`${activePage}`)
			link.classList.add('show-navbar');

		}
	})
})