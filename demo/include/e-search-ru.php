<div id="e_search" class="fixed_ru">
	<form action="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" method="get" id="form_search">
		<input type="hidden" name="mode" value="search" />
		<input type="hidden" name="form_id" value="form_search" />
		<div class="form_response hidden"><?php echo $_SESSION['form_response']; ?></div>
		<div class="form_item">
			<div class="label inline">
				<strong>Ключевые слова</strong>
			</div><!--
			--><div class="give_break10 inline">
				<input type="text" name="keyword" value="<?php echo $xss['keyword']; ?>" class="input" />
			</div><!--
			--><div class="inline">
				<div class="button_submit one inline"><a href="javascript:;" title="Поиск" data-type="submit" data-id="form_search"><strong>Поиск</strong></a></div>
			</div>
		</div>
		<div class="form_item">
			<div class="label inline">
				&nbsp;
			</div><!--
			--><div class="inline">
				<div class="button_submit two inline"><a href="javascript:;" title="Показать дополнительные опции" data-type="link" class="show_anvance"><strong>Показать дополнительные опции</strong></a></div>
			</div>
		</div>
		<div id="advance_option" class="<?php echo $option_hidden; ?>">
			<div class="form_item">
				<div class="label inline">&nbsp;</div><!--
				--><div class="inline">
					<div class="give_space10"><h3><strong>Дополнительные опции</strong></h3></div>
					<div class="text_yellow give_space10">Все услуги подлежат личной гигиене</div>
					<div class="list_options">
						<div class="item inline last_row">
							<?php
								$db->connect();
								$receives = $db->select(" select * from ".$prefix."services where status = 'enable' and receives = 'yes' order by name_".$sysLang." asc ");
								$db->close();
								if(!$receives) {

								} else {
									$total_item = count($receives);
									for($i = 0; $i < $total_item; $i++) {
										$checked = (in_array($receives[$i]['id'], $xss['receives'])) ? 'checked' : '';
										echo '<div class="give_space5"><input type="checkbox" name="receives[]" value="'.$receives[$i]['id'].'" '.$checked.' /> Даёт: '.$receives[$i]['name_'.$sysLang.''].'</div>';
									}
								}
							?>
						</div><!--
						--><div class="item inline last last_row">
							<?php
								$db->connect();
								$offers = $db->select(" select * from ".$prefix."services where status = 'enable' and offers = 'yes' order by name_".$sysLang." asc ");
								$db->close();
								if(!$offers) {

								} else {
									$total_item = count($offers);
									for($i = 0; $i < $total_item; $i++) {
										$checked = (in_array($offers[$i]['id'], $xss['offers'])) ? 'checked' : '';
										echo '<div class="give_space5"><input type="checkbox" name="offers[]" value="'.$offers[$i]['id'].'" '.$checked.' /> Делает: '.$offers[$i]['name_'.$sysLang.''].'</div>';
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
