$(document).ready(function(){
	/* Effets scrollmagic */


	/* menu background */
	var controller = new ScrollMagic.Controller();

	var scene = new ScrollMagic.Scene({
		offset: 400
	})
	.setTween("nav", 0.2, {backgroundColor: "#282828"})
	.addTo(controller);

	/* font size */
	var controller2 = new ScrollMagic.Controller();

	var scene = new ScrollMagic.Scene({
		offset: 400
	})
	.setTween(".navbar-brand, .navbar-default .navbar-nav>li>a", 0.2, {fontSize: "22px"})
	.addTo(controller2);


	// Apparition fade-in du contenu
	var fade1Scene = new ScrollMagic.Scene({
		triggerElement: '#main',
		offset:-250,
	})
	.setClassToggle('.firstSection', 'fadeInFromLeft')
	.addTo(controller);

	var fade2Scene = new ScrollMagic.Scene({
		triggerElement: '.secondSection',
		offset:-350,
	})
	.setClassToggle('.secondSection', 'fadeInFromRight')
	.addTo(controller);

	var fade3Scene = new ScrollMagic.Scene({
		triggerElement: '.thirdSection',
		offset:-350,
	})
	.setClassToggle('.thirdSection', 'fadeInFromLeft')
	.addTo(controller);

	/* Smooth scrolling */
	var controller = new ScrollMagic.Controller({
		globalSceneOptions: {
			duration: $('section').height(),
			triggerHook: .025,
			reverse: true
		}
	});

	// On retire la taille de la barre de navigation pour scroller à la limite de la section
	var navHeight = $('nav').height();
	controller.scrollTo(function (newpos) {
		TweenMax.to(window, 0.5, {scrollTo: {y: newpos-navHeight}});
	});

	$(document).on("click", "a.arrow", function (e) {
		var id = $(this).attr("href");
		if ($(id).length > 0) {
			e.preventDefault();

			controller.scrollTo("#main");

			if (window.history && window.history.pushState) {
				history.pushState("", document.title, id);
			}
		}
	});
});