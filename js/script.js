$(document).ready(function(){
	var sceneCpt = 0;
	var sceneMax = 0;
	var contribSceneCpt = 1;

	/* Contact select option */
	$('select[name="select1"]').change(function() {
		console.log($(this).val());
		if($(this).val() == "film")
			$('.selectReceiver').show();
		if($(this).val() == "serie")
			$('.selectReceiver').show();	
		if($(this).val() == "lieu")
			$('.selectReceiver').hide();
	})

	$('.addScene').click(function(){
		if (contribSceneCpt < 3)
			contribSceneCpt++;
		$('.scene'+contribSceneCpt).show();
		$(".deleteScene").show();
		if (contribSceneCpt == 3)
			$(".addScene").hide();
	});

	$('.deleteScene').click(function(){
		if (contribSceneCpt > 1) {
			$('.scene'+contribSceneCpt).hide();
			contribSceneCpt--;
		}
		if (contribSceneCpt == 1)
			$(".deleteScene").hide();
		if (contribSceneCpt < 3)
			$(".addScene").show();
	});

	/* Gestion affichage vidéo ou image accueil -- voir suite à la fin du fichier*/
	if (($( window ).width() < 1087)) {
		$("#video").hide();
		$(".thevideo").hide();
	}
	/*	$('.navbar-right').click(function(){
		$('#preloaderContainer').show();
	});

	$('.navbar-header').click(function(){
		$('#preloaderContainer').show();
	});*/

	/* Effets scrollmagic */


	/* menu background */
	var controller = new ScrollMagic.Controller();

	var scene = new ScrollMagic.Scene({
		offset: 400
	})
	.setTween("nav", 0.2, {backgroundColor: "#282828"})
	.setClassToggle('nav', 'backgroundNav')
	.addTo(controller);

	/* font size */
	var controller2 = new ScrollMagic.Controller();

	var scene = new ScrollMagic.Scene({
		offset: 400
	})
	.setTween(".navbar-brand, .navbar-default .navbar-nav>li>a", 0.2, {fontSize: "22px"})
	.addTo(controller2);


	$('#searchByFilms').click(function() {
		$("input[name='searchFilm']").focus();
	});

	$('#searchByLocation').click(function() {
		$("input[name='searchLocation']").focus();
	});

	$('.chercherOeuvre').click(function() {
		$("input[name='searchFilm']").focus();
	});

	$('.chercherLieu').click(function() {
		$("input[name='searchLocation']").focus();
	});


	/* RESPONSIVE */

	$('.greySection').hover(
		function(){$(this).find(".sectionTitle").toggleClass('glitchyText');}
		);

	$('.whiteSection').hover(
		function(){$(this).find(".sectionTitle").toggleClass('glitchyText');}
		);


	// Requête AJAX films
	$(document).on("click", ".card.overlay.oeuvre", function (e) {
		if($(this).attr("target-type") == "random")
			var url = "travelingAPI.php?call=randomOeuvre";
		else{
			var id = $(this).attr("target-url");
			var url = "travelingAPI.php?call=oeuvre&id="+id;
		}
		sceneCpt = 0;
		sceneMax = 0;
		$.ajax({  
			type: "GET",
			url: url,             
			dataType: "json",                
			success: function(response){
				var sceneMax = response.length;
				$(".imageOeuvre h1").html(response[0].titreOeuvre);
				$(".nomScene h3").html(response[0].nomScene);
				$(".nomScene span").html(response[0].titreOeuvre);
				$(".descriptionBloc.text").html(response[0].description);
				$(".fa-arrow-left.changeSceneOeuvre").attr( "target-url", response[0].idOeuvre);
				$(".fa-arrow-right.changeSceneOeuvre").attr( "target-url", response[0].idOeuvre);
				$("a.mapLink").attr( "href", "http://maps.google.com/maps/dir//"+response[0].Lat+","+response[0].Lng+"");

				$('.imageOeuvre').css("background-image", "url('" + response[0].urlimg + "')");
				init(response[0].Lat, response[0].Lng, sceneMax);
				$(".dynamicContent").css("background-image", "url('"+ response[0].urlImgScene  +"')");
				setTimeout(function() {
					$( "#myNavTop .filmImg" )
					.mouseenter(function() {
						$(".imageOeuvre h1").html("Retour");
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
		sceneCpt = 0;
		sceneMax = 0;
		$.ajax({  
			type: "GET",
			url: "travelingAPI.php?call=lieu&id="+id,             
			dataType: "json",                
			success: function(response){
				var sceneMax = response.length;
				/* On change la classe des i pour bien rediriger sur les lieux */
				$("i.changeSceneOeuvre").toggleClass('changeSceneOeuvre changeSceneLieu');

				$(".imageOeuvre h1").html(response[0].nomLieu);
				$(".nomScene h3").html(response[0].nomScene);
				$(".nomScene span").html(response[0].titreOeuvre);
				$(".descriptionBloc.text").html(response[0].description);
				$(".fa-arrow-left.changeSceneLieu").attr( "target-url", response[0].idLieu);
				$(".fa-arrow-right.changeSceneLieu").attr( "target-url", response[0].idLieu);
				$("a.mapLink").attr( "href", "http://maps.google.com/?q="+response[0].Lat+","+response[0].Lng+"");

				$('.imageOeuvre').css("background-image", "url('" + response[0].urlImgLieu + "')");
				init(response[0].Lat, response[0].Lng, sceneMax);
				$(".dynamicContent").css("background-image", "url('"+ response[0].urlImgScene  +"')");
				setTimeout(function() {
					$( "#myNavTop .filmImg" )
					.mouseenter(function() {
						$(".imageOeuvre h1").html("Retour");
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
			title: ''
		});

		$('.changeSceneOeuvre').unbind("click").click(function(e) {
			var type = $(this).attr("target-type");
			if(type == 'previous')
				sceneCpt=sceneCpt-1;
			else if(type == 'next')
				sceneCpt=sceneCpt+1;

			if (sceneCpt > sceneMax-1)
				sceneCpt = 0;
			else if (sceneCpt < 0)
				sceneCpt = sceneMax-1;
			var id = $(this).attr("target-url");
			//alert(sceneCpt);
			$.ajax({  
				type: "GET",
				url: "travelingAPI.php?call=oeuvre&id="+id,             
				dataType: "json",                
				success: function(response){             
					marker.setPosition(new google.maps.LatLng(response[sceneCpt].Lat, response[sceneCpt].Lng));
					map.panTo(marker.getPosition());

					google.maps.event.addDomListener(window, 'load', init);
					$(".nomScene h3").html(response[sceneCpt].nomScene);
					$(".nomScene span").html(response[0].titreOeuvre);
					$(".descriptionBloc.text").html(response[sceneCpt].description);
					$(".fa-arrow-left.changeSceneOeuvre").attr( "target-url", response[sceneCpt].idOeuvre);
					$(".fa-arrow-right.changeSceneOeuvre").attr( "target-url", response[sceneCpt].idOeuvre);
					$("a.mapLink").attr( "href", "http://maps.google.com/maps/dir//"+response[sceneCpt].Lat+","+response[sceneCpt].Lng+"");

					$(".dynamicContent").css("background-image", "url('"+ response[sceneCpt].urlImgScene  +"')");
				}
			});
		});

		$('.changeSceneLieu').unbind("click").click(function(e) {
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
				url: "travelingAPI.php?call=lieu&id="+id,             
				dataType: "json",                
				success: function(response){
					marker.setPosition(new google.maps.LatLng(response[sceneCpt].Lat, response[sceneCpt].Lng));
					map.panTo(marker.getPosition());
					google.maps.event.addDomListener(window, 'load', init);

					$(".imageOeuvre h1").html(response[0].nomLieu);
					$(".nomScene h3").html(response[sceneCpt].nomScene);
					$(".nomScene span").html(response[0].titreOeuvre);
					$(".descriptionBloc.text").html(response[sceneCpt].description);
					$(".fa-arrow-left.changeSceneOeuvre").attr( "target-url", response[sceneCpt].idLieu);
					$(".fa-arrow-right.changeSceneOeuvre").attr( "target-url", response[sceneCpt].idLieu);
					$("a.mapLink").attr( "href", "http://maps.google.com/maps/dir//"+response[sceneCpt].Lat+","+response[sceneCpt].Lng+"");

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
	$(".topPart").attr( "target-state", "1");
	if ($( window ).width() < 800) {
		$(".changeSceneOeuvre").css("font-size", "3em");
		$(".changeSceneLieu").css("font-size", "3em");
		document.getElementById("myNavTop").style.height = "70%";
		document.getElementById("myNavBottom").style.height = "30%";
	}
	else{
		document.getElementById("myNavTop").style.height = "50%";
		document.getElementById("myNavBottom").style.height = "50%";
	}
};

$( window ).resize(function() {
	var open = $(".topPart").attr("target-state");
	if (($( window ).width() < 992) && open == 1 ) {
		$(".changeSceneOeuvre").css("font-size", "3em");
		$(".changeSceneLieu").css("font-size", "3em");
		document.getElementById("myNavTop").style.height = "70%";
		document.getElementById("myNavBottom").style.height = "30%";
	}
	else if(($( window ).width() > 992) && open == 1){
		$(".changeSceneOeuvre").css("font-size", "1em");
		$(".changeSceneLieu").css("font-size", "1em");
		document.getElementById("myNavTop").style.height = "50%";
		document.getElementById("myNavBottom").style.height = "50%";
	}
});

function closeOverlay(){
	$("body").css("overflow-y", "visible");
	document.getElementById("myNavTop").style.height = "0%";
	document.getElementById("myNavBottom").style.height = "0%";
	$(".navbar").css("display", "inline-block");
	$(".topPart").attr( "target-state", "0");
	sceneCpt = 0;
}

/* Gestion affichage vidéo ou image accueil */
$( window ).resize(function() {
	if (($( window ).width() < 1087)) {
		$(".homeDisplay").show();
		$("#video").hide();
		$(".thevideo").hide();
	}
	else if(($( window ).width() > 1087)){
		$("#video").show();
		$(".thevideo").show();
	}
});

/* PRELOADER */
$(window).bind("load", function() {
	$('#preloaderContainer').delay(500).fadeOut("200");
});