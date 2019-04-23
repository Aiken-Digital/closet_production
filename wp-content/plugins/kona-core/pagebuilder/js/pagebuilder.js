jQuery(function(jQuery) {  


	/************* 
	ADD PAGEBUILDER BUTTON
	*************/
	/* Gutenberg (Wordpress 5.0 has no gutenberg class but block-editor) */
	if( jQuery(".gutenberg").length > 0 || jQuery(".block-editor").length > 0) { 		
		var selector = ".block-editor";
		var intervalPbButtons = setInterval(function () {
			if (jQuery(selector+" #editor").length > 0) {
				// console.log("add now");
				//jQuery(".gutenberg #editor .edit-post-header").append('<button type="button" id="sr-activate-pagebuilder" class="sr-switch-pagebuilder">Pagebuilder</button>');
				jQuery("#sr-disable-pagebuilder").detach().appendTo(selector+' #editor .edit-post-header-toolbar');
				jQuery("#sr-activate-pagebuilder").detach().appendTo(selector+' #editor .edit-post-header-toolbar');
				clearInterval(intervalPbButtons);
			} else {
			}
		}, 50);
		
	} else {
		jQuery("#postdivrich .wp-editor-tabs").append('<button type="button" id="sr-activate-pagebuilder" class="sr-switch-pagebuilder">Pagebuilder</button>');
	}
	
  		
	/************* 
	ACTIVATE DEACTIVATE PAGEBUILDER
	*************/
	if (jQuery( "._sr_pagebuilder_active").val() == 'yes') {
		jQuery("#postdivrich").addClass("sr-hide");
		jQuery("#post-body-content").addClass("sr-hide-vc");
		jQuery('#meta_pagebuilder').show();
		
		// Gutenberg (Wordpress 5.0 has no gutenberg class but block-editor)
		jQuery(".gutenberg").addClass("sr-hide");
		jQuery(".block-editor").addClass("sr-hide");
	} else {
		jQuery('#meta_pagebuilder').hide();
	}
	jQuery("body").on("click", '#sr-disable-pagebuilder', function() {
		jQuery("#postdivrich").removeClass("sr-hide");
		jQuery("#post-body-content").removeClass("sr-hide-vc");
		jQuery('#meta_pagebuilder').hide();
		jQuery("._sr_pagebuilder_active").val("");
		
		// Gutenberg (Wordpress 5.0 has no gutenberg class but block-editor)
		jQuery(".gutenberg").removeClass("sr-hide");
		jQuery(".block-editor").removeClass("sr-hide");
		
       	tinymce.get("content").setContent("");
		return false;
	});
	jQuery("body").on("click", '#sr-activate-pagebuilder', function() {
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) { jQuery(".switch-tmce").trigger("click"); }
		// BUG - Reset the visual tab 
		jQuery("#postdivrich").addClass("sr-hide");
		jQuery("#post-body-content").addClass("sr-hide-vc");
		jQuery('#meta_pagebuilder').show();
		jQuery("._sr_pagebuilder_active").val("yes");
		
		// Gutenberg (Wordpress 5.0 has no gutenberg class but block-editor)
		jQuery(".gutenberg").addClass("sr-hide");
		jQuery(".block-editor").addClass("sr-hide");
		
		updatePageBuilder();	
		return false;
	});
	
	
	
	/* Open Popup (General) */
	var addRowAfter = false;
	var addRowTo = false;
	jQuery( "#sr-pagebuilder").on("click", '.sr-open-popup', function() {
		var popup = jQuery(this).attr("href");
		jQuery(".sr-pagebuilder-popup").fadeOut(50);
		jQuery("#sr-pagebuilder-popup-bg").fadeIn(200);
		jQuery(".edit-post-layout__content").addClass("increase-index");
		jQuery(popup).fadeIn(200);
		
		// area where to add row
		if (jQuery(this).hasClass("sr-add-row")) { addRowAfter = jQuery(this).parent(".visualsection"); }
		else if (jQuery(this).hasClass("sr-add-first-row")) { 
			if (jQuery(this).parents(".visual-inner").hasClass("fullwidth-inner")) { 
				if( jQuery(this).parents(".fullwidth-inner").children(".visualsection:last").length > 0) { 
					addRowAfter = jQuery(this).parents(".fullwidth-inner").children(".visualsection:last");
				} else { addRowTo = jQuery(this).parents(".fullwidth-inner"); }
			} else { addRowTo = false; } 
		}
		
		// area where to add element 
		if (jQuery(this).hasClass("sr-add-element")) {
			if( jQuery(this).parent().find(".visualsection:last").length > 0) { addRowAfter = jQuery(this).parent().find(".visualsection:last");
			} else { addRowTo = jQuery(this).parent(); }
		}
		
		// hide / disable dependencies
		if (jQuery(this).data("disable") && jQuery(this).data("disable") !== '') {
			jQuery(popup).find(".sr-open-popup."+jQuery(this).data("disable")).hide();
		}
		
		return false;
	});
	
	
	/* Close Popup (General) */
	jQuery( ".sr-pagebuilder-popup").on("click", '.close-popup', function() {
		
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) {
			var editorId = jQuery(this).parents(".sr-pagebuilder-popup").find(".wp-editor-wrap").attr("id");
			jQuery("#"+editorId+" .switch-tmce").trigger("click"); 
		}
		
		var popupid = jQuery(this).parents(".sr-pagebuilder-popup").data('name');
		resetValues(popupid);
		
		jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
		jQuery(".edit-post-layout__content").removeClass("increase-index");
		jQuery(".sr-pagebuilder-popup").fadeOut(200);
		jQuery(".sr-builder-insert").removeClass("disable");
		jQuery('.sr-pagebuilder-popup .option.disable-on-edit').show();
		setTimeout(function() { jQuery(".sr-pagebuilder-popup .sr-open-popup").show(); }, 100); // show item which has benn hidden by depencies
		addRowAfter = false;
		addRowTo = false;
		return false;
	});
	
	
	/* Delete section */
	jQuery('#sr-pagebuilder-visual').on('click',".delete-section",function() {
		jQuery(this).parent(".action-bar").parent(".visualsection").remove();
		updatePageBuilder();
		return false;
	});
	
	
	
	/* Clone section */
	jQuery('#sr-pagebuilder-visual').on('click',".clone-section",function() {
		var el = jQuery(this).parent(".action-bar").parent(".visualsection");
		el.clone().insertAfter(el);
		updatePageBuilder();
		return false;
	});
	
	
	
	/* Switch columns */
	jQuery('#sr-pagebuilder-visual').on('click',".sr-switch-col",function() {
		var el = jQuery(this).parent(".col");
		var elBefore = jQuery(el).prev();
		
		var elJson = jQuery.parseJSON( el.children(".json-start").val() );
		var elBeforeJson = jQuery.parseJSON( elBefore.children(".json-start").val() );
		
		/* switch column size option */
		var elSize = ""; jQuery.each(elJson.options, function(i,o) { if (o.oName === 'size') { elSize = o.oVal; } });
		var elBeforeSize = ""; jQuery.each(elBeforeJson.options, function(i,o) { if (o.oName === 'size') { elBeforeSize = o.oVal; } });
		
		el.children(".json-start").val(el.children(".json-start").val().replace('"oName":"size","oVal":"'+elSize+'"', '"oName":"size","oVal":"'+elBeforeSize+'"'));
		elBefore.children(".json-start").val(elBefore.children(".json-start").val().replace('"oName":"size","oVal":"'+elBeforeSize+'"', '"oName":"size","oVal":"'+elSize+'"'));
		el.children(".shortcode-start").val(el.children(".shortcode-start").val().replace('size="'+elSize+'"', 'size="'+elBeforeSize+'"'));
		elBefore.children(".shortcode-start").val(elBefore.children(".shortcode-start").val().replace('size="'+elBeforeSize+'"', 'size="'+elSize+'"'));
		
		/* switch last-col option */
		var elLast =  ""; jQuery.each(elJson.options, function(i,o) { if (o.oName === 'last') { elLast = o.oVal; } });
		var elBeforeLast = ""; jQuery.each(elBeforeJson.options, function(i,o) { if (o.oName === 'last') { elBeforeLast = o.oVal; } });
		//console.log(elLast);
		
		el.children(".json-start").val(el.children(".json-start").val().replace('"oName":"last","oVal":"'+elLast+'"', '"oName":"last","oVal":"'+elBeforeLast+'"'));
		elBefore.children(".json-start").val(elBefore.children(".json-start").val().replace('"oName":"last","oVal":"'+elBeforeLast+'"', '"oName":"last","oVal":"'+elLast+'"'));
		el.children(".shortcode-start").val(el.children(".shortcode-start").val().replace('last="'+elLast+'"', 'last="'+elBeforeLast+'"'));
		elBefore.children(".shortcode-start").val(elBefore.children(".shortcode-start").val().replace('last="'+elBeforeLast+'"', 'last="'+elLast+'"'));
		
		/* switch class for columns size for pb */
		var elClass =  jQuery(el).attr("class");
		var elBeforeClass =  jQuery(elBefore).attr("class");
		jQuery(elBefore).removeClass(elBeforeClass);
		jQuery(elBefore).addClass(elClass);
		jQuery(el).removeClass(elClass);
		jQuery(el).addClass(elBeforeClass);
		
		/* switch elements */
		jQuery(elBefore).before(el);
		
		updatePageBuilder();
		return false;
	});
	
	
	
	// PSEUDO ACTIONS
	jQuery('#sr-pagebuilder-visual').on('click',".edit-pseudo",function() {
		jQuery(this).parents(".visualcontent").siblings(".action-bar").find(".edit-section").trigger('click');
		return false;
	});
	jQuery('#sr-pagebuilder-visual').on('click',".delete-pseudo",function() {
		jQuery(this).parents(".visualcontent").siblings(".action-bar").find(".delete-section").trigger('click');
		return false;
	});
	jQuery('#sr-pagebuilder-visual').on('click',".clone-pseudo",function() {
		jQuery(this).parents(".visualcontent").siblings(".action-bar").find(".clone-section").trigger('click');
		return false;
	});
	
	
	
	
	/*	**********************************
	
		OPEN EDIT SECTION
		
	/*	**********************************/
	
	/* Edit section */
	jQuery('#sr-pagebuilder-visual').on('click',".edit-section",function() {
		
		var jsonContent = jQuery(this).parent(".action-bar").siblings("textarea.json-start").val();
		var popup = jQuery(this).attr("href");
		
		openEdit(popup,jsonContent,jQuery(this).parent(".action-bar").parent(".visualsection"));
		
		jQuery("#sr-pagebuilder-popup-bg").fadeIn(200);
		jQuery(".edit-post-layout__content").addClass("increase-index");
		jQuery(popup).fadeIn(200);
		
		return false;
	});
	
	
	var tmpSectionEdit = false;
	function openEdit(popup,json,element) {
		tmpSectionEdit = element;
		json = jQuery.parseJSON( json );
		
		jQuery.each(json.options, function(i,o) {
					
			if (jQuery('#'+json.shortcode+'-'+o.oName).hasClass("pb-medias")) {
				var thisEl = jQuery('#'+json.shortcode+'-'+o.oName);
				jQuery(thisEl).val(o.oVal).change();
				var images = jQuery.parseJSON(o.oVal);
				
				// ADDED FOR medias-option
				if (jQuery(thisEl).siblings(".add-sortable-button").attr('data-options')) {
					var mediaOptions = jQuery(thisEl).siblings(".add-sortable-button").data('options');
					mediaOptions = mediaOptions.split("|");
				}
				jQuery.each(images.sortable, function(i,x) { 
					// if change, it might also be changed in admin js
					var addOptions = '';
					if (jQuery(thisEl).siblings(".sortable-container").hasClass('sortable-media-options')) {
						addOptions = '<div class="options">';
						for (i=0; i < mediaOptions.length; i++) {
							var field = mediaOptions[i].split(":");
							var val = '';
							if (x[field[0]]) { val = x[field[0]]; }
							if(field[1] === 'textarea') {
								addOptions += '<textarea name="'+field[0]+'" class="to-json" placeholder="'+field[0]+'">'+val+'</textarea>';	
							} else if(field[1] === 'text') {
								addOptions += '<input type="text" name="'+field[0]+'" placeholder="'+field[0]+'" value="'+val+'" class="to-json">';	
							} else if(field[1] === 'select') {
								addOptions += '<select name="'+field[0]+'" class="to-json">';
								var fieldOptions = field[2].split(",");
								for (o=0; o < fieldOptions.length; o++) {
								var addSelected = ''; if (val === fieldOptions[o]) { addSelected = 'selected=selected'; }
								addOptions += '<option value="'+fieldOptions[o]+'" '+addSelected+'>'+field[0]+': '+fieldOptions[o]+'</option>';
								}
								addOptions += '</select>';
							}
						}
						addOptions += '</div>';
					}
					jQuery(thisEl).siblings(".sortable-container").append('<li><input type="hidden" name="type" value="'+x.type+'" class="to-json"><input type="hidden" name="id" value="'+x.id+'" class="to-json"><input type="hidden" name="thumb" value="'+x.thumb+'" class="to-json"><div class="image-preview"><img src="'+x.thumb+'"></div>'+addOptions+'<a href="#" class="delete-sortable">delete</a></li>');
				});
				// ADDED FOR medias-option
			} else if (jQuery('#'+json.shortcode+'-'+o.oName).hasClass("pb-multiple")) {
				var cats = o.oVal.split(',');
				jQuery('#'+json.shortcode+'-'+o.oName+' option').each(function() { 
					if (jQuery.inArray(jQuery(this).attr('value'),cats) !== -1) {
						jQuery(this).prop('selected', true);	
					}
				});
			} else if (o.oName !== 'content') { 
				//alert(o.oName);	alert(o.oVal);
				jQuery('#'+json.shortcode+'-'+o.oName).val(o.oVal).change();
				
			} else {
				var editorId = jQuery(popup).find(".wp-editor-wrap").attr("id");
				jQuery("#"+editorId+" .switch-tmce").trigger("click");
				tinymce.get(json.shortcode+'-'+o.oName).setContent(o.oVal)
				// workaround for 4.9 wordpress version
				
				//tinymce.get(json.shortcode+'-'+o.oName).focus();
				//tinymce.activeEditor.setContent(o.oVal);
			}
		});
		
		jQuery(popup).find(".sr-builder-insert").addClass("disable");
		
		jQuery('#sr-pagebuilder-popup-'+json.shortcode+' .option.disable-on-edit').hide();
	}
	
  	jQuery(".sr-builder-edit").on("click", function() {  
		
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) { 
			var editorId = jQuery(this).parents(".popup-inner").find(".wp-editor-wrap").attr("id");
			jQuery("#"+editorId+" .switch-tmce").trigger("click");
		}
		
		// switch content if swap option changed (new since kona)
		if (jQuery(this).attr('href') === 'columnsection') {
			var colVal =  jQuery("#sr-pagebuilder-popup-"+jQuery(this).attr('href')+" #columnsection-layout").val();
			var swapCol =  jQuery("#sr-pagebuilder-popup-"+jQuery(this).attr('href')+" #columnsection-swap").val();
			var cols = colVal.split(';');
			if (cols.length == 2) {
				if (
					(swapCol == '1' && !jQuery(tmpSectionEdit).children(".column-inner").hasClass("swap-mobile")) ||
					(swapCol !== '1' && jQuery(tmpSectionEdit).children(".column-inner").hasClass("swap-mobile"))
				   ) { 
					jQuery(tmpSectionEdit).children(".column-inner").find(".col:last-child .sr-switch-col").trigger("click");
				}
			}
		}
		
		var builderElement = getBuilderElement(jQuery(this).attr('href'),true);
		jQuery(tmpSectionEdit).children("textarea.shortcode-start").val(builderElement[1]);
		jQuery(tmpSectionEdit).children("textarea.json-start").val(builderElement[2]);
		jQuery(tmpSectionEdit).children(".action-bar .section-name").html(builderElement[5]);
		if (builderElement[3]) { jQuery(tmpSectionEdit).children("span").html(builderElement[3]); }
		if (builderElement[7]) { jQuery(tmpSectionEdit).children(".visualcontent").html(builderElement[7]); }
		
		
		if (builderElement[0] === 'columnsection') {
			
			// change wrapper class for columnsection
			if (builderElement[4]) {
				jQuery(tmpSectionEdit).children(".column-inner").removeClass("wrapper"); 
				jQuery(tmpSectionEdit).children(".column-inner").removeClass("wrapper-small"); 
				jQuery(tmpSectionEdit).children(".column-inner").removeClass("swap-mobile"); 
				jQuery(tmpSectionEdit).children(".column-inner").addClass(builderElement[4]); 
			}
			
			// change columns
			if(builderElement[6]) {
				var oldColCount = jQuery(tmpSectionEdit).children(".column-inner").find(".col-inner").length;
				var oldColContent = [];
				var oldColJson = [];
				var oldColShortcode = [];
				jQuery(tmpSectionEdit).children(".column-inner").find(".col-inner").each(function(i) {
					oldColContent[i] = jQuery(this).html();
					//oldColOptions[i] = jQuery(this).siblings(".json-start").val();
					var json = jQuery.parseJSON(jQuery(this).siblings(".json-start").val());
					jQuery.each(json.options, function(y,val) { 
						if (y === 0) { oldColJson[i] = ''; oldColShortcode[i] = ''; }
						if (val.oName !== "size" && val.oName !== "last") {
							oldColJson[i] += ',{"oName":"'+val.oName+'","oVal":"'+val.oVal+'"}';
							oldColShortcode[i] += ' '+val.oName+'="'+val.oVal+'"';
						}
					});
				});
				
				jQuery(tmpSectionEdit).children(".column-inner").html(builderElement[6]);
				//var newColCount = jQuery(tmpSectionEdit).children(".column-inner").find(".col-inner").length;
				jQuery(tmpSectionEdit).children(".column-inner").find(".col-inner").each(function(i) {
					if (oldColContent[i]) { jQuery(this).html(oldColContent[i]); }
					if (oldColJson[i]) { 
						jQuery(this).siblings(".json-start").val(jQuery(this).siblings(".json-start").val().replace("}]}", "}"+oldColJson[i]+"]}"));
					}
					if (oldColShortcode[i]) { 
						jQuery(this).siblings(".shortcode-start").val(jQuery(this).siblings(".shortcode-start").val().replace('"]', '" '+oldColShortcode[i]+']'));
					}
				});
			}
						
		}
		
		setTimeout(function() {
			jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
			jQuery(".sr-pagebuilder-popup").fadeOut(200);
			jQuery(".edit-post-layout__content").removeClass("increase-index");
			updatePageBuilder();
			tmpSectionEdit = false;
			jQuery(".sr-builder-insert").removeClass("disable");
			jQuery('#sr-pagebuilder-popup-'+jQuery(this).attr('href')+' .option.disable-on-edit').show();
			setTimeout(function() { jQuery(".sr-pagebuilder-popup .sr-open-popup").show(); }, 300); // show item/option which has been hidden by depencies
		}, 200); // set timeout needed for text tab switch issue
			
		return false;
	});
	
	/*	**********************************
	
		---------------------------------	
		OPEN EDIT SECTION
		---------------------------------	
		
	/*	**********************************/
	
	
	
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		UPDATE PAGE BUILDER VAL
		---------------------------------	
		
	/*	**********************************/
	
		function updatePageBuilder() {
			
			/* Get Full Content*/
			var pbVal = '';
			jQuery("#sr-pagebuilder-visual textarea.shortcode").each(function() {
                var thisShortcode = jQuery(this).val();
				if (jQuery(this).siblings("textarea.content").length > 0) {
					var thisContent = jQuery(this).siblings("textarea.content").val();
					pbVal += thisShortcode.replace("***CONTENT***", thisContent); 
				} else { 
					pbVal += thisShortcode; 
				}
            });
			jQuery("textarea#_sr_pagebuilder").val(pbVal);
			
			
			
			// Gutenberg Wordpress 5.0 has no gutenberg class but block-editor)
			if( jQuery(".gutenberg").length > 0 || jQuery(".block-editor").length > 0) { 
				/*var content = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'content' );
				console.log(content);*/
				wp.data.dispatch( 'core/editor' ).resetBlocks([]);
				let block = wp.blocks.createBlock( 'core/freeform', { content: pbVal } );
				wp.data.dispatch( 'core/editor' ).insertBlocks( block );
				jQuery(".edit-post-sidebar .components-panel__header .edit-post-sidebar__panel-tab:first-child").trigger("click");
			} else {
				// BUG - if html is selected
				jQuery("#wp-content-wrap .switch-tmce").trigger("click");	
				setTimeout(function() { tinymce.get("content").setContent(pbVal); }, 200);
			}
			
			
			/* Get Json*/
			var pbJson = '{"section":[';
			jQuery("#sr-pagebuilder-visual textarea.json").each(function(index) {
				var thisJson = jQuery(this).val();
				if (index > 0) { pbJson += ','; }
				if (jQuery(this).siblings("textarea.content").length > 0) {
					var thisContent = jQuery(this).siblings("textarea.content").val();
					thisContent = JSON.stringify(thisContent);		
					thisContent = thisContent.substring(1, thisContent.length-1);
					pbJson += thisJson.replace("***CONTENT***", thisContent);
				} else { 
					pbJson += thisJson; 
				}
            });
			pbJson += ']}';
			if (pbJson === '{"section":[]}') { pbJson = ''; }
			jQuery("textarea#_sr_pagebuilder_json").val(pbJson);
		}
	
	
	
	/*	**********************************
	
		---------------------------------	
		CLICK INSERT PAGE BUILDER ELEMENT
		---------------------------------	
		
	/*	**********************************/
	
  	jQuery(".sr-builder-insert").on("click", function() {  
		
		// BUG - Reset the visual tab 
		var is_visual_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if (!is_visual_active) { 
			var editorId = jQuery(this).parents(".popup-inner").find(".wp-editor-wrap").attr("id");
			jQuery("#"+editorId+" .switch-tmce").trigger("click");
		}
		
		var builderElement = getBuilderElement(jQuery(this).attr('href'),false);
		
		if (addRowAfter) {
			jQuery(addRowAfter).after(builderElement);
		} else if(addRowTo) {
			jQuery(addRowTo).prepend(builderElement);
		} else {
			jQuery("#sr-pagebuilder-visual .sr-pb-last").before(builderElement);
			
			if (jQuery(this).attr('href') == 'columnsection') {
				console.log("test");
				jQuery("#sr-pagebuilder-visual .sr-pb-last").prev(".columnsection")
				
				jQuery("#sr-pagebuilder-visual .sr-pb-last").prev(".columnsection").find( ".col-inner" ).sortable({
					revert: true,
					connectWith: ".col-inner,.fullwidth-inner,#sr-pagebuilder-visual",
					cancel: ".disable-sortable",
					placeholder: "sortable-placeholder",
					items: "> div.visualsection",
					handle: '> .action-bar',
					start: function(e,ui){
						ui.placeholder.height(ui.item.height());
					},
					stop: function() {  
						updatePageBuilder();	
						jQuery(".column-inner .col .col-inner").css('height','auto');
					}
				});
			}
		}
		
		setTimeout(function() {
			jQuery("#sr-pagebuilder-popup-bg").fadeOut(200);
			jQuery(".edit-post-layout__content").removeClass("increase-index");
			jQuery(".sr-pagebuilder-popup").fadeOut(200);
			setTimeout(function() { jQuery(".sr-pagebuilder-popup .sr-open-popup").show(); }, 300); // show item which has been hidden by depencies
			updatePageBuilder();
			addRowAfter = false;
			addRowTo = false;
		}, 200); // set timeout needed for text tab switch issue
		return false;
	});
	
	
	// get visual element function
	function getBuilderElement(id,edit) {
						
		var shortcodeEl = '['+id+'';
		var jsonEl = '{"shortcode":"'+id+'","options":[';
		var spanEl = '';
		var classEl = '';
		var theContent = '';
		
		var visualName = '';
		jQuery("#sr-pagebuilder-popup-"+id+" .send-val").each(function(index) {
			var oName =  jQuery(this).attr("id").replace(id+"-", "");
			var oVal =  jQuery(this).val();
			
			if (oName === 'content') {
				theContent = tinymce.get(id+"-content").getContent();
				jsonEl += '{"oName":"content","oVal":'+JSON.stringify(theContent)+'},';
			} else if (oName === 'medias') {
				var images = jQuery.parseJSON(oVal);
				var ids = '';
				jQuery.each(images.sortable, function(i,x) { 
					ids += x.id;
					if (x.size || x.size == '') { ids += '|'+x.size; }
					if (x.product || x.product == '') { ids += '|'+x.product; }
					// if change, also change in pagebuilder.php
					ids += ',';
				});
				shortcodeEl += ' '+oName+'="'+ids.slice(0, -1)+'"';
				jsonEl += '{"oName":"'+oName+'","oVal":'+JSON.stringify(oVal)+'},';
			} else {
				if (oName === 'name') { theName = oVal; }
				shortcodeEl += ' '+oName+'="'+oVal+'"';
				jsonEl += '{"oName":"'+oName+'","oVal":"'+oVal+'"},';
			}
			
			if (index == 0 || oName == 'name') { visualName = '<i>'+oVal+'</i>'; }
        });
		
		shortcodeEl += ']';
		if (theContent) { shortcodeEl += theContent; } 
		shortcodeEl = shortcodeEl.replace("[text]", "");
		
		jsonEl += ']}';
		jsonEl = jsonEl.replace(",]", "]");
		
		// create default visual section
		var sectionName = id;
		var sectionClass = '';
		if (id === 'fullwidthsection') { sectionName = 'Background Section '+visualName; } else
		if (id === 'columnsection') { sectionName = 'Column Row'; } else
		if (id === 'sr-spacer') { sectionName = 'Spacer '+visualName; sectionClass = 'light'; } else
		if (id === 'sr-googlemap') { sectionName = 'Google Map'; } else
		if (id === 'sr-gallery') { sectionName = 'Gallery'; } else
		if (id === 'sr-slider') { sectionName = 'Image Slider'; } else
		if (id === 'text') { sectionName = 'Text / Editor'; }
		if (id === 'sr-teammember') { sectionName = 'Team Member '+visualName; }
		if (id === 'sr-blogposts') { sectionName = 'Blog Posts'; }
		if (id === 'sr-portfolioitems') { sectionName = 'Portfolio Grid'; }
		if (id === 'sr-shopitems') { sectionName = 'Shop Products'; }
		if (id === 'sr-shopproduct') { sectionName = 'Product'; }
		if (id === 'sr-shopcategories') { sectionName = 'Product Categories'; }
		if (id === 'sr-imagebutton') { sectionName = 'Button Image'; }
		if (id === 'sr-singleimage') { sectionName = 'Single Image'; }
		if (id === 'sr-instagram') { sectionName = 'Instagram Feed'; }
		
		var visualIcon = '';
		if (jQuery("#sr-pagebuilder-popup-"+id+" .popup-title .icon").length > 0) {
			visualIcon = '<span class="'+jQuery("#sr-pagebuilder-popup-"+id+" .popup-title .icon").attr("class")+'"></span>';
		}
			
		var visualEl = '<div class="visualsection '+id+' '+sectionClass+' sr-clearfix">';
		visualEl += '<div class="action-bar">'+visualIcon+'<span class="section-name">'+sectionName+'</span>';
		visualEl += '<a href="#" class="delete-section" title="delete"></a><a href="#sr-pagebuilder-popup-'+id+'" class="edit-section" title="edit"></a><a href="#" class="clone-section" title="clone"></a>';
		visualEl += '</div>';
		visualEl += '<textarea class="shortcode shortcode-start">'+shortcodeEl+'</textarea>';
		visualEl += '<textarea class="json json-start">'+jsonEl+'</textarea>';
		
		
		
		var visualContent = '';
		/*	-----------------
			text (visualcontent new since 1.5)
			-----------------	*/
		if (id === 'text') {
			visualContent += '<div class="textcontent">'+shortcodeEl+'</div><div class="pseudo-action"><a href="#" class="delete-pseudo" title="delete"></a><a href="#" class="edit-pseudo"  title="edit"></a><a href="#" class="clone-pseudo"  title="clone"></a></div>';
			visualEl += '<div class="visualcontent">'+visualContent+'</div>';
		}
			
			
			
		/*	-----------------
			columnsection
			-----------------	*/
		var columnsCount = '';
		if (id === 'columnsection') {	
			
			// get wrapper
			var wrapperVal =  jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-wrapper").val();
			classEl = wrapperVal;
			visualEl = visualEl.replace('class="visualsection', 'class="visualsection '+wrapperVal); 
			
			// get column choice
			var colVal =  jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-layout").val();
			var swapCol =  jQuery("#sr-pagebuilder-popup-"+id+" #columnsection-swap").val();
			var cols = colVal.split(';');
			
			if (cols.length == 2 && swapCol == '1') {
				visualEl += '<div class="columns sr-clearfix column-inner swap-mobile">';
				classEl += " swap-mobile";
			} else {
				visualEl += '<div class="columns sr-clearfix column-inner">';
			}
			for (var i=0;i<cols.length;i++) {
				
				var colSize = cols[i];
				if (cols.length == 2 && swapCol == '1') { if (i==0) { colSize = cols[1]; } else if (i==1) { colSize = cols[0]; } }
				
				var shortcodeOption = 'size="'+colSize+'"';
				var jsonOption = '{"oName":"size","oVal":"'+colSize+'"}';
				if (i+1 >= cols.length) { shortcodeOption += ' last="last-col"'; jsonOption += ',{"oName":"last","oVal":"last-col"}'; }
				else { shortcodeOption += ' last=""'; jsonOption += ',{"oName":"last","oVal":""}'; }
				
				columnsCount += '<div class="col '+colSize+' visualsection"><a class="sr-switch-col" href="#" alt="Switch"></a><textarea class="shortcode shortcode-start">[col '+shortcodeOption+']</textarea><textarea class="json json-start">{"shortcode":"col","options":['+jsonOption+']}</textarea><div class="action-bar"><a href="#sr-pagebuilder-popup-col" class="edit-section"></a></div><div class="element-container col-inner"><a class="sr-add-element sr-open-popup disable-sortable" href="#sr-pagebuilder-popup-element">Insert Element</a></div><textarea class="shortcode">[/col]</textarea><textarea class="json">{"shortcode":"/col"}</textarea></div>';
			}
			visualEl += columnsCount;
			visualEl += '</div>';
			
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
			//console.log(visualEl);
						
		}
		
		
		/*	-----------------
			columnsection
			-----------------	*/
		if (id === 'fullwidthsection') {
			visualEl += '<div class="fullwidth-inner sr-clearfix visual-inner">';
			visualEl += '<div class="pb-message disable-sortable"><a class="sr-add-first-row sr-button sr-open-popup" data-disable="fullwidthsection" href="#sr-pagebuilder-popup-row">Add Row</a></div></div>';
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
		/*	-----------------
			TEAM MEMBER
			-----------------	*/
		if (id === 'sr-teammember') {
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
		/*	-----------------
			GOOGLE MAP
			-----------------	*/
		if (id === 'sr-googlemap') {
			visualEl += '<textarea class="shortcode">[/'+id+']</textarea><textarea class="json">{"shortcode":"/'+id+'"}</textarea>';
		}
		
		
		/*	-----------------
			LOOKBOOK & GALLERY
			-----------------	*/
		if (id === 'sr-shoplookbook' || id === 'sr-gallery') {
			visualContent += '<div class="democontent ">';
			
			jQuery("#sr-pagebuilder-popup-"+id+" .send-val").each(function() {
				var oName =  jQuery(this).attr("id").replace(id+"-", "");
				var oVal =  jQuery(this).val();

				if (oName === 'medias') {
					var images = jQuery.parseJSON(oVal);
					jQuery.each(images.sortable, function(i,x) { 
						visualContent += '<span><img src="'+x.thumb+'" /></span>';
					});
				} 
			});
			
			visualContent += '</div><div class="pseudo-action"><a href="#" class="delete-pseudo" title="delete"></a><a href="#" class="edit-pseudo"  title="edit"></a><a href="#" class="clone-pseudo"  title="clone"></a></div>';
			
			visualEl += '<div class="visualcontent">'+visualContent+'</div>';
		}
		
		
		//visualEl += '<a class="sr-add-row sr-open-popup" href="#sr-pagebuilder-popup-row">Add Row</a>';
		
		resetValues(id);
		
		visualEl += '</div>';
		if (edit) {
			var editVal = [id,shortcodeEl,jsonEl,spanEl,classEl,sectionName,columnsCount,visualContent];
			return editVal;
		} else {	
			return visualEl;
		}
	
	}
	
	
	/*	**********************************
		RESET FIELDS
	/*	**********************************/
	function resetValues(id) {
		jQuery("#sr-pagebuilder-popup-"+id+" .theval").each(function(index) {
			var oName =  jQuery(this).attr("id").replace(id+"-", "");
			var oVal =  jQuery(this).val();
			var oDefault =  jQuery(this).data("default");
			
			if (oName === 'content') {
				theContent = tinymce.get(id+"-content").setContent("");
			} else {
				jQuery(this).val(oDefault).change();
			}
			
			if (oName === 'medias' || oName === 'medias-option') {
				jQuery(this).siblings('.sortable-container').html("");
			}
        });
	}
	
	
	
	
	/*	**********************************
	
		---------------------------------	
		SORTABLE FEATURES
		---------------------------------	
		
	/*	**********************************/
	jQuery( "#sr-pagebuilder-visual" ).sortable({
		revert: true,
		connectWith: ".col-inner,.fullwidth-inner",
		cancel: ".disable-sortable",
		placeholder: "sortable-placeholder",
		items: "> div.visualsection",
		handle: '> .action-bar',
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
			if (ui.item.hasClass("columnsection")) {
				jQuery( "#sr-pagebuilder-visual" ).sortable("option", "connectWith", ".fullwidth-inner");
				jQuery( "#sr-pagebuilder-visual" ).sortable("refresh");
			}
			if (ui.item.hasClass("fullwidthsection")) {
				jQuery( "#sr-pagebuilder-visual" ).sortable("option", "connectWith", false);
				jQuery( "#sr-pagebuilder-visual" ).sortable("refresh");
			}
		},
		stop: function(e,ui){
			if (ui.item.hasClass("columnsection") && ui.item.hasClass("fullwidthsection")) {
				jQuery( "#sr-pagebuilder-visual" ).sortable("option", "connectWith", ".col-inner,.fullwidth-inner");
				jQuery( "#sr-pagebuilder-visual" ).sortable("refresh");
			}
			updatePageBuilder();	
		}
	});
	
	jQuery( ".col-inner" ).sortable({
		revert: true,
		/*connectWith: ".col-inner",*/
		connectWith: ".col-inner,.fullwidth-inner,#sr-pagebuilder-visual",
		cancel: ".disable-sortable",
		placeholder: "sortable-placeholder",
		items: "> div.visualsection",
		handle: '> .action-bar',
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
			
			// workaround for preventing jumping
			/*var maxHeight = 0;
			ui.item.parents(".column-inner").find(".col").each(function() { 
				var height = jQuery(this).find(".col-inner").height();
				console.log(height);
				if (height > maxHeight) { maxHeight = height; }
			});
			ui.item.parents(".column-inner").find(".col .col-inner").css('height','300px');*/
		},
		stop: function() {  
			updatePageBuilder();	
			jQuery(".column-inner .col .col-inner").css('height','auto');
		}
	});
	
	jQuery( ".fullwidth-inner" ).sortable({
		revert: true,
		connectWith: ".fullwidth-inner,.col-inner,#sr-pagebuilder-visual",
		cancel: ".disable-sortable",
		placeholder: "sortable-placeholder",
		items: "> div.visualsection",
		handle: '> .action-bar',
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
			if (ui.item.hasClass("columnsection")) {
				jQuery( ".fullwidth-inner" ).sortable("option", "connectWith", ".fullwidth-inner,#sr-pagebuilder-visual");
				jQuery( ".fullwidth-inner" ).sortable("refresh");
			}
		},
		stop: function(e,ui){
			if (ui.item.hasClass("columnsection") ) {
				jQuery( ".fullwidth-inner" ).sortable("option", "connectWith", ".fullwidth-inner,.col-inner,#sr-pagebuilder-visual");
				jQuery( ".fullwidth-inner" ).sortable("refresh");
			}  
			updatePageBuilder();	
		}
	});
	
	
	
	/*	**********************************
	
		---------------------------------	
		MISC
		---------------------------------	
		
	/*	**********************************/
	
	// custom select
  	jQuery(".custom-select > ul > li").on("click", function() {  
		var rel = jQuery(this).data('rel');
		jQuery(this).siblings('li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery(this).parent("ul").siblings("select").val(rel).change();
		return false;
	});
	
	jQuery('.custom-select select').on('change',function() {
		var val = jQuery(this).val();
		jQuery(this).siblings('ul').find('li').removeClass('active');
		jQuery(this).siblings('ul').find('li[data-rel="'+val+'"]').addClass('active');
	});
	
	
	/*	---------------------------------	
		RESTORE BUTTON
		--------------------------------- */
		jQuery("#sr-pagebuilder").on("click", '#restore-pagebuilder', function() {
			//alert("hello");
			jQuery('input[name="sr-pagebuilder-restore"]').val("true");
			jQuery('#publish').click();
			return false;
		});	
	/*	---------------------------------	
		RESTORE BUTTON
		--------------------------------- */
	
		
});