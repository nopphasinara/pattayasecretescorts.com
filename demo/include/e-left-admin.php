<?php $menu[str_replace('-', '_', $page_id)] = 'active'; ?>
<div id="e_left">
	<div class="content_res">
		<h1 class="title oswald">Control <span class="text_yellow">Panel</span></h1>
		<div class="welcome">
			Welcome, <strong class="text_white"><a href="<?php echo $adminUrl.'account.php'; ?>" title=""><?php echo $user_data['name']; ?></a></strong>
			<form action="<?php echo $adminUrl.'index-action.php'; ?>" method="post" id="form_logout" class="inline">
				<input type="hidden" name="mode" value="logout" />
				<input type="hidden" name="form_id" value="form_logout" />
				<div class="button_submit inline"><a href="javascript:;" title="Logout" data-type="submit" data-id="form_logout" class="radius12">Logout</a></div>
			</form>
		</div>
		<div id="e_menu">
			<div class="item">
				<div class="block inline">&nbsp;</div><!--
				--><div class="link inline"><a href="<?php echo $adminUrl.'dashboard.php'; ?>" title="" class="<?php echo $menu['dashboard']; ?>">Dashboard</a></div>
			</div>
			<?php
				if($user_data['level'] == 'system' || $user_data['level'] == 'admin') {
					?>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="users" class="show_sub <?php echo $menu['users']; ?>">User Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="users">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'users.php'; ?>" title="">All Users</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'users-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
						</div>
					<?php
				}
				
				if($user_data['level'] == 'system' || $user_data['level'] == 'admin') {
					?>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="services" class="show_sub <?php echo $menu['services']; ?>">Service Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="services">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'services.php'; ?>" title="">All Services</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'services-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
						</div>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="profiles" class="show_sub <?php echo $menu['profiles']; ?>" sub-id="profiles">Profile Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="profiles">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'profiles.php'; ?>" title="">All Profiles</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'profiles-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
						</div>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="scrolling_texts" class="show_sub <?php echo $menu['scrolling_texts']; ?>" sub-id="scrolling_texts">Text Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="scrolling_texts">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'scrolling-texts.php'; ?>" title="">All Texts</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'scrolling-texts-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'scrolling-texts-order.php'; ?>" title="">Re-Order Texts</a>
							</div>
						</div>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="hotels" class="show_sub <?php echo $menu['hotels']; ?>" sub-id="hotels">Hotel Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="hotels">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'hotels.php'; ?>" title="">All Hotels</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'hotels-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
						</div>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="banners" class="show_sub <?php echo $menu['banners']; ?>" sub-id="banners">Banner Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="banners">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'banners.php'; ?>" title="">All Banners</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'banners-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'banners-order.php'; ?>" title="">Re-Order Banners</a>
							</div>
						</div>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="reviews" class="show_sub <?php echo $menu['reviews']; ?>" sub-id="reviews">Review Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="reviews">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'reviews.php'; ?>" title="">All Reviews</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'reviews-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
						</div>
						<div class="item">
							<div class="block inline">&nbsp;</div><!--
							--><div class="link inline"><a href="javascript:;" title="" sub-id="bookings" class="show_sub <?php echo $menu['bookings']; ?>" sub-id="bookings">Booking Management</a></div>
						</div>
						<div class="sub_menu hidden" sub-id="bookings">
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'bookings.php'; ?>" title="">All Bookings</a>
							</div>
							<div class="sub_item">
								<a href="<?php echo $adminUrl.'bookings-form.php?mode=add'; ?>" title="">Add New</a>
							</div>
						</div>
					<?php
				}
			?>
		</div>
	</div>
</div>
<script>
	$('#e_menu .sub_menu[sub-id="'+$('#e_menu .show_sub.active').attr('sub-id')+'"]').toggle();
	
	$('#e_menu .show_sub').bind('click', function(){
		var sub_id = $(this).attr('sub-id');
		
		if(sub_id == '') {
			alert('No sub menu');
			return false;
		}
		
		$('#e_menu .sub_menu[sub-id!="'+sub_id+'"]').hide();
		$('#e_menu .sub_menu[sub-id="'+sub_id+'"]').toggle();
		
		return false;
	});
</script>