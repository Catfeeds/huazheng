$(document).ready(function() {
	(function(){
		var $html=$('html');
		var $window=$(window);
		var $body=$("body");
		var psdsize=640;
		var htmlfont=$body.width()/psdsize*100+'px';
		$html.css('font-size',htmlfont);
		$body.css('opacity',1);
		$window.resize(function () {
				htmlfont=$body.width()/psdsize*100+'px';
				$html.css('font-size',htmlfont)
		});
	})();
	$(".slideMask").on('touchmove',function(e){
        e.stopPropagation();
    },false);
    $(".slideMask").click(function(){
        $(".slideMask").removeClass('slActive')
    });
    $(".sliShow").click(function(){
        $(".slideMask").addClass('slActive')
    });
    $(".slideNav").click(function(e){
        e.stopPropagation();
    });
    $('.sliHea i').click(function(){
        $(".slideMask").removeClass('slActive')
    });


    
});