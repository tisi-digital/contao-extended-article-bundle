/*
 * Sxm Extended Article
 *
 * (c) 2019 sixtmedia <info@sixtmedia.de>
 *
 * Author: Timon Sixt
 * https://www.sixtmedia.de
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

(function( $ ){

  /* Parallax Plugin */
  var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(options) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
    
    var settings = $.extend({
        // Default Werte
        xpos: "50%",
        speedFactor: 0.1,
        outerHeight: true
    }, options );    

		// Die Startposition jedes Elements auslesen, das den Parallax Effekt bekommen soll
    $this.each(function(){
      firstTop = $this.offset().top;
    });

    // OuterHeight Funktion verwenden oder nicht 
		if (settings.outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}
			
		// Funktion aufrufen, wenn das Fenster gescrollt oder in der Größe verändert wird
		function update(){
			var pos = $window.scrollTop();				

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Prüfen, ob das Element komplett über oder unter dem Viewport ist
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', settings.xpos + " " + Math.round((firstTop - pos) * settings.speedFactor) + "px");
			});
		}		

		$window.bind('scroll', update).resize(update);
		update();
	};
  
  /* Fullsize Plugin*/

  $.fn.sizeContent = function(dataOffset) {

    var $this = $(this);
    var totalOffset = 0;

    totalOffset = getOffset(dataOffset);

    var htmlHeight = $( window ).height();
    var newHeight = (htmlHeight - totalOffset) + "px";

    $this.css("min-height", newHeight); 

  };

  $.fn.addFullsizeScroller = function(fullsizeScrollerColor) {

    var $this = $(this);

    if (fullsizeScrollerColor === null) {
      fullsizeScrollerColor = '';
    }

    $this.append( $( '<div class="fullsizeScroller ' + fullsizeScrollerColor + '"></div>' ) );
  };

  $.fn.scrollBeyondFullsize = function(anchor, dataOffset) {

    var $this = $(this);
    var top = $(anchor).offset().top 
    var objHeight = $(anchor).height();
    var offsetHeight = getOffset(dataOffset);

    $('html, body').animate({scrollTop: top + objHeight - offsetHeight + 'px'}, 400);

    return false;
  };

  function getOffset(dataOffset) {

    var totalOffset = 0;

    if(dataOffset){
      var arrOffset = dataOffset.split('|');

      arrOffset = jQuery.grep(arrOffset, function(n, i){ // remove all empty values from array
        return (n !== "" && n != null);
      });
      
      $.each(arrOffset, function(u, i) {
              totalOffset += $(i).height();
      });
    } else {
      totalOffset = 0;
    }

    return totalOffset;
  }

})(jQuery);