/* ========= INFORMATION ============================
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com
	- email:     givememoney1982@gmail.com
==================================================== */

jQuery(document).ready(function ($) {
  //* Include colorpicker

  $('.wow-plugin .tab-nav li:first').addClass('select');
  $('.wow-plugin .tab-panels>div').hide().filter(':first').show();
  $('.wow-plugin .tab-nav a').click(function () {
    $('.wow-plugin .tab-panels>div').hide().filter(this.hash).show();
    $('.wow-plugin .tab-nav li').removeClass('select');
    $(this).parent().addClass('select');
    return (false);
  });

  $('.wow-plugin input:checkbox:checked').each(function () {
    $(this).siblings('input[type="hidden"]').val('1');
  });

  $('.wow-plugin input:checkbox').live('click', function () {
      checkboxchecked(this);
    }
  );

  $('.wp-color-picker-field').wpColorPicker();

  $('.font_icon').fontIconPicker({
    theme: 'fip-darkgrey',
    emptyIcon: false,
    allCategoryText: 'Show all'
  });

  $('.shape_icon').fontIconPicker({
    theme: 'fip-darkgrey',
    emptyIcon: true,
    allCategoryText: 'Show all'
  });


  $('input#depending_language:checkbox').each(function () {
    languages(this);
  });

  $('select#show').each(function () {
    showchange(this);
  });

  $('input.item_user:radio:checked').each(function () {
    usersroles(this);
  });

  $('input#include_mobile:checkbox').each(function () {
    screen_less(this);
  });

  $('input#include_more_screen:checkbox').each(function () {
    screen_more(this);
  });

  //* height popup
  $('[name="param[modal_height_par]"]').live('click', function () {
    var height_par = $('input[name="param[modal_height_par]"]:checked').val();
    if (height_par == 'auto'){
      $('[name="param[modal_height]"]').val('');
      $('[name="param[modal_height]"]').attr("disabled", "disabled");
    }
    else {
      $('[name="param[modal_height]"]').val('0');
      $('[name="param[modal_height]"]').removeAttr("disabled");
    }
  });

  wow_attach_tooltips($(".wow-help"));

  $('.wow-plugin .location').each(function () {
    locationchecked(this);
  });

  $('.wow-plugin .location').live('click', function () {
    locationchecked(this);
    }
  );

  $('.wow-plugin #popuptitle').live('click', function () {
    title();
    }
  );

  title();
  border();
  overlayEnable();
  autoClose();
  closelocation();
  closetype();
  videosupport();
  shadow();
  displaybutton();
  butonnposition();
  sendtoadmin();
  sendtouser();
  popup();
});

function title() {
  if (jQuery('#popuptitle').is(':checked')){
    jQuery('.popup-title').css('display', 'block');
  }
  else {
    jQuery('.popup-title').css('display', 'none');
  }
}

function border(){
  var border = jQuery('#border_style').val();
  if (border == 'none') {
    jQuery('.border').css('display', 'none');
  }	else {
    jQuery('.border').css('display', 'block');
  }
}

function overlayEnable() {
  if (jQuery('#overlay').is(':checked')){
    jQuery('#overlay_background').css('visibility', 'visible');
  }
  else {
    jQuery('#overlay_background').css('visibility', 'hidden');
  }
}

function autoClose() {
  if (jQuery('#modal_auto_close').is(':checked')){
    jQuery('.modal_auto_close').css('visibility', 'visible');
  }
  else {
    jQuery('.modal_auto_close').css('visibility', 'hidden');
  }
}

function locationchecked(that) {
  if (jQuery(that).prop('checked')) {
    jQuery(that).siblings('input[type="number"]').css('visibility', 'visible');
  }
  else {
    jQuery(that).siblings('input[type="number"]').css('visibility', 'hidden');
  }
}

function closelocation() {

  var loc = jQuery('#close_location').val();
  jQuery('#close-top').css('display', 'none');
  jQuery('#close-bottom').css('display', 'none');
  jQuery('#close-left').css('display', 'none');
  jQuery('#close-right').css('display', 'none');

  if (loc == 'topLeft') {
    jQuery('#close-top').css('display', 'block');
    jQuery('#close-left').css('display', 'block');
  }
  else if (loc == 'topRight') {
    jQuery('#close-top').css('display', 'block');
    jQuery('#close-right').css('display', 'block');
  }
  else if (loc == 'bottomLeft') {
    jQuery('#close-bottom').css('display', 'block');
    jQuery('#close-left').css('display', 'block');
  }
  else if (loc == 'bottomRight') {
    jQuery('#close-bottom').css('display', 'block');
    jQuery('#close-right').css('display', 'block');
  }
}

