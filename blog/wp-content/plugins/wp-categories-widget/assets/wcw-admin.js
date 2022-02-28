/* Custom Share Buttons With Floting Sidebar admin js*/
jQuery(document).ready(function(){
	    jQuery(".wcw-tab").hide();
		jQuery("#div-wcw-general").show();
	    jQuery(".wcw-tab-links").click(function(){
		var divid=jQuery(this).attr("id");
		jQuery(".wcw-tab-links").removeClass("active");
		jQuery(".wcw-tab").hide();
		jQuery("#"+divid).addClass("active");
		jQuery("#div-"+divid).fadeIn();
		});
})( jQuery );
