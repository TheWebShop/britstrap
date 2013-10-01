/* global jQuery:false,enquire:false*/
(function($){
	enquire.register("screen and (min-width: 992px)", {
		match : function() {
			$('[data-max-width-screen-md]').each(function(i, el) {
				var outgoing = $(el).data('max-width-screen-md');
				$(el).removeClass(outgoing);
			});
			$('[data-min-width-screen-md]').each(function(i, el) {
				var incoming = $(el).data('min-width-screen-md');
				$(el).addClass(incoming);
			});
		},  
		unmatch : function() {
			$('[data-min-width-screen-md]').each(function(i, el) {
				var outgoing = $(el).data('min-width-screen-md');
				$(el).removeClass(outgoing);
			});
			$('[data-max-width-screen-md]').each(function(i, el) {
				var incoming = $(el).data('max-width-screen-md');
				$(el).addClass(incoming);
			});
		}
	});
}(jQuery));
