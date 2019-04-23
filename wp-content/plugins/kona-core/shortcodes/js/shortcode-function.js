jQuery(document).ready(function($){
   
    //init Thickbox
    
    ////stop the flash from happening
	$('#TB_window').css('opacity',0);
	
	function calcTB_Pos() {
		$('#TB_window').css({
	   	   'height': ($('#TB_ajaxContent').outerHeight() + 30) + 'px',
	   	   'top' : (($(window).height() + $(window).scrollTop())/2 - (($('#TB_ajaxContent').outerHeight()-$(window).scrollTop()) + 30)/2) + 'px',
	   	   'opacity' : 1
		});
	}
	
	setTimeout(calcTB_Pos,10);
	
	//just incase..
	setTimeout(calcTB_Pos,100);
	
	$(window).resize(calcTB_Pos);
	
	
	
	/*	**********************************
		SHOW FIRST SHORTCODE
	/*	**********************************/
	$('.sc_list li:first-child a').addClass('active');
	
  	$(".sc_list li a").on("click", function() {  
		$('.sc_list li a').removeClass('active');
		$(this).addClass('active');
		var showoption = $(this).attr('href');
		$('.sc_option .sc-option-content').hide();
		$('.sc_option #'+showoption).show();
		return (false);
	});
	
	
	
	/*	**********************************
		ICON CLICK
	/*	**********************************/
	$("select#icon-type option").each(function () { 
		var type = jQuery(this).val();
		var checked = jQuery(this).attr('selected');
		if (checked == 'selected') {
			$("select#icon-type").siblings('.iconfonts').hide();
			$("select#icon-type").siblings('.'+type).show();
		}
	});
	
  	$("select#icon-type").on("click", function() {  
	  	var type = $(this).val();
		$(this).siblings('.iconfonts').hide();
		$(this).siblings('.'+type).show();
	});
	
  	$(".iconcheck").on("click", function() {  
		value = $(this).siblings('input').val();
		parent = $(this).parent();
		
		$(parent).siblings('li').removeClass('iconactive');
		$(parent).addClass('iconactive');
		
		$(parent).siblings('li').find("input").removeAttr("checked");
		$(this).siblings('input').attr("checked", "checked");
		
		var form = $(parent).parents('form').attr('id');
	});	
	
	
	
	/*	**********************************
		ADD SINGLE IMAGE
	/*	**********************************/
  	$('.upload-sc-image').on('click',function( event ) {	 
		
		var preview = jQuery(this).siblings('.preview-image').find('img');
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this);
		var removebutton = jQuery(this).siblings('.remove-sc-image');
		
		var mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			button: { text: 'Select Image' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				$(preview).attr('src',imagesrc);
				$(value).val(imagesrc);
				$(removebutton).css({'display':'inline-block'});
				$(uploadbutton).css({'display':'none'});
				
		});
	    mediaframe.open();
		
		return false;
	});	
	
	/* Remove Image */
  	$('.remove-sc-image').on('click',function( event ) {	 
		
		var preview = jQuery(this).siblings('.preview-image').find('img');
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this).siblings('.upload-sc-image');
				
		$(preview).attr('src','');
		$(value).val('');
		$(uploadbutton).css({'display':'inline-block'});
		$(this).css({'display':'none'});
		
		return false;
	});	
	
	
	
	/*	**********************************
		ADD SINGLE Video
	/*	**********************************/
  	$('.upload-sc-video').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this);
		var removebutton = jQuery(this).siblings('.remove-sc-video');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Video',
			library: { type: 'video' },
			button: { text: 'Select Video' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				$(value).val(imagesrc);
				$(removebutton).css({'display':'inline-block'});
				$(uploadbutton).css({'display':'none'});
				
		});
	    mediaframe.open();
		
		return false;
	});	
	
	/* Remove video */
  	$('.remove-sc-video').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this).siblings('.upload-sc-video');
				
		$(value).val('');
		$(uploadbutton).css({'display':'inline-block'});
		$(this).css({'display':'none'});
		
		return false;
	});	
	
	
	
	/*	**********************************
		ADD SINGLE Video
	/*	**********************************/
  	$('.upload-sc-audio').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this);
		var removebutton = jQuery(this).siblings('.remove-sc-audio');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Audio',
			library: { type: 'audio' },
			button: { text: 'Select Audio' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;

				$(value).val(imagesrc);
				$(removebutton).css({'display':'inline-block'});
				$(uploadbutton).css({'display':'none'});
				
		});
	    mediaframe.open();
		
		return false;
	});	
	
	/* Remove video */
  	$('.remove-sc-audio').on('click',function( event ) {	 
		
		var value = jQuery(this).siblings('input');
		var uploadbutton = jQuery(this).siblings('.upload-sc-audio');
				
		$(value).val('');
		$(uploadbutton).css({'display':'inline-block'});
		$(this).css({'display':'none'});
		
		return false;
	});	
	
	
	/*	**********************************
		ADD IMAGE FOR MEDIAS
	/*	**********************************/
  	jQuery(".sortable-medias-shortcode .add_image").on("click", function() {  
		
		var area = jQuery(this).parent('.sortable-medias-shortcode').attr('id');
		
		mediaframe = wp.media.frames.customHeader = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			multiple: true,
			button: { text: 'Insert selected Images' }
		});
		mediaframe.on( "select", function() {
			
			// Grab the selected attachments.
			var selection = mediaframe.state().get("selection");
			selection.map( function( attachment ) {
				attachment = attachment.toJSON();
				var imageId = attachment.id;
				if (attachment.sizes.full.height < 150 || attachment.sizes.full.width < 150) {
					var imageThumb = attachment.sizes.full.url;
				} else {
					var imageThumb = attachment.sizes.thumbnail.url;
				}
				jQuery('#'+area).find("#sortable").append('<li class="ui-state-default" title="image"><img src="'+imageThumb+'" class="'+imageId+'"><div class="delete"><span></span></div></li>');
				// http://stackoverflow.com/questions/20101909/wordpress-media-uploader-with-size-select
			}); 
			mediaupdate();
		});
	    mediaframe.open();
	    return false;
	});
	
	jQuery( ".sortable-medias-shortcode #sortable").on("click", '.delete', function() {
		jQuery(this).parent('li').remove();
		mediaupdate();
	});
	
	function mediaupdate() {
				
		jQuery( ".sortable-medias-shortcode" ).each(function(index){
			var area = jQuery(this);
			output ='';
			jQuery(this).find("#sortable li").each(function(index){
				output = output+'[sr_gitem id="'+jQuery(this).find('img').attr('class')+'"]';
			});
			area.find("#sortable").siblings('textarea').val(output);
		});
		
	}
	
	// sortable
	jQuery( ".sortable-medias-shortcode #sortable" ).sortable({
		revert: true,
		stop: function(event, ui) {  
			mediaupdate();	   
		}
	});
	
  
  
  	$('.sr-color-field').wpColorPicker();
  
  	
	
	/*	**********************************
		DUPLICATE GROUP
	/*	**********************************/
  	$(".groupduplicater").on("click", function() {  
		
		var group = $(this).attr('href');
		var parent = $(this).parent('form');
		var groupcontent = $(this).parent('form').find('.group:first').html();
		
		$(this).before('<div id="'+group+'" class="group">'+groupcontent+'</div>');
		
		return false;
	});
	
	
	
	/*	**********************************
		SELECT HIDING
	/*	**********************************/
	jQuery('.select-hiding select').change(function() {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		//alert(name);
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	jQuery('.select-hiding select').each(function(index) {
		var val = jQuery(this).val();
		var name = jQuery(this).attr('id');
		jQuery('.hide'+name).hide();
		jQuery('.'+name+'_'+val).show();
	});
	
	
	
	
	/*	**********************************
		CLICK INSERT SHORTCODE
	/*	**********************************/
  	$(".submit").on("click", function() {  
		var check = true;
					
		// ---------------------- CONTROL CONTACT
		if ($(this).attr('id') == 'insert_contact') {
			var mail = $(this).parent('form').find('input#sc_contactsendto').val();
			if (mail) {   } else { alert('Please enter a recipient email'); check = false; } 
		}
		// ---------------------- CONTROL CONTACT
		
		
		var theShortcode = getshortcode($(this).attr('id'));
		var ed = tinyMCE.activeEditor;
		ed.selection.setContent(theShortcode);
		tb_remove();
		
		return false;
	});
	
	
	
	
	/*	**********************************
		FUNCTION TO GET THE RIGHT SHORTCODE
	/*	**********************************/
	function getshortcode(id) {
		
		var outputbefore = ''; 
		var output = ''; 
			
		
		// ---------------------- CONTACT
		if (id == 'insert_contact') {
			
			var fields = '';
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					
					var fieldtype = $(this).find('select#sc_contacttype').val();
					var fieldname = $(this).find('input#sc_contactname').val();
					var slugname = $(this).find('input#sc_contactslug').val();
					if (slugname == '') { slugname = fieldname.toLowerCase(); slugname = slugname.replace(' ',''); } 
					var required = $(this).find('select#sc_contactreq').val();
					
					output += '[field type='+fieldtype+' name="'+fieldname+'" slug='+slugname+' required='+required+']';
					if (fieldtype !== 'submitbutton') { fields += slugname+','; }
					
			});
			fields = fields.substring(0, fields.length - 1);
			
			var email =  $('#'+id).parent('form').find('input#sc_contactsendto').val();
			var subject =  $('#'+id).parent('form').find('input#sc_contactsubject').val();
			var submitname = $('#'+id).parent('form').find('input#sc_contactsubmit').val();
			
			output = '[sr-contactform fields="'+fields+'" email='+email+' subject="'+subject+'" submit="'+submitname+'"]'+output+'[/sr-contactform]';
		}
		// ---------------------- CONTACT
		
		
		
		// ---------------------- BUTTONS
		if (id == 'insert_buttons') {
			
			var style = $('#'+id).parent('form').find('select#sc_buttonstyle').val();
			var size = $('#'+id).parent('form').find('select#sc_buttonsize').val();
			var type = $('#'+id).parent('form').find('select#sc_buttontype').val();
			var content = $('#'+id).parent('form').find('input#sc_buttontext').val();
			var trans = $('#'+id).parent('form').find('select#sc_buttontransparent').val();
			var pos = $('#'+id).parent('form').find('select#sc_buttoniconpos').val();
			
			var goto = $('#'+id).parent('form').find('select#sc_buttongoto').val();
			if (goto == 'url') {
				var url = $('#'+id).parent('form').find('input#sc_button_url_url').val();
				var target = $('#'+id).parent('form').find('select#sc_button_url_target').val();
				var sc_options = 'url="'+url+'" target="'+target+'"';
			} else if (goto == 'page') {
				var page = $('#'+id).parent('form').find('select#sc_button_page').val();
				var sc_options = 'page="'+page+'"';
			} else if (goto == 'portfolio') {
				var portfolio = $('#'+id).parent('form').find('select#sc_button_portfolio').val();
				var sc_options = 'portfolio="'+portfolio+'"';
			} else if (goto == 'product') {
				var product = $('#'+id).parent('form').find('select#sc_button_product').val();
				var sc_options = 'product="'+product+'"';
			} else if (goto == 'image') {
				var image = $('#'+id).parent('form').find('input#sc_button_video_image').val();
				var sc_options = 'image="'+image+'"';
			} else if (goto == 'youtube' || goto == 'vimeo') {
				var videoid = $('#'+id).parent('form').find('input#sc_button_video_id').val();
				var sc_options = 'videoid="'+videoid+'"';
			} else if (goto == 'selfhosted') {
				var selfhosted = $('#'+id).parent('form').find('input#sc_button_video_selfhosted').val();
				var sc_options = 'selfhosted="'+selfhosted+'"';
			}
			
			if (type === 'icon') {
				var icon = $('#'+id).parent('form').find('input[name="sc_buttonicon"]:checked').val();
				sc_options += ' icon="'+icon+'"';
			}
			
			output = '[sr-button type="'+type+'" style="'+style+'" size="'+size+'" trans="'+trans+'" pos="'+pos+'" open="'+goto+'" '+sc_options+']'+content+'[/sr-button]';
			
		}
		// ---------------------- BUTTONS
		
		
		
		
		// ---------------------- ICONS
		if (id == 'insert_icon') {
			
			var type = $('#'+id).parent('form').find('input[name="sc_iconfont"]:checked').val();
			var size = $('#'+id).parent('form').find('select#sc_iconsize').val();
			var color = $('#'+id).parent('form').find('input#sc_iconcolor').val();
			
			output = '[iconfont type="'+type+'" size="'+size+'" color="'+color+'"]';
			
		}
		// ---------------------- ICONS
		
		
		
		
		// ---------------------- TOGGLE
		if (id == 'insert_toggle') {
			
			var title = $('#'+id).parent('form').find('input#sc_toggletitle').val();
			var aopen = $('#'+id).parent('form').find('select#sc_toggleopen').val();
			var text = $('#'+id).parent('form').find('textarea#sc_toggletext').val();
			output = '[toggle title="'+title+'" open='+aopen+']'+text+'[/toggle]';
			
		}
		// ---------------------- TOGGLE
		
		
		
		// ---------------------- TABS
		if (id == 'insert_tab') {
			
			var style = $('#'+id).parent('form').find('select#sc_tabstyle').val();
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var tab_name = jQuery(this).find('input#sc_tabname').val();
					var tab_text = jQuery(this).find('textarea#sc_tabtext').val();
					outputbefore += tab_name+',';
					output += '[tab id="'+(index+1)+'"]'+tab_text+'[/tab]';
			});
			
			output = '[tabs style="'+style+'" title="'+outputbefore+'"]'+output+'[/tabs]';
		}
		// ---------------------- TABS
		
		
		
		// ---------------------- ACCORDION
		if (id == 'insert_accordion') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var accordion_open = jQuery(this).find('select#sc_accordionopen').val();
					var accordion_name = jQuery(this).find('input#sc_accordiontitle').val();
					var accordion_text = jQuery(this).find('textarea#sc_accordiontext').val();
					output += '[accordion title="'+accordion_name+'" open="'+accordion_open+'"]'+accordion_text+'[/accordion]';
			});
			
			output = '[accordiongroup]'+output+'[/accordiongroup]';
		}
		// ---------------------- ACCORDION
		
		
		
		// ---------------------- QUOTE SLIDER
		if (id == 'insert_quoteslider') {
			
			$('#'+id).parent('form').find('.group').each(function(index) {					
					var quoteText = jQuery(this).find('textarea#sc_quotetext').val();
					var quoteCite = jQuery(this).find('input#sc_quotecite').val();
					var cite = ''; if (quoteCite !== '') { cite = '<cite>'+quoteCite+'</cite>'; }
					output += '[sr-slide]<blockquote class="align-center"><p>'+quoteText+'</p>'+cite+'</blockquote>[/sr-slide]';
			});
			output = '[sr-contentslider]'+output+'[/sr-contentslider]';
		}
		// ---------------------- QUOTE SLIDER
		
		
		
		// ---------------------- SPACER
		if (id == 'insert_spacer') {
			
			var size = $('#'+id).parent('form').find('select#sc_spacersize').val();
			
			output = '[sr-spacer size="'+size+'"]';
			
		}
		// ---------------------- SPACER
		
					
		
		// ---------------------- SUBTITLE
		if (id == 'insert_titlesub') {
			
			var name = $('#'+id).parent('form').find('input#sc_subtitle_name').val();
			var size = $('#'+id).parent('form').find('select#sc_subtitle_size').val();
			var alignment = $('#'+id).parent('form').find('select#sc_subtitle_alignment').val();
			var uppercase = $('#'+id).parent('form').find('select#sc_subtitle_uppercase').val();

			output = '[sr-subtitle size="'+size+'" alignment="'+alignment+'" uppercase="'+uppercase+'"]'+name+'[/sr-subtitle]';
			
		}
		// ---------------------- SUBTITLE
		
		
		
		// ---------------------- VIDEO
		if (id == 'insert_video') {
			
			var type = $('#'+id).parent('form').find('select#sc_videotype').val();
			
			var sc_options = '';			
			var image = $('#'+id).parent('form').find('input#sc_video_inline_image').val();
			var video = $('#'+id).parent('form').find('select#sc_video_inline_type').val();
			var vid = $('#'+id).parent('form').find('input#sc_video_inline_id').val();
			sc_options = 'image="'+image+'" video="'+video+'" id="'+vid+'"';
			
			output = '[sr-video type='+type+' '+sc_options+']';
			
		}
		// ---------------------- VIDEO
		
		
		// ---------------------- ALERT
		if (id == 'insert_alert') {
			
			var type = $('#'+id).parent('form').find('select#sc_alerttype').val();
			var title = $('#'+id).parent('form').find('input#sc_alerttitle').val();
			var text = $('#'+id).parent('form').find('textarea#sc_alerttext').val();

			output = '[sr-alert type="'+type+'" title="'+title+'" ]<em>'+text+'</em>[/sr-alert]';
			
		}
		// ---------------------- ALERT
		
				
		return output;
		
	}
	
    
});


