function reset_filter(){
         jQuery('input:checkbox').each(function() {
    jQuery(this).prop('checked',false);
});
load_filter();
}
function fil_form()

		{
		    jQuery('input[name ="srch"]').val(jQuery('#srch').val());
		  //  alert(jQuery('input[name ="srch"]').val());

			var loc = '';

			jQuery('.loc_check').each(function(i, obj) {

			   if(jQuery(this).prop('checked') == true){

    loc = loc+jQuery(this).val()+',';

} 

			});
// 			alert(loc);

			jQuery('input[name ="location"]').val(loc);
			jQuery('input[name ="language"]').val(jQuery('#language').val());

			var from = '';
			var from = '';

			jQuery('.from_check').each(function(i, obj) {

			   if(jQuery(this).prop('checked') == true){

    from = from+jQuery(this).val()+',';

} 

			});

			jQuery('input[name ="from"]').val(from);

			var parea = '';

			jQuery('.parea_check').each(function(i, obj) {

			   if(jQuery(this).prop('checked') == true){

    parea = parea+jQuery(this).val()+',';

} 

			});

			jQuery('input[name ="parea"]').val(parea);

			var dist = '';

			jQuery('.dist_check').each(function(i, obj) {

			   if(jQuery(this).prop('checked') == true){

    dist = dist+jQuery(this).val()+',';

} 

			});
			var refundg = '';

			jQuery('.refundg').each(function(i, obj) {

			   if(jQuery(this).prop('checked') == true){

    refundg = refundg+jQuery(this).val()+',';

} 

			});
			var free_check = '';

			jQuery('.free_check').each(function(i, obj) {

			   if(jQuery(this).prop('checked') == true){

    free_check = free_check+jQuery(this).val()+',';

} 

			});

			jQuery('input[name ="free"]').val(free_check);
			jQuery('input[name ="dist"]').val(dist);

			if(jQuery('.fc_check').prop('checked') == true)

			jQuery('input[name ="fc_check"]').val('yes');

				else
					jQuery('input[name ="fc_check"]').val('no');
                    jQuery('input[name ="refund"]').val(refundg);
                    // alert(refundg);

					jQuery('input[name ="min_price"]').val(jQuery('#min_price').val());
					jQuery('input[name ="max_price"]').val(jQuery('#max_price').val());

				// 	jQuery('input[name="from"]').val(jQuery('#from').val());
					jQuery('input[name="parent_search"]').val(jQuery('#parent_search').val());
					jQuery('input[name="language"]').val(jQuery('#language').val());
					jQuery('#location_filter').show();
				// 	alert(jQuery('input[name ="parent_search"]').val());
					if(jQuery('input[name ="parent_search"]').val() != 150)
					{
					    jQuery('#sticky_head').hide();
					    jQuery('#location_filter').hide();

					}
					else
					{
					    jQuery('#sticky_head').show();
					    jQuery('#location_filter').show();
					}





		}
		function parent_search(id)
		{
		    if(id != '')
		    {
		    var url = BASE_URL+'/?parent_search_child='+id;
		    
		  jQuery("#from").load(url);  
		    }
		}
		jQuery('#parent_search').change(function(){
		  var id =jQuery('#parent_search').val();
		  jQuery('input[name ="parent_search"]').val(id);
		  parent_search(id);
        // alert(url);
		});

		function load_filter()
		{
		    var id =jQuery('#parent_search').val();
		  //  alert(id);


			fil_form();
			jQuery('.result_div ').html('');

			jQuery('.loader_div').show();

			var url= jQuery('#filter_form').attr('action');

			// return 0;

			var data = jQuery('#filter_form').serialize()

;

			$.get(url,

				data,

			 function(data, status){

			 	jQuery('.loader_div').hide();

			 	

			 	jQuery('.result_div ').html(data);

			 	jQuery('.owl-carousel').show();

			 	jQuery('.slot_carousel1').owlCarousel({

		center: false,

		items: 1,

		loop: false,

		margin: 20,

		// dots:false,

		nav: true,

		lazyLoad:true,

        navText: ["<i class='arrow_carrot-left'></i>","<i class='arrow_carrot-right'></i>"],

		responsive: {

			0: {

				nav: true,

				dots:false,

				items: 3

			},

			480: {

				nav: true,

				dots:false,

				items: 5

			},

			768: {

				nav: true,

				dots:false,

				items: 3

			},

			1025: {

				nav: true,

				dots:false,

				items: 3

			},

			1340: {

				nav: true,

				dots:false,

				items: 3

			}

		}

	});

  			});

		}

		

		jQuery('document').ready(function(){

			if(slug == "search")

				load_filter();

		});

		function openfilter(type){

			var mid ='#'+type;

			var btn ='.'+type+'_btn';

			jQuery(mid).toggle();

			console.log(jQuery(btn).attr('class'));

			if(jQuery(btn).hasClass("opened"))

			{

				jQuery(btn).removeClass('opened');

				jQuery(btn).addClass('closed');

			}

			else

			{

				jQuery(btn).removeClass('closed');

				jQuery(btn).addClass('opened');

			}

		}

		jQuery('.theiaStickySidebar input').change(function(){

			load_filter();

		});

		jQuery('.theiaStickySidebar select').change(function(){

			load_filter();

		});

		var slug = "<?= $post_slug ?>";

		jQuery('document').ready(function(){

				load_filter();

		});