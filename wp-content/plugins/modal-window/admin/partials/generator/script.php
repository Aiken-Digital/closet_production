<?php
	$id = $val->id;	
	$animationOpen = !empty($param['window_animate']) ? $param['window_animate'] : 'no';
	$animationClose = !empty($param['window_animate_out']) ? $param['window_animate_out'] : 'no';
	$animationSpeedOpen = !empty($param['speed_window']) ? $param['speed_window'] : '400';
	$animationSpeedClose = !empty($param['speed_window_out']) ? $param['speed_window_out'] : '400';
	$modalOverlay = !empty($param['include_overlay']) ? 'true' : 'true';
	$modalAction = !empty($param['modal_show']) ? $param['modal_show'] : 'load';
	if ($modalAction == 'hoverid' || $modalAction == 'hoveranchor'){
		$modalAction = 'hover';
	}
	$modalScrollDistance = !empty($param['reach_window']) ? $param['reach_window'] : '50';
	$delayModalWindow = !empty($param['modal_timer']) ? $param['modal_timer'] : '0';
	$delayCloseButton = !empty($param['close_delay']) ? $param['close_delay'] : '0';	
	$closeESC = !empty($param['close_button_esc']) ? 'true' : 'false';
	$closeOverlay = !empty($param['close_button_overlay']) ? 'true' : 'false';
	$videoSupport = !empty($param['video_support']) ? 'true' : 'false';
	$videoAutoPlay = !empty($param['video_autoplay']) ? 'true' : 'false';
	$videoStopOnClose = !empty($param['video_close']) ? 'true' : 'false';	
	$windowMaxInclude = !empty($param['include_more_screen']) ? 'true' : 'false';
	$windowMaxWidth = !empty($param['screen_more']) ? $param['screen_more'] : '1024';
	$windowMinInclude = !empty($param['include_mobile']) ? 'true' : 'false';
	$windowMixWidth = !empty($param['screen']) ? $param['screen'] : '480';
	$buttonAnimationEnable = (!empty($param['button_animate']) && $param['button_animate'] !== 'no')  ? 'true' : 'false';
	
	$buttonAnimationTime = !empty($param['button_animate_time']) ? $param['button_animate_time'] : '5';
	$buttonAnimation = !empty($param['button_animate']) ? $param['button_animate'] : 'flash';
	$cookieDays = !empty($param['modal_cookies']) ? $param['modal_cookies'] : '1';
	$setCookie = (!empty($param['use_cookies']) && $param['use_cookies'] == 'yes') ? 'true' : 'false';	
	
	if ($param['umodal_button_position'] == 'wow_modal_button_right'){
		$buttonPosition = 'right';
	}
	else if ($param['umodal_button_position'] == 'wow_modal_button_left'){
		$buttonPosition = 'left';
	}
	else {
		$buttonPosition = '';
	}		
	$closeButtonRemove = !empty($param['close_button_remove']) ? 'true' : 'false';
	$closeModalAuto = !empty($param['modal_auto_close']) ? 'true' : 'false';
	$closeModalAutoDelay = !empty($param['auto_close_delay']) ? $param['auto_close_delay'] : '5';
	
?>
jQuery(document).ready(function() {
	jQuery('#wow-modal-overlay-<?php echo $id;?>').ModalWindow({		
		animationOpen: '<?php echo $animationOpen;?>',
		animationClose: '<?php echo $animationClose;?>',
		animationSpeedOpen: '<?php echo $animationSpeedOpen;?>',
		animationSpeedClose: '<?php echo $animationSpeedClose;?>',
		modalOverlay: <?php echo $modalOverlay;?>,
		modalAction: '<?php echo $modalAction;?>',
		modalScrollDistance: <?php echo $modalScrollDistance;?>,
		delayModalWindow: <?php echo $delayModalWindow;?>,
		delayCloseButton: <?php echo $delayCloseButton;?>,	
		closeButtonRemove: <?php echo $closeButtonRemove;?>,
		closeModalAuto: <?php echo $closeModalAuto;?>,
		closeModalAutoDelay: <?php echo $closeModalAutoDelay;?>,
		closeESC: <?php echo $closeESC;?>,
		closeOverlay: <?php echo $closeOverlay;?>,		
		videoSupport: <?php echo $videoSupport;?>,
		videoAutoPlay: <?php echo $videoAutoPlay;?>,
		videoStopOnClose: <?php echo $videoStopOnClose;?>,		
		windowMaxInclude: <?php echo $windowMaxInclude;?>,
		windowMaxWidth: '<?php echo $windowMaxWidth;?>',
		windowMinInclude: <?php echo $windowMinInclude;?>,
		windowMixWidth: '<?php echo $windowMixWidth;?>',	
		buttonAnimationEnable: <?php echo $buttonAnimationEnable;?>,
		buttonPosition: '<?php echo $buttonPosition;?>',
		buttonId: 'wow-modal-botton-<?php echo $id;?>',
		buttonAnimationTime: '<?php echo $buttonAnimationTime;?>',
		buttonAnimation: '<?php echo $buttonAnimation;?>',	
		buttonAnimationClass: 'wow-animated-<?php echo $id;?>',
		openIdModalWindow: 'wow-modal-id-<?php echo $id;?>',
		closeIdModalWindow: 'wow-modal-close-<?php echo $id;?>',
		closeButtonModalWindow: 'wow-button-close-<?php echo $id;?>',		
		setCookie: <?php echo $setCookie;?>,
		cookieDays: <?php echo $cookieDays;?>,
		cookieName: 'wow-modal-id-<?php echo $id;?>',
	})
});