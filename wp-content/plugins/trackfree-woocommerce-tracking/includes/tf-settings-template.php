<div id="track-free-main-box1" class="trackfree-main-box">
	<div style="float: left;width: 30%">
		<h2><?php _e('Preferred Courier Name', 'trackfree-woocommerce-tracking');?></h2>
		<div class="trackfree-description"><?php _e('Select couriers you often use for more accurate courier auto-detection.', 'trackfree-woocommerce-tracking');?></div>
	</div>
	<div style="float: right;width: 70%;">
		<div class="postbox">
			<div class="inside">
				<div class="main">
					<?php $couriers = array();
					$preferred_couriers = get_option('trackfree_preferred_couriers');
					if ($preferred_couriers) {
						$couriers = explode(',', $preferred_couriers);
					} ?>
					<form method="post" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>">
						<?php settings_fields('trackfree_options_group'); ?>
						<table style="width:100%" cellpadding="10" cellspacing="10">
							<tr>
								<td>
									<select data-placeholder="<?php _e('Please select couriers', 'trackfree-woocommerce-tracking');?>" id="trackfree_couriers" class="chosen-select" multiple style="width:100%">
									</select>
								</td>
							</tr>
						</table>
						<input type="hidden" id="track_couriers" name="trackfree_preferred_couriers" value="<?php echo implode(",", $couriers); ?>" />
						<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
						<?php submit_button(); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both";>&nbsp;</div>
</div>

<div id="track-free-main-box1" class="trackfree-main-box">
	<div style="float: left;width: 30%">
		<h2><?php _e('General Settings', 'trackfree-woocommerce-tracking');?></h2>
	</div>
	<div style="float: right;width: 70%;">
		<div id="dashboard_right_now" class="postbox ">
			<div class="inside">
				<div class="main">
					<form method="post" id="mainform" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>" enctype="multipart/form-data">
						<table class="form-table">
							<tbody>
								<tr>
									<th scope="row"><label for="trackfree_storename"><?php _e('Your Store Name', 'trackfree-woocommerce-tracking');?></label></th>
									<td><input name="trackfree_storename" type="text" id="trackfree_storename" value="<?php echo $response_data['store_name']; ?>" class="regular-text"></td>
								</tr>
								<tr>
									<th scope="row"><label for="trackfree_email"><?php _e('Email Address', 'trackfree-woocommerce-tracking');?></label></th>
									<td>
										<input name="trackfree_email" type="email" id="trackfree_email" aria-describedby="trackfree-email-description" value="<?php echo $response_data['email']; ?>" class="regular-text ltr">
										<p class="description" style="margin-top: 5px;"><?php _e('This address is used for admin purposes. If you change this we will send you a confirmation email to your new address.', 'trackfree-woocommerce-tracking');?> <strong><?php _e('The new address will not be active until confirmed.', 'trackfree-woocommerce-tracking');?></strong></p>
										<?php if ($response_data['new_email']) {
											echo '<p>"' . $response_data['new_email'] . '" Verify pending.</p>';
										} ?>
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="trackfree_fullname"><?php _e('Your Name', 'trackfree-woocommerce-tracking');?></label></th>
									<td><input name="trackfree_fullname" type="text" id="trackfree_fullname" value="<?php echo $response_data['full_name']; ?>" class="regular-text"></td>
								</tr>
								<tr>
									<th><?php _e('Shipment Delivery Email', 'trackfree-woocommerce-tracking');?></th>
									<td>
										<input type="checkbox" id="delivered_mail_to_customer" name="delivered_mail_to_customer" value="1" <?php if ($response_data['delivered_mail_to_customer'] == 1) { ?> checked="checked" <?php }?>>
										<p class="description" style="margin-top: 5px;">
										<?php _e('Send mail to customer when shipment is delivered', 'trackfree-woocommerce-tracking');?></p>
									</td>
								</tr>
								<tr>
									<th><?php _e('Display Delivery Column', 'trackfree-woocommerce-tracking');?></th>
									<td>
										<input type="checkbox" id="show_shipment_status_order_list" name="show_shipment_status_order_list" value="1" <?php if (get_option('trackfree_shipment_status_in_orders') == 1) { ?> checked="checked" <?php }?>>
										<p class="description" style="margin-top: 5px;"><?php _e('Show shipment details in order list page', 'trackfree-woocommerce-tracking');?></p>
									</td>
								</tr>
                                <tr>
									<th><?php _e('Display Shipping Details', 'trackfree-woocommerce-tracking');?></th>
									<td>
										<input type="checkbox" id="show_shipment_details_order_details" name="show_shipment_details_order_details" value="1" <?php if (get_option('trackfree_shipment_details_in_order_details') == 1) { ?> checked="checked" <?php }?>>
										<p class="description" style="margin-top: 5px;"><?php _e('Show shipment details in order details page', 'trackfree-woocommerce-tracking');?></p>
									</td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" value="true" name="trackfree_general_settings" />
						<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
						<?php submit_button(__('Save Settings', 'trackfree-woocommerce-tracking')); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both";>&nbsp;</div>
