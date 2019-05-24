<?php
/**
 * Extansion version
 *
 * @package     Wow_Plugin
 * @subpackage
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<style>
	.feature-section.one-col p {
		font-size: 16px;
	}

	.faq-title {
		cursor: pointer;
	}

	.faq-title:before {
		content: "\f132";
		font-family: Dashicons;
		vertical-align: bottom;
		margin-right: 8px;
		color: #e95645;
	}

	.toggleshow:before {
		content: "\f132";
		font-family: Dashicons;
		color: #e95645
	}

	.togglehide:before {
		content: "\f460";
		font-family: Dashicons;
	}

	.item-title {
		margin: 1.25em 0 .6em;
		font-size: 1em;
		line-height: 1;
		color: #1e73be;
	}

	.items .inside {
		margin: 10px 10px 10px 20px;
	}

	.feature-section ul {
		margin-left: 10px;
	}

	.feature-section ul li:before {
		content: "\f147";
		font-family: Dashicons;
		margin-right: 5px;
		color: #e95645
	}

	.wow-btn {
		width: 380px;
		display: inline-block;
		height: 42px;
		background: #43cb83;
		border-radius: 3px;
		line-height: 42px;
		text-align: center;
		color: #fff !important;
		text-decoration: none;
		font-size: 18px;
		font-weight: 500;
		cursor: pointer;
		border: none;
	}

	.wow-btn:hover {
		background: #5cc38d;
	}

	.wow-btn-demo {
		width: 380px;
		display: inline-block;
		height: 42px;
		background: #1f9ef8;
		border-radius: 3px;
		line-height: 42px;
		text-align: center;
		color: #fff !important;
		text-decoration: none;
		font-size: 18px;
		font-weight: 500;
		cursor: pointer;
		border: none;
	}

	.wow-btn-demo:hover {
		background: #128be0;
	}

	.wow-btn .dashicons, .wow-btn-demo .dashicons {
		line-height: 42px;
		font-size: 24px;
	}

</style>

<script>
  jQuery(document).ready(function ($) {
    $('.item-title').children('.faq-title').click(function () {
      var par = $(this).closest('.items');
      $(par).children(".inside").toggle(500);
      if ($(this).hasClass('togglehide')) {
        $(this).removeClass('togglehide');
        $(this).addClass("toggleshow");
        $(this).attr('title', 'Show');
      } else {
        $(this).removeClass('toggleshow');
        $(this).addClass("togglehide");
        $(this).attr('title', 'Hide');
      }
    });
  })
</script>
<div class="about-wrap">
	<div class="feature-section one-col">
		<div class="col">

			<p>GET MORE FEATURES WITH THE PLUGIN EXTENSION.</p>

			<p><a href="<?php echo $this->pro_url; ?>" target="_blank" class="wow-btn">Get Pro Version</a></p>

			<p><a href="https://wow-estore.com/demo/wow-modal-window-pro/" target="_blank" class="wow-btn-demo">Demo Pro
					Version</a></p>

			<p>ADDITIONAL OPTIONS IN PRO VERSION:</p>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Triggers</span>
				</div>
				<div class="inside" style="display: none;">
					<p>The display of the popup depending on user actions.</p>
					<p>A flexible system of display triggers allows you to optimally customize the display of the popup depending
						on user actions:</p>
					<ul>
						<li>after loading the page;</li>
						<li>when clicking on a link or button;</li>
						<li>scroll the window;</li>
						<li>when closing the page.</li>
						<li>when hovering on a link or button;</li>
						<li>when the user right-clicks on a page;</li>
						<li>when the user selects the text on the page.</li>
					</ul>
					<p>Setting the triggers improves the efficiency of modifying the display of modal windows.</p>

				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Animation</span>
				</div>
				<div class="inside" style="display: none;">
					<p>Contains a large set of effects for dynamically displaying the appearance (Animate In) and closing (Animate
						Out) of a pop-up block. They are designed to attract the attention of visitors to a web resource to the
						content of the modal window.</p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Closing Settings</span>
				</div>
				<div class="inside" style="display: none;">
					<p>Close the content and prompt the user to action</p>
					<p>Allows you to completely hide the close button of the pop-up window, set the delay to show the close
						button, or set the timer to auto-close the modal window.</p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Youtube Support</span>
				</div>
				<div class="inside" style="display: none;">
					<p>Set the controller for YouTube video</p>
					<p>Allows you to control Youtube video that is embedded in the content of the popup.</p>
					<p>The main features of the extension are the ability to autoplay video when the popup opening and stop it
						when the popup closing.</p>
					<p>You can insert the Youtube video in popup content via iframe</p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Style setting</span>
				</div>
				<div class="inside" style="display: none;">
					<p>More fine-tuning the style for the modal window and the close button will help create various pop-up blocks
						on the site for any purpose.</p>
				</div>
			</div>


			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">User Target</span>
				</div>
				<div class="inside" style="display: none;">
					<p>You can customize display the item on the page depending on the role of the user who is on the site. You
						can configure targeting for such user groups:</p>
					<ul>
						<li>All users;</li>
						<li>Unauthorized users;</li>
						<li>Authorized users;</li>
						<li>The role of the authorized user on the site;</li>
					</ul>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Multi language</span>
				</div>
				<div class="inside" style="display: none;">
					<p>The condition for display the item depending on the language of the site.</p>
					<p>It is good to use if you have a website in several languages and you need to show different elements for a
						different language.</p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Target to content</span>
				</div>
				<div class="inside" style="display: none;">
					<p>Choose a condition to target your item to specific content or various other segments. You can display the
						item on:</p>
					<ul>
						<li>All posts and pages;</li>
						<li>Only posts;</li>
						<li>Only pages;</li>
						<li>Posts with certain IDs;</li>
						<li>Pages with certain IDs;</li>
						<li>Posts in Categorys with IDs;</li>
						<li>All posts, except;</li>
						<li>All pages, except;</li>
						<li>Taxonomy;</li>
					</ul>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Can be used for</span>
				</div>
				<div class="inside" style="display: none;">
					<ul>
						<li>Information modal windows;</li>
						<li>Facebook messenger;</li>
						<li>Popup with the map;</li>
						<li>Feedback form;</li>
						<li>Float block a with subscription;</li>
						<li>Info-Bar Top or Bottom;</li>
						<li>Interactive widgets;</li>
						<li>Unique user menus;</li>
						<li>Functional popup panels and much more.;</li>
					</ul>
				</div>
			</div>


		</div>
	</div>
</div>