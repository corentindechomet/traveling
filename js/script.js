$(document).ready(function(){
	var sceneCpt = 0;
	var sceneMax = 0;

	$('#preloaderContainer').delay(200).fadeOut("1000");

/*	$('.navbar-right').click(function(){
		$('#preloaderContainer').show();
	});

	$('.navbar-header').click(function(){
		$('#preloaderContainer').show();
	});*/

	$('#searchByFilms').click(function() {
		$("input[name='searchFilm']").focus();
	});

	$('#searchByLocation').click(function() {
		$("input[name='searchLocation']").focus();
	});

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

	// Requête AJAX films
	$(document).on("click", ".card.overlay.oeuvre", function (e) {
		if($(this).attr("target-type") == "random"){
			var url = "travelingAPI.php?call=randomOeuvre";
		}
		else{
			var id = $(this).attr("target-url");
			var url = "travelingAPI.php?call=oeuvre&id="+id;
		}
		var sceneCpt = 0;
		var sceneMax = 0;
		$.ajax({  
			type: "GET",
			url: url,             
			dataType: "json",                
			success: function(response){
				var sceneMax = response.length;
				$(".topPartContent").html("<div class='col-md-6 col-sm-6 cold-xs-6 filmImg' onclick='closeOverlay()'><a href='javascript:void(0)' class='closebtn' onclick='closeOverlay()''>X</a><div class='imageOeuvre'><h1>"+response[0].titreOeuvre+"</h1></div></div><div class='col-md-6 col-sm-6 cold-xs-6 sceneDescription'><div class='dynamicContent'><div class='contentContainer'><div class='row'><div class='col-md-2'><i class='fa fa-arrow-left changeScene' aria-hidden='true' target-type='previous' target-url='"+response[sceneCpt].idOeuvre+"'></i></div><div class='col-md-8'><h3 class='nomScene'>"+response[0].nomScene+"</h3></div><div class='col-md-2'><i class='fa fa-arrow-right changeScene' aria-hidden='true' target-type='next' target-url='"+response[sceneCpt].idOeuvre+"'></i></div></div><div id='carousel-vertical' class='carousel vertical slide'><div class='carousel-inner' role='listbox'><div class='item active'><div class='row'><div class='col-md-8 col-md-offset-2'><div class='descriptionBloc text'><p>"+response[0].description+"</p></div></div></div></div><div class='item'><div class='row'><div class='col-md-8 col-md-offset-2'><div class='descriptionBloc text'><p>"+response[0].description+"</p></div></div></div></div></div></div></div></div>"); 
				$('.imageOeuvre').css("background-image", "url('" + response[0].urlimg + "')");
				init(response[0].Lat, response[0].Lng, sceneMax);
				$(".dynamicContent").css("background-image", "url('"+ response[0].urlImgScene  +"')");
				setTimeout(function() {
					$( "#myNavTop .filmImg" )
					.mouseenter(function() {
						$(".imageOeuvre h1").html("Click to go back");
					})
					.mouseleave(function() {
						$(".imageOeuvre h1").html(response[0].titreOeuvre);
					});
				}, 2500);
			}
		});
		openOverlay();
	});

	$(document).on("click", ".card.overlay.lieu", function (e) {
		var id = $(this).attr("target-url");
		var sceneCpt = 0;
		var sceneMax = 0;
		$.ajax({  
			type: "GET",
			url: "travelingAPI.php?call=lieu&id="+id,             
			dataType: "json",                
			success: function(response){
				var sceneMax = response.length;
				$(".topPartContent").html("<div class='col-md-6 col-sm-6 cold-xs-6 filmImg' onclick='closeOverlay()'><a href='javascript:void(0)' class='closebtn' onclick='closeOverlay()''>X</a><div class='imageOeuvre'><h1>"+response[0].nomLieu+"</h1></div></div><div class='col-md-6 col-sm-6 cold-xs-6 sceneDescription'><div class='dynamicContent'><div class='contentContainer'><div class='row'><div class='col-md-2'><i class='fa fa-arrow-left changeScene' aria-hidden='true' target-type='previous' target-url='"+response[sceneCpt].idLieu+"'></i></div><div class='col-md-8'><h3 class='nomScene'>"+response[0].nomScene+"</h3></div><div class='col-md-2'><i class='fa fa-arrow-right changeScene' aria-hidden='true' target-type='next' target-url='"+response[sceneCpt].idLieu+"'></i></div></div></div></div>"); 
				$('.imageOeuvre').css("background-image", "url('" + response[0].urlImgLieu + "')");
				init(response[0].Lat, response[0].Lng, sceneMax);
				$(".dynamicContent").css("background-image", "url('"+ response[0].urlImgScene  +"')");
				setTimeout(function() {
					$( "#myNavTop .filmImg" )
					.mouseenter(function() {
						$(".imageOeuvre h1").html("Click to go back");
					})
					.mouseleave(function() {
						$(".imageOeuvre h1").html(response[0].nomLieu);
					});
				}, 2500);
			}
		});
		openOverlay();
	});

	//google.maps.event.addDomListener(window, 'load', init);
	function init(Lat, Lng, sceneMax){
		var myLatLng = {lat:  parseFloat(Lat), lng:  parseFloat(Lng)};

		var mapOptions = {

			zoom: 11,

			center: myLatLng,

			styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
		};

		var mapElement = document.getElementById('map');
		var map = new google.maps.Map(mapElement, mapOptions);

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Hello World!'
		});

		$(document).on("click", ".changeScene", function (e) {

			var type = $(this).attr("target-type");
			if(type == 'previous')
				sceneCpt -= 1;
			else if(type == 'next')
				sceneCpt += 1;

			if (sceneCpt > sceneMax-1)
				sceneCpt = 0;
			else if (sceneCpt < 0)
				sceneCpt = sceneMax-1;
			var id = $(this).attr("target-url");
			$.ajax({  
				type: "GET",
				url: "travelingAPI.php?call=oeuvre&id="+id,             
				dataType: "json",                
				success: function(response){             
					marker.setPosition(new google.maps.LatLng(response[sceneCpt].Lat, response[sceneCpt].Lng));
					map.panTo(marker.getPosition());

					google.maps.event.addDomListener(window, 'load', init);

					$(".dynamicContent").html("<div class='contentContainer'><div class='row'><div class='col-md-2'><i class='fa fa-arrow-left changeScene' aria-hidden='true' target-type='previous' target-url='"+response[sceneCpt].idOeuvre+"'></i></div><div class='col-md-8'><h3 class='nomScene'>"+response[sceneCpt].nomScene+"</h3></div><div class='col-md-2'><i class='fa fa-arrow-right changeScene' aria-hidden='true' target-type='next' target-url='"+response[sceneCpt].idOeuvre+"'></i></div></div><div id='carousel-vertical' class='carousel vertical slide'><div class='carousel-inner' role='listbox'><div class='item active'><div class='row'><div class='col-md-8 col-md-offset-2'><div class='descriptionBloc text'><p>"+response[sceneCpt].description+"</p></div></div></div></div><div class='item'><div class='row'><div class='col-md-8 col-md-offset-2'><div class='descriptionBloc text'><p>"+response[sceneCpt].description+"</p></div></div></div></div></div></div></div>");

					$(".dynamicContent").css("background-image", "url('"+ response[sceneCpt].urlImgScene  +"')");
				}
			});
		});
	}
	var figure = $(".video").hover( hoverVideo, hideVideo );
});


function hoverVideo(e) {  
	$('video', this).get(0).play(); 
}

function hideVideo(e) {
	$('video', this).get(0).pause(); 
}

function openOverlay(){
	$("body").css("overflow-y", "hidden");
	$(".navbar").css("display", "none");
	document.getElementById("myNavTop").style.height = "50%";
	document.getElementById("myNavBottom").style.height = "50%";
}

function closeOverlay(){
	$("body").css("overflow-y", "visible");
	document.getElementById("myNavTop").style.height = "0%";
	document.getElementById("myNavBottom").style.height = "0%";
	$(".navbar").css("display", "inline-block");
}