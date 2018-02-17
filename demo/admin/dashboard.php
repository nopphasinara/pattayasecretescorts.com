<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin();
	
	$menu['dashboard'] = 'active';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Dashboard</h1>
		<div>
			1. Do not autosave your password in browser is not computer is on a public area.<br />
			2. If you are not in front of your computer please logout first.<br />
			3. If you have some problem please contact your System Administrator.<br />
			4. Don't share your username and password to anyone.
		</div>
		
		<div>&nbsp;</div><div>&nbsp;</div>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			function drawcharts() {
				var data1 = google.visualization.arrayToDataTable([
					['Nickname', 'Views'],
					<?php
						$db->connect();
						$profile = $db->select(" select nickname, _view from ".$prefix."profiles where status = 'enable' order by _view desc limit 0, 10 ");
						$db->close();
						if(!$profile) {

						} else {
							$total_item = count($profile);
							for($i = 0; $i < $total_item; $i++) {
								echo '[\''.addslashes($profile[$i]['nickname']).'\', '.$profile[$i]['_view'].']';
								if($i != ($total_item - 1)) { echo ','; }
							}
						}
					?>
				]);
				
				var data2 = google.visualization.arrayToDataTable([
					['Nickname', 'Bookings'],
					<?php
						$db->connect();
						$profile = $db->select(" select nickname, _booking from ".$prefix."profiles where status = 'enable' order by _booking desc limit 0, 10 ");
						$db->close();
						if(!$profile) {

						} else {
							$total_item = count($profile);
							for($i = 0; $i < $total_item; $i++) {
								echo '[\''.addslashes($profile[$i]['nickname']).'\', '.$profile[$i]['_booking'].']';
								if($i != ($total_item - 1)) { echo ','; }
							}
						}
					?>
				]);
				
				var data3 = google.visualization.arrayToDataTable([
					['Nickname', 'Reviews'],
					<?php
						$db->connect();
						$profile = $db->select(" select nickname, _review from ".$prefix."profiles where status = 'enable' order by _review desc limit 0, 10 ");
						$db->close();
						//print_r($profile);
						if(!$profile) {

						} else {
							$total_item = count($profile);
							for($i = 0; $i < $total_item; $i++) {
								echo '[\''.addslashes($profile[$i]['nickname']).'\', '.$profile[$i]['_review'].']';
								if($i != ($total_item - 1)) { echo ','; }
							}
						}
					?>
				]);
				
				var data4 = google.visualization.arrayToDataTable([
					['Banner', 'Clicks'],
					<?php
						$db->connect();
						$banner = $db->select(" select name, _click from ".$prefix."banners order by name asc ");
						$db->close();
						if(!$banner) {

						} else {
							$total_item = count($banner);
							for($i = 0; $i < $total_item; $i++) {
								echo '[\''.addslashes($banner[$i]['name']).'\', '.$banner[$i]['_click'].']';
								if($i != ($total_item - 1)) { echo ','; }
							}
						}
					?>
				]);
				
				<?php
					$total_left_click = 0;
					$db->connect();
					$left = $db->select(" select _click from ".$prefix."banners where banner_side = 'left' ");
					$db->close();
					if(!$left) {

					} else {
						$total_item = count($left);
						for($i = 0; $i < $total_item; $i++) {
							$total_left_click = $total_left_click + $left[$i]['_click'];
						}
					}
					$left = '';

					$total_right_click = 0;
					$db->connect();
					$right = $db->select(" select _click from ".$prefix."banners where banner_side = 'right' ");
					$db->close();
					if(!$right) {

					} else {
						$total_item = count($right);
						for($i = 0; $i < $total_item; $i++) {
							$total_right_click = $total_right_click + $right[$i]['_click'];
						}
					}
					$right = '';
				?>
				var data5 = google.visualization.arrayToDataTable([
					['Location', 'Clicks'],
					['Left', <?php echo $total_left_click; ?>],
					['Right', <?php echo $total_right_click; ?>]
				]);

				var options1 = {
					vAxis: { baselineColor: '#fad902', gridlines: { color: '#fad902', count: 5 }, textStyle: { color: '#fad902' } },
					hAxis: { baselineColor: 'red', gridlines: { color: '#b71300', count: -1 }, textStyle: { color: '#fff' } },
					backgroundColor: '#121210',
					title: 'View: Top 10',
					titleTextStyle: { color: '#fff' },
					legend: { textStyle: { color: '#fff' } }
				};
				
				var options2 = {
					vAxis: { baselineColor: '#fad902', gridlines: { color: '#fad902', count: 5 }, textStyle: { color: '#fad902' } },
					hAxis: { baselineColor: 'red', gridlines: { color: '#b71300', count: -1 }, textStyle: { color: '#fff' } },
					backgroundColor: '#121210',
					title: 'Booking: Top 10',
					titleTextStyle: { color: '#fff' },
					legend: { textStyle: { color: '#fff' } }
				};
				
				var options3 = {
					vAxis: { baselineColor: '#fad902', gridlines: { color: '#fad902', count: 5 }, textStyle: { color: '#fad902' } },
					hAxis: { baselineColor: 'red', gridlines: { color: '#b71300', count: -1 }, textStyle: { color: '#fff' } },
					backgroundColor: '#121210',
					title: 'Review: Top 10',
					titleTextStyle: { color: '#fff' },
					legend: { textStyle: { color: '#fff' } }
				};
				
				var options4 = {
					vAxis: { baselineColor: '#fad902', gridlines: { color: '#fad902', count: 5 }, textStyle: { color: '#fad902' } },
					hAxis: { baselineColor: 'red', gridlines: { color: '#b71300', count: -1 }, textStyle: { color: '#fff' } },
					backgroundColor: '#121210',
					title: 'Banner Summary',
					titleTextStyle: { color: '#fff' },
					legend: { textStyle: { color: '#fff' } }
				};

				var options5 = {
					vAxis: { baselineColor: '#fad902', gridlines: { color: '#fad902', count: 5 }, textStyle: { color: '#fad902' } },
					hAxis: { baselineColor: 'red', gridlines: { color: '#b71300', count: -1 }, textStyle: { color: '#fff' } },
					backgroundColor: '#121210',
					title: 'Location Clicked',
					titleTextStyle: { color: '#fff' },
					legend: { textStyle: { color: '#fff' } }
				};
				
				var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_view'));
				chart1.draw(data1, options1);
				
				var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_booking'));
				chart2.draw(data2, options2);
				
				var chart3 = new google.visualization.ColumnChart(document.getElementById('chart_review'));
				chart3.draw(data3, options3);
				
				var chart4 = new google.visualization.ColumnChart(document.getElementById('banner_chart'));
				chart4.draw(data4, options4);
				
				var chart5 = new google.visualization.ColumnChart(document.getElementById('banner_type_chart'));
				chart5.draw(data5, options5);
			}

			google.setOnLoadCallback(drawcharts);
			google.load("visualization", "1", {packages:["corechart"]});
		</script>
		
		<!--profile_chart-->
		<div class="form_item">
			<div class="size6 inline">
				<div id="chart_view" style="width: 776px; height: 386px;"></div>
			</div>
		</div>
		<div class="form_item">
			<div class="size6 inline">
				<div id="chart_booking" style="width: 776px; height: 386px;"></div>
			</div>
		</div>
		<div class="form_item">
			<div class="size6 inline">
				<div id="chart_review" style="width: 776px; height: 386px;"></div>
			</div>
		</div>
		<!--/profile_chart-->

		<!--banner_chart-->
		<div class="form_item">
			<div class="size4 inline give_break10">
				<div id="banner_chart" style="width: 514px; height: 386px;"></div>
			</div><!--
			--><div class="size2 inline">
				<div id="banner_type_chart" style="width: 252px; height: 386px;"></div>
			</div>
		</div>
		<!--/banner_chart-->
	</div>
</div>
<!--/e_content-->

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>