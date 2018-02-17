<div id="e_search">
	<form action="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" method="get" id="form_search">
		<input type="hidden" name="mode" value="search" />
		<input type="hidden" name="form_id" value="form_search" />
		<div class="form_response"><?php echo $_SESSION['form_response']; ?></div>
		<div class="form_item">
			<div class="label inline">
				<strong>Keywords</strong>
			</div><!--
			--><div class="give_break10 inline">
				<input type="text" name="keyword" value="" class="input" />
			</div><!--
			--><div class="inline">
				<div class="button_submit one inline"><a href="javascript:;" title="" data-type="submit" data-id="form_search"><strong>Search</strong></a></div>
			</div>
		</div>
		<div id="advance_option" class="hidden">
			<div class="form_item">
				<div class="label inline">&nbsp;</div><!--
				--><div class="right_col inline">
					<strong>Advance Option:</strong>
				</div>
			</div>
			<div class="form_item">
				<div class="label inline">&nbsp;</div><!--
				--><div class="right_col inline text_yellow">
					* All service subject to appropriate personal hygiene
				</div>
			</div>
			<div class="form_item last">
				<div class="label inline">&nbsp;</div><!--
				--><div class="inline">
					<div class="list_options">
						<?php
							$ceil_row = ceil(23 / 2);
							$row = 0;
							$n = 1;
							for($i = 1; $i <= 23; $i++) {
								$last = ($n == 2) ? 'last' : '';
								$row = ($n == 1) ? ($row + 1) : $row;
								$last_row = ($row == $ceil_row) ? 'last_row' : '';
								echo '<div class="item inline '.$last.' '.$last_row.'">
									<input type="checkbox" name="option[]" value="" /> Receives: Option '.$i.'
								</div>';
								$n = $n + 1;
								$n = ($n > 2) ? 1 : $n;
							}
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="button_advance">
			<div class="button_submit two inline"><a href="javascript:;" title="" data-type="link" class="show_anvance"><strong>Show advance option</strong></a></div>
		</div>
	</form>
</div>