function closetype() {
  var type = jQuery('#close_type').val();
  jQuery('.btn-text').css('visibility', 'visible');
  jQuery('.btn-icon').css('visibility', 'visible');
  if (type == 'text') {
    jQuery('.btn-icon').css('visibility', 'hidden');
  }
  else {
    jQuery('.btn-text').css('visibility', 'hidden');
  }
}

function videosupport(){
  var video = jQuery('input[name="param[video_support]"]:checked').val();
  if (video == 2){
    jQuery('.videosupport').css('visibility', 'visible');
  }
  else{
    jQuery('.videosupport').css('visibility', 'hidden');
  }

}

function shadow() {
  var shadow = jQuery('#shadowtype').val();
  if (shadow == 'none') {
    jQuery('.shadow').css('visibility', 'hidden');
    jQuery('#shadow').css('display', 'none');
  }	else {
    jQuery('.shadow').css('visibility', 'visible');
    jQuery('#shadow').css('display', 'block');
  }
}

//* Button for popup
function displaybutton(){
  var show = jQuery('[name="param[umodal_button]"]').val();
  if (show == 'yes'){
    jQuery('.showbutton').css('display', '');
    buttontype();
  }
  else {
    jQuery('.showbutton').css('display', 'none');
  }
}

function buttontype (){
  var type = jQuery('[name="param[button_type]"]').val();
  if (type === '1'){
    jQuery('#icon_block').css('display', 'none');
    jQuery('.buttontype_text').css('visibility', 'visible');
    jQuery('.buttontype_icon').css('visibility', 'hidden');
    jQuery('.buttontype_icon_after').css('display', 'none');
    jQuery('.buttontype_icon_only_shape').css('display', 'none');
    jQuery('.buttontype_icon_only').css('visibility', 'visible');
  }
  if (type == '2'){
    jQuery('#icon_block').css('display', '');
    jQuery('.buttontype_text').css('visibility', 'visible');
    jQuery('.buttontype_icon').css('visibility', 'visible');
    jQuery('.buttontype_icon_after').css('display', '');
    jQuery('.buttontype_icon_only_shape').css('display', 'none');
    jQuery('.buttontype_icon_only').css('visibility', 'visible');
  }
  if (type == '3'){
    jQuery('#icon_block').css('display', '');
    jQuery('.buttontype_text').css('visibility', 'hidden');
    jQuery('.buttontype_icon').css('visibility', 'visible');
    jQuery('.buttontype_icon_after').css('display', 'none');
    jQuery('.buttontype_icon_only_shape').css('display', '');
    jQuery('.buttontype_icon_only').css('visibility', 'hidden');
  }
}

function butonnposition(){
  var position = jQuery('[name="param[umodal_button_position]"]').val();
  if (position == 'wow_modal_button_right'){
    jQuery('.button_top').css('display', '');
    jQuery('.button_left').css('display', 'none');
    jQuery('.button_margin_top').css('display', 'none');
    jQuery('.button_margin_right').css('display', '');
    jQuery('.button_margin_bottom').css('display', 'none');
    jQuery('.button_margin_left').css('display', 'none');
  }
  if (position == 'wow_modal_button_left'){
    jQuery('.button_top').css('display', '');
    jQuery('.button_left').css('display', 'none');
    jQuery('.button_margin_top').css('display', 'none');
    jQuery('.button_margin_right').css('display', 'none');
    jQuery('.button_margin_bottom').css('display', 'none');
    jQuery('.button_margin_left').css('display', '');
  }
  if (position == 'wow_modal_button_top'){
    jQuery('.button_top').css('display', 'none');
    jQuery('.button_left').css('display', '');
    jQuery('.button_margin_top').css('display', '');
    jQuery('.button_margin_right').css('display', 'none');
    jQuery('.button_margin_bottom').css('display', 'none');
    jQuery('.button_margin_left').css('display', 'none');
  }
  if (position == 'wow_modal_button_bottom'){
    jQuery('.button_top').css('display', 'none');
    jQuery('.button_left').css('display', '');
    jQuery('.button_margin_top').css('display', 'none');
    jQuery('.button_margin_right').css('display', 'none');
    jQuery('.button_margin_bottom').css('display', '');
    jQuery('.button_margin_left').css('display', 'none');
  }
}

