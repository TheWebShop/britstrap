/* global jQuery:false,enquire:false*/
(function($){
	var ConditionalClass = function(breakpoint) {
		this.breakpoint = breakpoint;
		this.registerListeners();
	};
	ConditionalClass.prototype.registerListeners = function() {
		var breakpoint = this.breakpoint;
		var enquireHandler = function(breakpoint, side, isMatch) {
			return function() {
				$('[data-' + side + '-width-' + breakpoint + ']').each(function(i, el) {
					var classNames = $(el).data(side + '-width-' + breakpoint);
					$(el)[isMatch? 'addClass': 'removeClass'](classNames);
				});
			};
		};

		enquire.register('screen and (min-width: ' + breakpoint + ')', {
			match : enquireHandler(breakpoint, 'min', true),  
			unmatch : enquireHandler(breakpoint, 'min', false)
		});
		enquire.register('screen and (max-width: ' + breakpoint + ')', {
			match : enquireHandler(breakpoint, 'max', true),  
			unmatch : enquireHandler(breakpoint, 'max', false)
		});
	};

	new ConditionalClass('992px');
}(jQuery));
