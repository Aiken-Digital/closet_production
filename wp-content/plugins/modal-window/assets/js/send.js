/* ========= INFORMATION ============================
	- document:  Wow Modal Windows Pro - The most powerful creator of popups & flyouts!
	- author:    Wow-Company & Dmytro Lobov 
	- url:       https://wow-estore.com/item/wow-modal-windows-pro/
	- version:   2.2.3
	- email:     support@wow-company.com
==================================================== */

function smwsend(smwid,errsize,errtext,errcolor) {	
	var buttid = 'wow-modal-window-'+smwid;	
	var result = 'smw-result-'+smwid;
	var counttextarea = jQuery("#" + buttid +" .textarea").length;
	var countname = jQuery("#" + buttid +" .name").length;
	var countemail = jQuery("#" + buttid +" .email").length;	
	var errorcontent = '<center><span style="color:'+errcolor+';font-size:'+errsize+'px;">'+errtext+'</span></center>';
	var name = jQuery("#" + buttid +" .name").val();
	var email = jQuery("#" + buttid +" .email").val();		
	var textarea = jQuery("#" + buttid +" .textarea").val();
	jQuery("#" + buttid + " .textarea").removeAttr('style');
	jQuery("#" + buttid + " .name").removeAttr('style');			
	if ( name == '' && countname == 1){		
        jQuery("#" + buttid +" .name").css({"border-color": errcolor});
        jQuery("#" + buttid +" .name").focus();
		jQuery('#'+result).html(errorcontent);	
		return false;		
    } 
	if ( email == '' && countemail == 1){
        jQuery("#" + buttid +" .email").css({"border-color": errcolor});
        jQuery("#" + buttid +" .email").focus();
		jQuery('#'+result).html(errorcontent);
		return false;
	} 
	if ( email != '' && countemail == 1){
		var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		if(pattern.test(email)){
			jQuery("#" + buttid + " .email").removeAttr('style');
		} 
		else {
			jQuery("#" + buttid +" .email").css({"border-color": errcolor});
			jQuery("#" + buttid +" .email").focus();
			jQuery('#'+result).html(errorcontent);
			return false;
            }
	}		
	 
	if ( textarea == '' && counttextarea == 1){
        jQuery("#" + buttid +" .textarea").css({"border-color": errcolor});
        jQuery("#" + buttid +" .textarea").focus();
		jQuery('#'+result).html(errorcontent);
		return false;		
    }		
	else {
		jQuery('#'+result).html('');		
		var data = {
			'action': 'send_modal_window',
			textarea:textarea,
			name:name,
			email:email,			
			smwid:smwid			
		};
		jQuery.post(send_modal_form.ajaxurl, data, function(msg) {		
			jQuery('#smwconfirm-'+smwid).html(msg);
		});
	}
}