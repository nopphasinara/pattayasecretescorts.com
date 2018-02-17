<div id="e_book_now" class="mt-5">
  <?php
  switch (strtolower($sysLang)) {
    case 'ar':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="إحجز الآن">
        <i class="mr-2 fas fa-mouse-pointer"></i> إحجز الآن
      </a><?php
      break;
    case 'cn':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="现在预订">
        <i class="mr-2 fas fa-mouse-pointer"></i> 现在预订
      </a><?php
      break;
    case 'es':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="Apártala Ahora">
        <i class="mr-2 fas fa-mouse-pointer"></i> Apártala Ahora
      </a><?php
      break;
    case 'fr':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="RÉSERVEZ MAINTENANT">
        <i class="mr-2 fas fa-mouse-pointer"></i> RÉSERVEZ MAINTENANT
      </a><?php
      break;
    case 'ge':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="JETZT BUCHEN">
        <i class="mr-2 fas fa-mouse-pointer"></i> JETZT BUCHEN
      </a><?php
      break;
    case 'it':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="PRENOTA ORA">
        <i class="mr-2 fas fa-mouse-pointer"></i> PRENOTA ORA
      </a><?php
      break;
    case 'jp':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="いますぐ予約する">
        <i class="mr-2 fas fa-mouse-pointer"></i> いますぐ予約する
      </a><?php
      break;
    case 'kr':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="지금 예약하세요">
        <i class="mr-2 fas fa-mouse-pointer"></i> 지금 예약하세요
      </a><?php
      break;
    case 'ru':
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="ЗАБРОНИРОВАТЬ СЕЙЧАС">
        <i class="mr-2 fas fa-mouse-pointer"></i> ЗАБРОНИРОВАТЬ СЕЙЧАС
      </a><?php
      break;
    default:
      ?><a role="button" class="btn btn-primary oswald text-uppercase text-xl px-4" href="<?php echo $fullUrl.$sysLang.'/booking-form.html?1st_choice='.$xss['id'].''; ?>" title="Book">
        <i class="mr-2 fas fa-mouse-pointer"></i> BOOK NOW
      </a><?php
      break;
  }
  ?>
</div>
