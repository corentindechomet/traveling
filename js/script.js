$(document).ready(function(){
	var sceneCpt = 0;
	var sceneMax = 0;

	/* PRELOADER */
	$(window).bind("load", function() {
		$('#preloaderContainer').fadeOut("1000");
	});

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

	/* REPONSIVE */
	var transparentwidth = $('.transparent').width();
	if(transparentwidth < 240)
		$('.outlineText').css("font-size", "58px");
	else
		$('.outlineText').css("font-size", "75px");

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
		var sceneCpt = 0;
		var sceneMax = 0;
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
				$(".fa-arrow-left.changeSceneOeuvre").attr( "target-url", response[sceneCpt].idOeuvre);
				$(".fa-arrow-right.changeSceneOeuvre").attr( "target-url", response[sceneCpt].idOeuvre);
				$("a.mapLink").attr( "href", "http://maps.google.com/maps/dir//"+response[0].Lat+","+response[0].Lng+"");

				$('.imageOeuvre').css("background-image", "url('" + response[0].urlimg + "')");
				init(response[0].Lat, response[0].Lng, sceneMax);
				$(".dynamicContent").css("background-image", "url('"+ response[0].urlImgScene  +"')");
				setTimeout(function() {
					$( "#myNavTop .filmImg" )
					.mouseenter(function() {
						$(".imageOeuvre h1").html("Cliquez pour revenir");
					})
					.mouseleave(function() {
						$(".imageOeuvre h1").html(response[0].titreOeuvre);
					});
				}, 2500);
				/* EYE CLICK */
				$('.opacityEye').click(function() {
					if($(this).hasClass('fa-eye-slash')){
						$(".fa.fa-eye").css('color', 'rgba(255,255,255,0.7)');
						$(".changeSceneOeuvre").css('color', 'rgba(255,255,255,0.2)');
						$(".nomScene").css({
							'color': 'rgba(255,255,255,0.2)',
							'border': '1px solid rgba(255,255,255,0.2)'
						});
						$(".text").css('color', 'rgba(255,255,255,0.2)');
						$(this).attr("class", "fa fa-eye opacityEye");
					}
					else {
						$(".fa.fa-eye").css('color', 'rgba(255,255,255,1)');
						$(".changeSceneOeuvre").css('color', 'rgba(255,255,255,1)');
						$(".nomScene").css({
							'color': 'rgba(255,255,255,1)',
							'border': '1px solid rgba(255,255,255,1)'
						});
						$(".text").css('color', 'rgba(255,255,255,1)');
						$(this).attr("class", "fa fa-eye-slash opacityEye");
					}
				});
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
				/* On change la classe des i pour bien rediriger sur les lieux */
				$("i.changeSceneOeuvre").toggleClass('changeSceneOeuvre changeSceneLieu');

				$(".imageOeuvre h1").html(response[0].nomLieu);
				$(".nomScene h3").html(response[sceneCpt].nomScene);
				$(".nomScene span").html(response[0].titreOeuvre);
				$(".descriptionBloc.text").html(response[sceneCpt].description);
				$(".fa-arrow-left.changeSceneLieu").attr( "target-url", response[sceneCpt].idLieu);
				$(".fa-arrow-right.changeSceneLieu").attr( "target-url", response[sceneCpt].idLieu);
				$("a.mapLink").attr( "href", "http://maps.google.com/?q="+response[0].Lat+","+response[0].Lng+"");

				$('.imageOeuvre').css("background-image", "url('" + response[0].urlImgLieu + "')");
				init(response[0].Lat, response[0].Lng, sceneMax);
				$(".dynamicContent").css("background-image", "url('"+ response[0].urlImgScene  +"')");
				setTimeout(function() {
					$( "#myNavTop .filmImg" )
					.mouseenter(function() {
						$(".imageOeuvre h1").html("Clickez pour revenir");
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

		$(document).on("click", ".changeSceneOeuvre", function (e) {

			var type = $(this).attr("target-type");
			if(type == 'previous')
				sceneCpt--;
			else if(type == 'next')
				sceneCpt++;

			if (sceneCpt > sceneMax-1)
				sceneCpt = 0;
			else if (sceneCpt < 0)
				sceneCpt = sceneMax-1;
			var id = $(this).attr("target-url");
			console.log(sceneCpt);
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

		$(document).on("click", ".changeSceneLieu", function (e) {
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
}

$( window ).resize(function() {
	var open = $(".topPart").attr("target-state");
	console.log(open);
	if (($( window ).width() < 800) && open == 1 ) {
		$(".changeSceneOeuvre").css("font-size", "3em");
		$(".changeSceneLieu").css("font-size", "3em");
		document.getElementById("myNavTop").style.height = "70%";
		document.getElementById("myNavBottom").style.height = "30%";
	}
	else if(($( window ).width() > 800) && open == 1){
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
}