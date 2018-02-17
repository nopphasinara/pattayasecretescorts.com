<?php
	class Page {
		function genLink() {
			global $total_record;
			global $cur_page;
			global $total_page;
			global $script_link;
			global $start_id;
			global $end_id;
			global $limit;

			if(!empty($total_record)) {
				$prev_page = (($cur_page - 1) <= 1) ? 1 : ($cur_page - 1);
				$next_page = (($cur_page + 1) >= $total_page) ? $total_page : ($cur_page + 1);

				$option = '';
				for($i = 1; $i <= $total_page; $i++) {
					$option .= '<option value="'.$i.'">'.$i.'</option>';
				}

				$show_from = $start_id + 1;
				$show_to = ($cur_page == $total_page) ? $total_record : $start_id + $limit;

				echo '<div id="e_page">';
				echo '<div class="item_count inline">Showing '.$show_from.' to '.$show_to.' from total '.number_format($total_record, 0, '', ',').' items</div><!---->	';

				if($total_page > 1 && $cur_page != 1) {
					echo '<div class="first_page button inline"><a href="'.$script_link.'&page=1" title=""><strong>First</strong></a></div><!---->';
					echo '<div class="prev_page button inline"><a href="'.$script_link.'&page='.$prev_page.'" title=""><strong>Prev</strong></a></div><!---->';
				}

				echo '<div class="go_page button inline"><select name="go_page" class="select_page input" data-link="'.$script_link.'" data-check="'.$cur_page.'">'.$option.'</select> of '.number_format($total_page, 0, '', ',').'</div><!---->';

				if($total_page > 1 && $cur_page != $total_page) {
					echo '<div class="next_page button inline"><a href="'.$script_link.'&page='.$next_page.'" title=""><strong>Next</strong></a></div><!---->';
					echo '<div class="last_page button inline"><a href="'.$script_link.'&page='.$total_page.'" title=""><strong>Last</strong></a></div>';
				}

				echo '</div>';
			}
		}
	}

	$pg = new Page();
?>
