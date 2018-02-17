<div id="e_book_now">
	<div class="fix_button big oswald">
		<div class="left inline">&nbsp;</div><!--
		--><div class="body inline">
      <?php
      switch (strtolower($sysLang)) {
        case 'ar':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="إحجز الآن"><span class="text_white">إحجز الآن</span></a><?php
          break;
        case 'cn':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="现在预订">现在预订</a><?php
          break;
        case 'es':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="Apártala Ahora">Apártala <span class="text_white">Ahora</span></a><?php
          break;
        case 'fr':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="RÉSERVEZ MAINTENANT">RÉSERVEZ <span class="text_white">MAINTENANT</span></a><?php
          break;
        case 'ge':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="JETZT BUCHEN">JETZT <span class="text_white">BUCHEN</span></a><?php
          break;
        case 'it':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="PRENOTA ORA">PRENOTA <span class="text_white">ORA</span></a><?php
          break;
        case 'jp':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="いますぐ予約する"><span class="text_white">いますぐ予約する</span></a><?php
          break;
        case 'kr':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="지금 예약하세요">지금 예약하세요</a><?php
          break;
        case 'ru':
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="ЗАБРОНИРОВАТЬ СЕЙЧАС">ЗАБРОНИРОВАТЬ <span class="text_white">СЕЙЧАС</span></a><?php
          break;
        default:
          ?><a href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="Book Now">Book <span class="text_white">Now</span></a><?php
          break;
      }
      ?>
		</div><!--
		--><div class="right inline">&nbsp;</div>
	</div>
</div>
