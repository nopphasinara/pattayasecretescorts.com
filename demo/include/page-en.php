<?php
	class Page {
		function genLink() {
			global $total_record, $cur_page, $total_page, $script_link, $order_by_url, $start_id, $end_id, $limit;

			if(!empty($total_record)) {
				$prev_page = (($cur_page - 1) <= 1) ? 1 : ($cur_page - 1);
				$next_page = (($cur_page + 1) >= $total_page) ? $total_page : ($cur_page + 1);

				$page_items = '';
				$option = '';
				for($i = 1; $i <= $total_page; $i++) {
					$selected = ($cur_page == $i) ? 'selected' : '';
					$active = ($cur_page == $i) ? 'active' : '';
					$option .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
					$page_items .= '<li class="page-item '. $active .'"><a class="page-link" href="'. $script_link.$order_by_url .'&page='. $i .'">'. $i .'</a></li>';
				}

				$show_from = $start_id + 1;
				$show_to = ($cur_page == $total_page) ? $total_record : $start_id + $limit;

				// echo '<div class="e_page">';
				// echo '<div class="item_count inline">Showing '.$show_from.' to '.$show_to.' from total '.number_format($total_record, 0, '', ',').' items</div><!---->	';

				if($total_page > 1 && $cur_page != 1) {
					// echo '<div class="first_page button inline"><a href="'.$script_link.$order_by_url.'&page=1" title=""><strong>First</strong></a></div><!---->';
					// echo '<div class="prev_page button inline"><a href="'.$script_link.$order_by_url.'&page='.$prev_page.'" title=""><strong>Prev</strong></a></div><!---->';
				}

        $prev_disabled = 'disabled';
        $next_disabled = 'disabled';
        if($total_page > 1 && $cur_page != 1) {
          $prev_disabled = '';
				}

        if($total_page > 1 && $cur_page != $total_page) {
          $next_disabled = '';
				}

        ?>
        <nav aria-label="Page Navigation">
          <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $prev_disabled; ?>">
              <a class="page-link" href="<?php echo $script_link.$order_by_url.'&page='.$prev_page; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php echo $page_items; ?>
            <li class="page-item <?php echo $next_disabled; ?>">
              <a class="page-link" href="<?php echo $script_link.$order_by_url.'&page='.$next_page; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
        <?php

				// echo '<div class="go_page button inline form-group"><select name="go_page" class="select_page form-control" data-link="'.$script_link.$order_by_url.'">'.$option.'</select> of '.number_format($total_page, 0, '', ',').' pages</div><!---->';

				if($total_page > 1 && $cur_page != $total_page) {
					// echo '<div class="next_page button inline"><a href="'.$script_link.$order_by_url.'&page='.$next_page.'" title=""><strong>Next</strong></a></div><!---->';
					// echo '<div class="last_page button inline"><a href="'.$script_link.$order_by_url.'&page='.$total_page.'" title=""><strong>Last</strong></a></div>';
				}
			}
		}
	}

	$pg = new Page();
?>
