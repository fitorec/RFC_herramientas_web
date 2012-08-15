(function($){
		$.RFC = function(el, options){
				// To avoid scope issues, use 'base' instead of 'this'
				// to reference this class from internal events and functions.
				var base = this;
				// Access to jQuery and DOM versions of element
				base.$el = $(el);
				base.el = el;
				//accedemos al formulario padre
				form = $(el).parent('form');
				// Add a reverse reference to the DOM object
				base.init = function(){
						base.options = $.extend({},$.RFC.defaultOptions, options);
						// Put your initialization code here
				};
				// Sample Function, Uncomment to use
				// base.functionName = function(paramaters){
				// 
				// };
				// Run initializer
				base.init();
		};
		
		$.RFC.defaultOptions = {
				nombre: "input[name=nombre]",
				apellido_paterno: "input[name=apellido_paterno]",
				apellido_materno: "input[name=apellido_materno]",
		};
		
		$.fn.RFC = function(options){
				return this.each(function(){
						(new $.RFC(this, options));
			 // HAVE YOUR PLUGIN DO STUFF HERE
			 // END DOING STUFF
				});
		};
		
})(jQuery);