function sendtoadmin() {
  if (jQuery('#send_to_admin').is(':checked')){
    jQuery('.send_to_admin').css('display', 'block');
  }
  else {
    jQuery('.send_to_admin').css('display', 'none');
  }
}

function sendtouser() {
  if (jQuery('#send_to_user').is(':checked')){
    jQuery('.send_to_user').css('display', 'block');
  }
  else {
    jQuery('.send_to_user').css('display', 'none');
  }
}

function iconcode(){
  var name_icon = jQuery("#icongenerate :selected").text();
  var color_icon = jQuery("#color_icon").val();
  var size_icon = jQuery("#size_icon").val();
  var link_icon = jQuery("#link_icon").val();
  var target_icon = jQuery("#target_icon").val();
  if (size_icon == ''){
    var  size_icon = 24;
  }
  if (link_icon != '') {
    var code = '[wow-icon name="'+name_icon+'" color="'+color_icon+'" size="'+size_icon+'" link="'+link_icon+'" target="'+target_icon+'"]';
  }
  else {
    var code = '[wow-icon name="'+name_icon+'" color="'+color_icon+'" size="'+size_icon+'"]';
  }
  var preview = '<i class="'+name_icon+'" style="color:'+color_icon+';font-size:'+size_icon+'px;"></i>';

  jQuery('#code_icon').html(code);
  jQuery('#preview_icon').html(preview);
}

function wow_attach_tooltips(selector) {
  selector.tooltip({
    content: function () {
      return jQuery(this).prop("title")
    },
    tooltipClass: "wow-ui-tooltip",
    position: {
      my: "center top",
      at: "center bottom+10",
      collision: "flipfit"
    },
    hide: {
      duration: 200
    },
    show: {
      duration: 200
    }
  })
}

function checkboxchecked(that) {
  if (jQuery(that).prop('checked')) {
    jQuery(that).siblings('input[type="hidden"]').val('1');
  }
  else {
    jQuery(that).siblings('input[type="hidden"]').val('0');
  }
}

//* Show language
function languages(that) {
  if (jQuery(that).is(':checked')) {
    jQuery('#language').css('display', '');
  }
  else {
    jQuery('#language').css('display', 'none');
  }
}

//* When show
function showchange(that) {
  var show = jQuery(that).val();
  if (show === 'posts' || show === 'pages' || show === 'expost' || show === 'expage' || show === 'taxonomy') {
    jQuery('#id_post').css('display', '');
    jQuery('#shortcode').css('display', 'none');
  }
  else if (show === 'shortecode') {
    jQuery('#shortcode').css('display', '');
    jQuery('#id_post').css('display', 'none');
  }
  else {
    jQuery('#shortcode').css('display', 'none');
    jQuery('#id_post').css('display', 'none');
  }
  if (show === 'taxonomy') {
    jQuery('#taxonomy').css('display', '');
  }
  else {
    jQuery('#taxonomy').css('display', 'none');
  }
}

//* Show screen
function screen_less(that) {
  if (jQuery(that).is(':checked')) {
    jQuery('#screen').css('display', '');
  }
  else {
    jQuery('#screen').css('display', 'none');
  }
}

function screen_more(that) {
  if (jQuery(that).is(':checked')) {
    jQuery('#screenmore').css('display', '');
  }
  else {
    jQuery('#screenmore').css('display', 'none');
  }
}

function usersroles(that) {
  var users = jQuery(that).val();
  if (users == 2) {
    jQuery('#users_roles').css('display', '');
  }
  else {
    jQuery('#users_roles').css('display', 'none');
  }
}

function popup(){
  if (jQuery('#after_popup').is(':checked')){
    jQuery('#previous_popup').css('display', '');
  }
  else {
    jQuery('#previous_popup').css('display', 'none');
  }
}