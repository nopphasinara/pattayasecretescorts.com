<!DOCTYPE html>
<html lang="<?php echo $sysLang; ?>">
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="<?php echo $robots; ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width" />
		<!--<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=no;" />-->
		<meta name="MobileOptimized" content="width" />
		<meta name="HandheldFriendly" content="true" />
		<title><?php echo $tagTitle; ?></title>
		<meta name="description" content="<?php echo $tagDescription; ?>" />
		<meta name="keywords" content="<?php echo $tagKeywords; ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="<?php echo $cf->get('siteName'); ?>" />
		<meta property="og:title" content="<?php echo $tagTitle; ?>" />
		<meta property="og:description" content="<?php echo $tagDescription; ?>" />
		<meta property="og:url" content="<?php echo $tagUrl; ?>" />
		<meta property="og:image" content="<?php echo $tagImage; ?>" />
		<meta property="og:updated_time" content="<?php echo date('Y-m-d H:i:s', $requestTime); ?>" />
		<!--<link rel="icon" href="favicon.ico" type="image/x-icon">-->
		<link rel="stylesheet" type="text/css" href="<?php echo $fullUrl; ?>css/main.css" />
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo $fullUrl; ?>css/ie7.css" /><![endif]-->
		<link href='https://fonts.googleapis.com/css?family=Oswald:700,400' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="<?php echo $fullUrl; ?>script/intlib-min.js"></script>
		<script type="text/javascript" src="<?php echo $fullUrl; ?>script/common.js"></script>
		<script type="text/javascript" src="<?php echo $fullUrl; ?>script/jquery.form.js"></script>
		<script type="text/javascript">
			function scrollToElement(element) {
				$('html, body').animate({
					scrollTop: $(element).offset().top
				}, 320);
			}

			function isNumberKey(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode;
				if(charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				} else {
					return true;
				}
			}

			$(document).ready(function(){
				$('.form_response').live('click', function(){
					$(this).html('').hide();
				});

				var options = {
					target: '.form_response'
					//beforeSubmit: confirmDelete
				};

				$('form').submit(function() {
					var form_id = $(this).attr('id');
					if(form_id == 'form_delete') {
						var check_con = confirmDelete();
						if(check_con) {
							// pass through
						} else {
							return false;
						}
					}

					var use_ajax = $(this).attr('use-ajax');
					if(typeof use_ajax == 'undefined' || use_ajax == '' || use_ajax == 'no') {
						document.getElementById(form_id).submit();
						return false;
					}
					$('.form_response').html('').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('hidden');
					$('.input').removeAttr('style');
					$('.input_response').html('').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('hidden');

					$('#'+form_id+' .form_response').html('Loading information...').removeClass('text_red').removeClass('text_green').addClass('text_hint').removeClass('hidden');

					$('#'+form_id+' .input.required').each(function(){
						var input_name = $(this).attr('name');
						var input_value = $(this).val();
						var false_empty = $(this).attr('false-empty');
						var false_reset = $(this).attr('false-reset');

						if(input_value == '') {
							$(this).attr('style', 'border-color: #e04a31;');
							$('#'+form_id+' .input_response[input-name="'+input_name+'"]').html(false_empty).addClass('text_red').removeClass('hidden');
						}
					});

					$(this).ajaxSubmit(options);

					return false;
				});

				$('.button_submit a[data-type="submit"]').live('click', function(){
					var data_id = $(this).attr('data-id');
					$('#'+data_id+'').submit();
				});

				<?php
					if(isset($_SESSION['form_response']) && !empty($_SESSION['form_response'])) {
						$_SESSION['form_id'] = (empty($_SESSION['form_id'])) ? 'form_default' : $_SESSION['form_id'];
						$_SESSION['response'] = (empty($_SESSION['response'])) ? 'text_red' : $_SESSION['response'];
						?>
							$('.form_response').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('hidden');
							$('#<?php echo $_SESSION['form_id']; ?> .form_response').html('<?php echo $_SESSION['form_response']; ?>').removeClass('text_red').removeClass('text_green').removeClass('text_hint').addClass('<?php echo $_SESSION['response']; ?>').removeClass('hidden');
						<?php
					}
				?>
			});
		</script>
		<?php
			if($script['jquery_ui'] == 'yes') {
				?>
					<link rel="stylesheet" href="<?php echo $fullUrl; ?>jquery-ui/jquery-ui.min.css">
					<script src="<?php echo $fullUrl; ?>jquery-ui/jquery-ui.min.js"></script>
					<script type="text/javascript">
						$( ".datepicker" ).live('hover', function(){
							$( ".datepicker" ).datepicker({
								showButtonPanel: false,
								numberOfMonths: 2,
								minDate: '0',
								hideIfNoPrevNext: true,
								duration: '',
								//showOtherMonths: false,
								//selectOtherMonths: false,
								dateFormat: 'yy-mm-dd'
								//changeMonth: false,
								//changeYear: true
							});
						});
					</script>
				<?php
			}

			if($script['fancybox'] == 'yes') {
				?>
					<!-- Add mousewheel plugin (this is optional) -->
					<script type="text/javascript" src="<?php echo $fullUrl; ?>fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

					<!-- Add fancyBox -->
					<link rel="stylesheet" href="<?php echo $fullUrl; ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
					<script type="text/javascript" src="<?php echo $fullUrl; ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

					<!-- Optionally add helpers - button, thumbnail and/or media -->
					<link rel="stylesheet" href="<?php echo $fullUrl; ?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
					<script type="text/javascript" src="<?php echo $fullUrl; ?>/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
					<script type="text/javascript" src="<?php echo $fullUrl; ?>/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

					<link rel="stylesheet" href="<?php echo $fullUrl; ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
					<script type="text/javascript" src="<?php echo $fullUrl; ?>/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

					<script type="text/javascript">
						$(document).ready(function() {
							$(".fancybox").fancybox({
								minHeight: 480,
								maxHeight: 480,
								padding: 0,
								helpers: {
									overlay: {
										locked: true,
										css: {
											'background' : 'rgba(255, 217, 2, 0.70)'
										}
									},
									title: {
										type: 'outside'
									},
									thumbs: {
										width: 80,
										height: 80
									}
							    }
							});
						});
					</script>
				<?php
			}
		?>
	</head>
	<body class="<?php echo $body_class; ?>">
		<script type="text/javascript">
			var _gaq = _gaq || [];
			var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
			_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
			_gaq.push(['_setAccount', 'UA-78175277-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
