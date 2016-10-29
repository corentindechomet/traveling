$(document).ready(function(){
	var sceneCpt = 0;
	var sceneMax = 0;

	$(document).on("click", ".card.overlay", function (e) {
		var id = $(this).attr("target-url");
		var sceneCpt = 0;
		var sceneMax = 0;
		$(".navbar").css("display", "none");
		$("body").css("overflow-y", "hidden");
		$.ajax({  
			type: "GET",
			url: "travelingAPI.php?call=oeuvre&id="+id,             
			dataType: "json",                
			success: function(response){       
				var sceneMax = response.length;
				$("body").css("overflow-y", "hidden");
				$(".topPartContent").html("<div class='col-md-6 filmImg hidden-sm hidden-xs'><a href='javascript:void(0)' class='closebtn' onclick='closeOverlay()''>X</a><div class='imageOeuvre'><h1>"+response[0].titreOeuvre+"</h1></div></div><div class='col-md-6 sceneTitle'><div class='dynamicContent'><div class='contentContainer'><div class='row'><div class='col-md-2'><i class='fa fa-arrow-left changeScene' aria-hidden='true' target-type='previous' target-url='"+response[sceneCpt].idOeuvre+"'></i></div><div class='col-md-8'><h3 class='nomScene'>"+response[0].nomScene+"</h3></div><div class='col-md-2'><i class='fa fa-arrow-right changeScene' aria-hidden='true' target-type='next' target-url='"+response[sceneCpt].idOeuvre+"'></i></div></div><div id='carousel-vertical' class='carousel vertical slide'><div class='carousel-inner' role='listbox'><div class='item active'><div class='row'><div class='col-md-8 col-md-offset-2'><img class='descriptionBloc imgScene' src='"+response[0].urlImgScene+"' alt=''/></div></div></div><div class='item'><div class='row'><div class='col-md-8 col-md-offset-2'><div class='descriptionBloc text'><p>"+response[0].description+"</p></div></div></div></div></div></div></div></div>"); 
				$('.imageOeuvre').css("background-image", "url('" + response[0].urlimg + "')");
				init(response[0].Lat, response[0].Lng, sceneMax);
				$(".dynamicContent").css("background-image", "url('"+ response[0].urlImgScene  +"')");
			}
		});
		openOverlay();
	});
	$(document).on("click", ".scroll", function (e) {
		$(".navbar").css("display", "none");
	});
	//google.maps.event.addDomListener(window, 'load', init);
	function init(Lat, Lng, sceneMax){
		var myLatLng = {lat:  parseFloat(Lat), lng:  parseFloat(Lng)};

                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 11,

                    // The latitude and longitude to center the map (always required)
                    center: myLatLng, // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
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

					$(".dynamicContent").html("<div class='contentContainer'><div class='row'><div class='col-md-2'><i class='fa fa-arrow-left changeScene' aria-hidden='true' target-type='previous' target-url='"+response[sceneCpt].idOeuvre+"'></i></div><div class='col-md-8'><h3 class='nomScene'>"+response[sceneCpt].nomScene+"</h3></div><div class='col-md-2'><i class='fa fa-arrow-right changeScene' aria-hidden='true' target-type='next' target-url='"+response[sceneCpt].idOeuvre+"'></i></div></div><div id='carousel-vertical' class='carousel vertical slide'><div class='carousel-inner' role='listbox'><div class='item active'><div class='row'><div class='col-md-8 col-md-offset-2'><img class='descriptionBloc imgScene' src='"+response[sceneCpt].urlImgScene+"' alt=''/></div></div></div><div class='item'><div class='row'><div class='col-md-8 col-md-offset-2'><div class='descriptionBloc text'><p>"+response[sceneCpt].description+"</p></div></div></div></div></div></div></div>");

					$(".dynamicContent").css("background-image", "url('"+ response[sceneCpt].urlImgScene  +"')");
				}
			});
		});
	}
});

var figure = $(".video").hover( hoverVideo, hideVideo );

function hoverVideo(e) {  
	$('video', this).get(0).play(); 
}

function hideVideo(e) {
	$('video', this).get(0).pause(); 
}

function openOverlay(){
	document.getElementById("myNavTop").style.height = "50%";
	document.getElementById("myNavBottom").style.height = "50%";
}

function closeOverlay(){
	$(".navbar").css("display", "none");
	document.getElementById("myNavTop").style.height = "0%";
	document.getElementById("myNavBottom").style.height = "0%";
}

