$(document).ready(function () {
	$('.triggerSidebar').click(function () {
		$('.sidebar').css('right', '0px')
		$('.overlay').css('display', 'block')
	})
	var sembunyikan = function () {
		$('.overlay').css('display', 'none')
		$('.sidebar').css('right', '-400px')
	}
	$('.hideSidebar').click(sembunyikan)
	$('.overlay').click(sembunyikan)
	$(".top-slider .lazy").slick({
		dots: true,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows:false,
		
	});
});
window.onscroll = function () {
	var sticky = document.getElementById("fixmenu");
	if (self.pageYOffset > 205) {
		sticky.classList.add("mystyle2");
	}
	if (self.pageYOffset < 205) {
		sticky.classList.remove("mystyle2");
	}
}