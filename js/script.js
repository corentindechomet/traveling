$(document).ready(function(){
	$(document).on("click", ".card", function (e) {
		var id = $(this).attr("target-url");
	    $.ajax({  
	        type: "GET",
	        url: "getOeuvre.php?id="+id,             
	        dataType: "html",                
	        success: function(response){                    
	            $(".bottomPart-content").html(response); 
	        }
	    });		
      openNav();
	});
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

