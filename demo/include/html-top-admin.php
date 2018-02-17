<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width" />
		<!--<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=no;" />-->
		<meta name="MobileOptimized" content="width" />
		<meta name="HandheldFriendly" content="true" />
		<title>Administration</title>
		<meta name="description" content="Administration" />
		<meta name="keywords" content="Administration" />
		<link rel="stylesheet" type="text/css" href="<?php echo $fullUrl; ?>css/admin.css" />
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo $fullUrl; ?>css/ie7.css" /><![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Oswald:700,400' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="<?php echo $fullUrl; ?>script/intlib-min.js"></script>
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
			
			function confirmDelete() {
				var check_con = confirm('Are you sure to delete selected records?');
				if(check_con) {
					return true;
				} else {
					return false;
				}
			}
			
			$(document).ready(function(){
				$('.button_lang a').live('click', function(){
					var data_lang = $(this).attr('data-lang');
					
					$('.button_lang a').removeClass('active');
					$(this).addClass('active');
					
					$('.multi_input').hide();
					$('.multi_input[data-lang="'+data_lang+'"]').fadeIn('fast');
					
					return false;
				});
				
				$('#form_delete .check_all').live('click', function(){
					var value = $(this).val();

					if(value == '') {
						var value = 'check';
					} else {
						var value = '';
					}

					if(value == 'check') {
						$('#form_delete .check_item').each(function(){
							$(this).attr('checked', true);
						});
					} else {
						$('#form_delete .check_item').each(function(){
							$(this).attr('checked', false);
						});
					}

					$(this).attr('value', value);
				});
				
				$('#form_delete .check_item').each(function(){
					$(this).live('click', function(){
						var value = $('#form_delete .check_all').val();
						if(value == 'check') {
							$('#form_delete .check_all').attr('checked', false);
							$('#form_delete .check_all').attr('value', '');
						}
					});
				});
				
				$('.form_response').live('click', function(){
					$(this).html('').addClass('hidden');
				});
				
				$('.required').append(' <strong class="text_red">*</strong>');
					
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
								//showButtonPanel: false,
								//numberOfMonths: 2,
								minDate: '0',
								//hideIfNoPrevNext: true,
								//duration: '',
								showOtherMonths: true,
								selectOtherMonths: true,
								dateFormat: 'yy-mm-dd',
								changeMonth: true,
								changeYear: true
							});
						});
						
						$(function() {
							$('.drag_area').sortable({
								revert: true,
								axis: "y",
								//containment: '#drag_area',
								scroll: false,
								revert: "invalid"
							});
							
							$('.drag_area').disableSelection();
						});
					</script>
				<?php
			}
			
			if($script['ckeditor'] == 'yes') {
				?>
					<!-- ckeditor -->
					<script type="text/javascript" src="<?php echo $fullUrl; ?>ckeditor/ckeditor.js"></script>
					<!-- ckeditor -->
				<?php
			}
		?>
	</head>
	<body class="<?php echo $body_class; ?>">