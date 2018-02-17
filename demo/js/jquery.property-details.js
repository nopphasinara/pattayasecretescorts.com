$(document).ready(function(){
	
	$(".viewgallery").fancybox({
		beforeShow : function() {
			$('.fancybox-overlay').css({'background-color' :'#000'});
		},
		padding: 0,
		prevEffect : 'fade',
		nextEffect : 'fade',
		nextClick : true,
		openEffect : 'fade',
		openSpeed  : 'fast',
		closeEffect : 'fade',
		closeSpeed  : 'fast',
		helpers : {
			thumbs : {
				width  : 80,
				height : 60
			}
		}
	});
		
});