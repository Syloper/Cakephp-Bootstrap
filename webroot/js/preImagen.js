(function ($) {
	$.extend({
		preImagen : function (o){
			var config = $.extend({
				input 	: "",
				preDiv 	: "",
				imgDiv 	: "",
				infDiv	: "" 
			}, o);

		    if (window.File && window.FileList && window.FileReader) {
		    	if(typeof($(o.input)) && $(o.input) !== null){
		    		var i = $(o.input), p = $(o.input).parent();
		    		$(i).on('change', function(){
		    			p.find('div').remove();
		    			var f = event.target.files;
		    			if(f.length > 0){
		    				var f = f[0], output = [], r = new FileReader();

		    				r.onloadend = function(event) {
	    					var fc = event.target;
		    					if(typeof($(o.imgDiv)) && $(o.imgDiv) !== null){
		    						$(o.imgDiv).css({'background' : 'url('+fc.result+')no-repeat center center / cover'});
				    				output.push('<strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
					                  f.size, ' bytes, last modified: ',
					                  f.lastModifiedDate.toLocaleDateString(), '');

		    						if(typeof($(o.infDiv)) && $(o.infDiv) !== null){
		    							$(o.infDiv).html('').html(output.join(''));
		    						}else{
				    					p.append('<div style="float:left;">' + output.join('') + '</div>');
		    						}
				    			}else{
			    					p.append('<div style=" float:left; background:url('+fc.result+')no-repeat center center / cover; width:200px; height:120px;"></div>');
				    			}
		    				};

		    				r.readAsDataURL(f);

		    			}
		    		});
		    	}
		    }
		}

	});
})(jQuery);