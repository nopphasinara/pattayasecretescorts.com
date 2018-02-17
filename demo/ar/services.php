<?php
	require($fullRoot.'include/html-top.php');
?>
<!--e_top-->
<?php require($fullRoot.'include/e-top-'.$sysLang.'.php'); ?>
<!--/e_top-->

<!--e_menu-->
<?php require($fullRoot.'include/e-menu-'.$sysLang.'.php'); ?>
<!--/e_menu-->

<!--e_slide-->
<?php require($fullRoot.'include/e-slide-'.$sysLang.'.php'); ?>
<!--/e_slide-->

<!--e_wrapper-->
<div id="e_wrapper">
	<div class="content_res">
		<!--e_left-->
		<?php require($fullRoot.'include/e-left-'.$sysLang.'.php'); ?>
		<!--/e_left-->

		<!--e_content-->
		<div id="e_content">
			<h1 class="title text_yellow give_space10" dir="rtl"><strong>الخدمات</strong></h1>
			<h2 class="subtitle text_yellow give_space15" dir="rtl">تخيلوا!</h2>
			<div class="list_normal" dir="rtl">
				<div class="item">يمكنكم إختيار واحدة أو إثنتان أو أي عدد من الفتيات التايلنديات اللواتي تريدون لقضاء ساعتين (أو أكثر) لإشباع رغباتكم حيث تكونون المخرج والبطل لكل ما يحدث.</div>
				<div class="item">كل هذا تتمتعون به في خصوصية غرفتكم في الفندق.</div>
				<div class="item">أحلى الأمنيات التي لطالما تمنيتموها سوف تتحقق.</div>
				<div class="item last">رضاكم مضمون عندنا!</div>
			</div>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15" dir="rtl">كل هذا مقابل سعر ثابت وشامل.</h2>
			<p dir="rtl">لا تضيعوا وقتكم وأموالكم في تايلاند المعروفة وتصابوا بخيبة أمل. زيارة واحدة من إحدي مرافِقات دِفلز دِن بانكوك سيريكم معنى المتعة التيلاندية الأصيلة. </p>
			<div>&nbsp;</div>
			<p dir="rtl">يقدم دِفلز دِن لخدمة المرافِقات في بانكوك تجربة نوعية لكل الرجال والنساء والأزواج الذين يبحثون عن الشغف والمتعة والتي يجب اختبارها ولو مرة في العمر. </p>
			<div>&nbsp;</div>
			<p dir="rtl">نحن في دِفلز دِن لخدمة المرافِقات في بانكوك نلتزم بجعل تجربتكم معنا شيء لا يُنسى لذلك نقدر آراءكم وإقتراحاتكم. يمكنكم مراسلتنا عبر البريد الإلكتروني <?php echo $bookingEmail; ?> إذا كنتم تبحثون عن خدمة معينة ونحن سنحاول قدر الإمكان أن نساعدكم ونرشدكم.</p>
			<div>&nbsp;</div>
			<p dir="rtl">الدرجة الأولى: البعض من مرافِقاتنا يقدمن خدمات ذات درجة أولى. (تطبق الرسوم الإضافية, الرجاء مراجعة صفحة الرسوم لمعرفتها)</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15" dir="rtl">ملابس المرافِقات (اليونيفورم)</h2>
			<p dir="rtl">لدينا العديد من الملابس المثيرة وهي متوفرة دون أي رسوم إضافية وقد تجعل تجربتكم ذكرى أكثر جمالاً.</p>
			<div>&nbsp;</div>
			<div class="list_normal" dir="rtl">
				<div class="item">فتاة المدرسة</div>
				<div class="item">مضيفة جوية</div>
				<div class="item">شرطية</div>
				<div class="item">خادمة فرنسية</div>
				<div class="item">ممرضة مثيرة</div>
				<div class="item last">الجوارب المثيرة</div>
			</div>
			<div>&nbsp;</div>
			<p dir="rtl">يمكنكم أيضاً تأمين اللباس الذي ترغبون به. مرافِقات دِفلز دِن هنا لإرضائكم!</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15" dir="rtl">ة دِفلز دِن بانكوك</h2>
			<p dir="rtl">يمكنكم مراسلتنا عبر البريد الإلكتروني <?php echo $bookingEmail; ?> من خلال الضغط على زر "إحجز الآن" الموجود على كل من الصفحات.</p>
			<div>&nbsp;</div>
			<p dir="rtl">بدلا من ذلك، يمكنك الاتصال بنا يوميا في # <?php echo $sitePhone; ?>، 12:00 حتي 22:00.</p>

			<?php require($fullRoot.'include/button-booking.php'); ?>
		</div>
		<!--/e_content-->

		<!--e_right-->
		<?php require($fullRoot.'include/e-right-'.$sysLang.'.php'); ?>
		<!--/e_right-->

		<div class="clear"></div>
	</div>
</div>
<!--/e_wrapper-->

<!--e_footer-->
<?php require($fullRoot.'include/e-footer-'.$sysLang.'.php'); ?>
<!--/e_footer-->
<?php
	require($fullRoot.'include/html-bottom.php');
?>