</div>

<!-- Domains update Setting S -->
<div id="track-free-main-box1" class="trackfree-main-box">
	<div style="float: left;width: 30%">
		<h2><?php _e('Domain Settings', 'trackfree-woocommerce-tracking'); ?></h2>
	</div>
	<div style="float: right;width: 70%;">
		<div id="dashboard_right_now" class="postbox">
			<div class="inside">
				<div class="main">
					<form method="post" id="mainform" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>" enctype="multipart/form-data">
						<table class="form-table">
							<tbody>
								<tr>
									<th scope="row"><label for="trackfree_custom_domain"><?php _e('TrackFree Custom Domain', 'trackfree-woocommerce-tracking'); ?></label></th>
									<td>
										<input name="trackfree_custom_domain" type="text" id="trackfree_custom_domain" value="<?php echo $response_data['custom_domain']; ?>" class="regular-text">
										<?php if (($response_data['custom_domain']) && ($response_data['custom_domain_status'] == 1)) {
											echo '<p class="description" style="margin-top: 5px;"><strong>' . __('Custom domain successfully connected with TrackFree.', 'trackfree-woocommerce-tracking') . '</strong></p>';
										} else if (($response_data['custom_domain']) && ($response_data['custom_domain_status'] == 0)) {
											echo '<p class="description" style="margin-top: 5px;">' . __('Custom domain is not connected with TrackFree.', 'trackfree-woocommerce-tracking') . '</strong></p>';
											echo '<p class="description" id="trackfree-domain-description">' .  $response_data['custom_domain_help'] . '</p>';
										} else {
											echo '<p class="description" style="margin-top: 5px;">' .  $response_data['custom_domain_help'] . '</p>';
										} ?>
									</td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" value="true" name="update_custom_domain" />
						<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
						<?php submit_button(__('Update Custom Domain', 'trackfree-woocommerce-tracking')); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both";>&nbsp;</div>
	<!-- Domains update setting E -->

	<!-- subdomain setting S-->
	<div style="float: left;width: 30%">
		<h2><?php _e('Subdomain Settings', 'trackfree-woocommerce-tracking');?></h2>
	</div>
	<div style="float: right;width: 70%;">
		<div id="dashboard_right_now" class="postbox ">
			<div class="inside">
				<div class="main">
					<form method="post" id="mainform" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>" enctype="multipart/form-data">
						<table class="form-table">
							<tbody>
								<tr>
									<th scope="row"><label for="trackfree_custom_domain"><?php _e('TrackFree Subdomain', 'trackfree-woocommerce-tracking');?></label></th>
									<td>
										<input name="trackfree_sub_domain" type="text" id="trackfree_sub_domain" value="<?php echo $response_data['sub_domain']; ?>"><code><strong>.trackfree.io</strong></code>
									</td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" value="true" name="update_sub_domain" />
						<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
						<?php submit_button(__('Update Subdomain', 'trackfree-woocommerce-tracking')); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both";>&nbsp;</div>
	<!-- Subdomain setting E -->

	<!-- Billing usage info S-->
	<div style="float: left;width: 30%">
		<h2><?php _e('Billing', 'trackfree-woocommerce-tracking');?></h2>
	</div>
	<div style="float: right;width: 70%;">
		<div id="dashboard_right_now" class="postbox ">
			<div class="inside">
				<div class="main">
					<table class="form-table">
						<tbody>
							<tr>
								<th><?php _e('Plan Name', 'trackfree-woocommerce-tracking');?></th>
								<td>
									<?php echo $response_data['plan_name']; ?>
									<span class="trackfree-description trackfree-margin-top-5">(Up to <?php echo $response_data['credits'];?> shipment tracking <?php echo $response_data['plan_name'] == 'Free' ? 'lifetime' : 'every month'; ?>)</span>
									<div style="margin-top: 10px;">
										<a href="javascript:void(0);" class="button-primary" onClick="javascript:window.open('<?php echo trackfree_url();?>/wc_user_plans?key=<?php echo $trackfree_account_api_key;?>','userPlans','height=550,directories=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');"><?php _e('Change', 'trackfree-woocommerce-tracking'); ?></a>
									</div>
								</td>
							</tr>
							<tr>
								<th><?php _e('Usage', 'trackfree-woocommerce-tracking');?></th>
								<td><?php echo $response_data['usage'] . '/' . $response_data['credits']; ?></td>
							</tr>
							<?php if (is_numeric($response_data['days_left'])) { ?>
								<tr>
									<th><?php _e('Subscription Days Left', 'trackfree-woocommerce-tracking');?></th>
									<td><?php echo $response_data['days_left'] . ' day(s)'; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both";>&nbsp;</div>
	<!-- billing usage info E-->
	<!-- domain update setting E -->
</div>

<!--- Tracking page settings S-->
<div id="track-free-main-box1" class="trackfree-main-box">
	<div style="float: left;width: 30%">
		<h2><?php _e('Themes', 'trackfree-woocommerce-tracking');?></h2>
		<div class="trackfree-description"><?php _e('Select themes, upload logo and manage.', 'trackfree-woocommerce-tracking');?></div>
	</div>
	<div style="float: right;width: 70%;">
		<div id="dashboard_right_now" class="postbox ">
			<div class="inside">
				<div class="main">
					<form method="post" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>">
						<table class="form-table">
							<tbody>
								<tr>
									<td>
										<fieldset>
											<label><input type="radio" name="trackfree_theme" id="trackfree_theme" <?php if ($response_data['trackfree_theme'] == 1) { ?> checked="checked" <?php } ?> onclick="if(this.checked==true) { $('#themeinfo').hide(); }" value="1"> <span class="date-time-text date-time-custom-text">Basic</span></label>
											<br>
											<img src="//trackfree.sfo2.digitaloceanspaces.com/themes/default/theme1.png" alt="theme1_image" width="150" height="150"><br><a href="<?php echo trackfree_url();?>/wc_theme_preview?key=<?php echo $trackfree_account_api_key;?>&theme=1"  target="_blank"><?php _e('Preview', 'trackfree-woocommerce-tracking');?></a><br>
										</fieldset>
									</td>
									<td>
										<fieldset>
											<label><input type="radio" name="trackfree_theme" id="trackfree_theme"  <?php if ($response_data['trackfree_theme'] == 2) { ?> checked="checked" <?php } ?> onclick="if(this.checked==true) { $('#themeinfo').show(); }" value="2"> <span class="date-time-text date-time-custom-text">Pro</span></label>
											<br>
											<img src="//trackfree.sfo2.digitaloceanspaces.com/themes/default/theme2.png" alt="theme1_image" width="150" height="150"><br>
											<a href="<?php echo trackfree_url();?>/wc_theme_preview?key=<?php echo $trackfree_account_api_key;?>&theme=2"  target="_blank"><?php _e('Preview', 'trackfree-woocommerce-tracking');?></a>
											<div id="themeinfo" style="<?php if ($response_data['trackfree_theme'] != 2) { ?> display:none <?php } ?>">
												<p><strong>Features</strong></p>
												<p>Customer feedback widget</p>
												<p>Machine Learning-powered auto product recommendations</p>
												<p>Marketing banner</p>
											</div>
										</fieldset>
									</td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" value="true" name="trackfree_theme_update" />
						<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
						<?php
						submit_button(__('Apply Theme', 'trackfree-woocommerce-tracking'));
						?>
					</form>
					<div class="trackfree-line-border"></div>
					<table class="form-table">
						<tbody>
							<tr>
								<td><strong><?php _e('Tracking page logo', 'trackfree-woocommerce-tracking');?></strong></td>
								<td>
									<div class="tf-img-upload-container">
										<div class="tf-img-uploader" id="tf_site_logo">
											<?php if ($response_data['site_logo']) {
												$remove_site_logo = '';
												$change_site_logo = '';
												$upload_site_logo = 'none';
												?>
												<div class="show_image" id="img_site_logo" style="margin: 10px 0;"><img src="<?php echo $response_data['site_logo'];?>"/></div>
												<?php
											} else {
												$remove_site_logo = 'none';
												$change_site_logo = 'none';
												$upload_site_logo = '';
											} ?>
											<button class="button remove_image" id="remove_site_logo" style="display: <?php echo $remove_site_logo;?>"><?php _e('Remove', 'trackfree-woocommerce-tracking');?></button>
											<a href="#" class="tf-uploader button" id="change_site_logo" style="display: <?php echo $change_site_logo;?>"><?php _e('Change logo', 'trackfree-woocommerce-tracking');?></a>
											<a href="#" class="tf-uploader button" id="upload_site_logo" style="display: <?php echo $upload_site_logo;?>"><?php _e('Select logo', 'trackfree-woocommerce-tracking');?></a>
											<div class="trackfree-description trackfree-margin-top-5"><?php _e('Suggested image dimensions', 'trackfree-woocommerce-tracking');?>: 120 by 90 pixels.</div>
											<input type="hidden" class="tf_uploads" id="site_logo" name="site_logo"/>
										</div>
									</td>
								</tr>
								<tr>
									<td><strong><?php _e('Site icon', 'trackfree-woocommerce-tracking');?></strong></td>
									<td>
										<div class="tf-img-uploader" id="tf_site_fav_icon">
											<?php if ($response_data['site_favicon']) {
												$remove_site_fav_icon = '';
												$change_site_fav_icon = '';
												$upload_site_fav_icon = 'none'; ?>
												<div class="show_image" id="img_site_fav_icon" style="margin: 10px 0;"><img src="<?php echo $response_data['site_favicon'];?>"/></div>
												<?php
											} else {
												$remove_site_fav_icon = 'none';
												$change_site_fav_icon = 'none';
												$upload_site_fav_icon = '';
											} ?>
											<button class="button remove_image" id="remove_site_fav_icon" style="display: <?php echo $remove_site_fav_icon;?>"><?php _e('Remove', 'trackfree-woocommerce-tracking');?></button>
											<a href="#" class="tf-uploader button" id="change_site_fav_icon" style="display: <?php echo $change_site_fav_icon;?>"><?php _e('Change site icon', 'trackfree-woocommerce-tracking');?></a>
											<a href="#" class="tf-uploader button" id="upload_site_fav_icon" style="display: <?php echo $upload_site_fav_icon;?>"><?php _e('Select site icon', 'trackfree-woocommerce-tracking');?></a>
											<div class="trackfree-description trackfree-margin-top-5"><?php _e('Site Icons are what you see in browser tabs, bookmark bars.', 'trackfree-woocommerce-tracking');?></div>
											<input type="hidden" class="tf_uploads" id="site_fav_icon" name="site_fav_icon"/>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td><strong><?php _e('Tracking page banner', 'trackfree-woocommerce-tracking');?></strong></td>
								<td>
									<div class="tf-img-uploader" id="tf_site_banner">
										<?php if ($response_data['site_banner']) {
											$remove_site_banner = '';
											$change_site_banner = '';
											$upload_site_banner = 'none';
											?>
											<div class="show_image" id="img_site_banner" style="margin: 10px 0;"><img src="<?php echo $response_data['site_banner'];?>"/></div>
											<?php
										} else {
											$remove_site_banner = 'none';
											$change_site_banner = 'none';
											$upload_site_banner = '';
										} ?>
										<button class="button remove_image" id="remove_site_banner" style="display: <?php echo $remove_site_banner;?>"><?php _e('Remove', 'trackfree-woocommerce-tracking');?></button>
										<a href="#" class="tf-uploader button" id="change_site_banner" style="display: <?php echo $change_site_banner;?>"><?php _e('Change banner', 'trackfree-woocommerce-tracking');?></a>
										<a href="#" class="tf-uploader button" id="upload_site_banner" style="display: <?php echo $upload_site_banner;?>"><?php _e('Select banner', 'trackfree-woocommerce-tracking');?></a>
										<div class="trackfree-description trackfree-margin-top-5"><?php _e('Suggested image dimensions', 'trackfree-woocommerce-tracking');?>: 310 by 120 pixels.
										<br/>
										Works only with Pro theme.
										</div>
										<input type="hidden" class="tf_uploads" id="site_banner" name="site_banner"/>
									</div>
								</td>
							</tr>
							<tr id="banner_link_container" <?php if ($response_data['site_banner'] == '') { ?> style="display:none;" <?php } ?>>
								<td><strong><?php _e('Tracking page banner url', 'trackfree-woocommerce-tracking');?></strong></td>
								<td>
									<input name="trackfree_banner_url" id="trackfree_banner_url" value="<?php echo $response_data['site_banner_link'] ? $response_data['site_banner_link'] : get_option('siteurl'); ?>" class="regular-text" type="text">&nbsp;&nbsp;
									<input type="button" class="button" value="<?php _e('Save', 'trackfree-woocommerce-tracking');?>" id="save_banner_url">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both";>&nbsp;</div>
</div>

<!--- Email page settings S-->
<div id="track-free-main-box1" class="trackfree-main-box">
	<div style="float: left;width: 30%">
		<h2><?php _e('Email Settings', 'trackfree-woocommerce-tracking');?></h2>
	</div>
	<div style="float: right;width: 70%;">
		<div id="dashboard_right_now" class="postbox ">
			<div class="inside">
				<div class="main">
					<form method="post" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>">
					<h2 style="font-size: 1.3em; margin: 1em 0;"><?php _e('Email sender options', 'trackfree-woocommerce-tracking');?></h2>
						<table class="form-table">
							<tbody>
								<tr>
									<th scope="row"><label for="blogname"><?php _e('"From" name', 'trackfree-woocommerce-tracking');?></label></th>
									<td>
										<img title="<?php _e('How the sender name appears in outgoing TrackFree emails.', 'trackfree-woocommerce-tracking');?>" src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/info-icon.png'); ?>"/>
									</td>
									<td>
										<input type="text" name="trackfree_sender_name" id="trackfree_sender_name" value="<?php echo $response_data['sender_name'];?>"  class="regular-text" />
									</td>
								</tr>
								<tr>
									<th scope="row"><label for="blogname"><?php _e('"From" address', 'trackfree-woocommerce-tracking');?>
									</label>
									</th>
									<td>
										<img title="<?php _e('How the sender email appears in outgoing TrackFree emails.', 'trackfree-woocommerce-tracking');?>" src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/info-icon.png'); ?>"/>
									</td>
									<td>
										<input type="text" name="trackfree_sender_email" id="trackfree_sender_email" value="<?php echo $response_data['sender_email'];?>" class="regular-text" />
									</td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" value="true" name="email_sender_options" />
						<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
						<?php
						submit_button();
						?>
					</form>
					<div class="trackfree-line-border"></div>
					<h2 style="font-size: 1.3em; margin: 1em 0;"><?php _e('Email notifications', 'trackfree-woocommerce-tracking');?></h2>
                    <p style="margin-bottom:20px;">Email notifications sent from TrackFree are listed below.</p>
					<form method="post" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>">
						<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th scope="row"><label for="content-email"><strong><?php _e('Email type', 'trackfree-woocommerce-tracking');?></strong></label></th>
									<th scope="row"><label for="content-action"><strong><?php _e('Action', 'trackfree-woocommerce-tracking');?></strong></label></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row"><label for="content-email"><?php _e('New Shipment Notification', 'trackfree-woocommerce-tracking');?> &nbsp;&nbsp;<img title="<?php _e('New shipment notification emails are sent to customer on addition of new tracking number.', 'trackfree-woocommerce-tracking');?>" src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/info-icon.png'); ?>"/></label></th>
									<td><button name="trackfree_send_mail" class="button" type="submit" value="add-shipment"><?php _e('Send Test Mail', 'trackfree-woocommerce-tracking');?></button></td>
								</tr>
								<tr>
									<th scope="row"><label for="content-email"><?php _e('Shipment Delivery - Success Notification', 'trackfree-woocommerce-tracking');?> &nbsp;&nbsp;<img title="<?php _e('Success delivery notification emails are sent to customer on successful delivery of shipment.', 'trackfree-woocommerce-tracking');?>" src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/info-icon.png'); ?>"/></label></th>
									<td><button name="trackfree_send_mail" class="button" type="submit" value="shipment-delivery"><?php _e('Send Test Mail', 'trackfree-woocommerce-tracking');?></button></td>
								</tr>
								<tr>
									<th scope="row"><label for="content-email"><?php _e('Shipment Delivery - Failed Notification', 'trackfree-woocommerce-tracking');?> &nbsp;&nbsp;<img title="<?php _e('Failed delivery notification emails are sent to customer when the delivery of shipment could not be completed.', 'trackfree-woocommerce-tracking');?>" src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/info-icon.png'); ?>"/></label></th>
									<td><button name="trackfree_send_mail" class="button" type="submit" value="shipment-issue"><?php _e('Send Test Mail', 'trackfree-woocommerce-tracking');?></button></td>
								</tr>
								<tr>
									<th scope="row"><label for="content-email"><?php _e('Shipment Feedback Notification', 'trackfree-woocommerce-tracking');?> &nbsp;&nbsp;<img title="<?php _e('Feedback emails are sent to customer when the delivery has been successfully completed.', 'trackfree-woocommerce-tracking');?>" src="<?php echo plugins_url('trackfree-woocommerce-tracking/assets/images/info-icon.png'); ?>"/></label></th>
									<td>
										<button name="trackfree_send_mail" class="button" type="submit" value="shipment-feedback"><?php _e('Send Test Mail', 'trackfree-woocommerce-tracking');?></button>
									</td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" value="true" name="trackfree_test_mail" />
						<input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both";>&nbsp;</div>
</div>

<div id="track-free-main-box1" class="trackfree-main-box">
	<div style="float: left;width: 30%">
	    <h2><?php _e('Custom Script', 'trackfree-woocommerce-tracking');?></h2>
	</div>
	<div style="float: right;width: 70%;">
	    <div id="dashboard_right_now" class="postbox ">
	        <div class="inside">
	            <div class="main">
	                <form method="post" action="<?php echo admin_url('admin.php?page=trackfree-setting');?>">
	                    <table class="form-table">
	                        <tbody>
	                            <tr>
	                                <td>
	                                    <textarea name="footer_script" id="footer_script" cols="70" rows="20"><?php echo stripslashes($response_data['footer_script']);?></textarea>
	                                    <script>
	                                        var editor = CodeMirror.fromTextArea(document.getElementById("footer_script"), {
	                                            lineNumbers: true,
	                                            mode: "javascript",
	                                            matchBrackets: true,
	                                            continueComments: "Enter",
	                                            extraKeys: {"Ctrl-Q": "toggleComment"}
	                                        });
	                                  </script>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                    <input type="hidden" value="true" name="trackfree_footer_script" />
	                    <input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
	                    <?php
	                    submit_button();
	                    ?>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	<div style="clear: both";>&nbsp;</div>
</div>
