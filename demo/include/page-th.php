<?php
	class Page {
		function genLink() {
			global $total_record, $cur_page, $total_page, $script_link, $order_by_url, $start_id, $end_id, $limit;

			if(!empty($total_record)) {
				$prev_page = (($cur_page - 1) <= 1) ? 1 : ($cur_page - 1);
				$next_page = (($cur_page + 1) >= $total_page) ? $total_page : ($cur_page + 1);

				$option = '';
				for($i = 1; $i <= $total_page; $i++) {
					$selected = ($cur_page == $i) ? 'selected' : '';
					$option .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
				}

				$show_from = $start_id + 1;
				$show_to = ($cur_page == $total_page) ? $total_record : $start_id + $limit;

				echo '<div class="e_page">';
				echo '<div class="item_count inline">กำลังแสดง '.$show_from.' ถึง '.$show_to.' จากทั้งหมด '.number_format($total_record, 0, '', ',').' รายการ</div><!---->	';

				if($total_page > 1 && $cur_page != 1) {
					echo '<div class="first_page button Sinline"><a href="'.$script_link.$order_by_url.'&page=1" title=""><strong>หน้าแรก</strong></a></div><!---->';
					echo '<div class="prev_page button inline"><a href="'.$script_link.$order_by_url.'&page='.$prev_page.'" title=""><strong>ก่อนหน้า</strong></a></div><!---->';
				}

				echo '<div class="go_page button inline"><select name="go_page" class="select_page input" data-link="'.$script_link.$order_by_url.'">'.$option.'</select> จาก '.number_format($total_page, 0, '', ',').' หน้า</div><!---->';

				if($total_page > 1 && $cur_page != $total_page) {
					echo '<div class="next_page button inline"><a href="'.$script_link.$order_by_url.'&page='.$next_page.'" title=""><strong>ถัดไป</strong></a></div><!---->';
					echo '<div class="last_page button inline"><a href="'.$script_link.$order_by_url.'&page='.$total_page.'" title=""><strong>สุดท้าย</strong></a></div>';
				}

				echo '</div>';
			}
		}
	}

	$pg = new Page();
?>
