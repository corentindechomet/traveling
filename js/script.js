$(document).ready(function(){
	$(document).on("click", ".card.overlay", function (e) {
		var id = $(this).attr("target-url");
		$.ajax({  
			type: "GET",
			url: "travelingAPI.php?call=oeuvre&id="+id,             
			dataType: "json",                
			success: function(response){             
				//alert(response[0].description);     
				$(".topPartContent").html("<div class='col-md-6 noPadding'><div class='imageOeuvre'><h1>"+response[0].titreOeuvre+"</h1></div></div><div class='col-md-6 noPadding'>"+response[0].description+"<a href='javascript:void(0)' class='closebtn' onclick='closeNav()''>X</a></div>"); 
				$('.imageOeuvre').css("background-image", "url('" + response[0].urlimg + "')");
			}
		});		
		openNav();
	});
	
	google.maps.event.addDomListener(window, 'load', init);
	function init(){
		var myLatLng = {lat: -25.363, lng: 131.044};

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: myLatLng
		});

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Hello World!'
		});
		$(document).on("click", ".topPartContent", function (e) {

			marker.setPosition(new google.maps.LatLng(48.8712947, 2.3199734));
			map.panTo(marker.getPosition());

			google.maps.event.addDomListener(window, 'load', initialisation);
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

function openNav(){
	document.getElementById("myNavTop").style.height = "50%";
	document.getElementById("myNavBottom").style.height = "50%";
}

function closeNav(){
	document.getElementById("myNavTop").style.height = "0%";
	document.getElementById("myNavBottom").style.height = "0%";
}

