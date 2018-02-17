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
			<div class="banner">
				<div class="img">
					<img src="<?php echo $fullUrl.'image/banner.png'; ?>" width="100%" alt="banner.jpg" />
				</div>

				<div class="fix_button small oswald">
					<div class="left inline">&nbsp;</div><!--
					--><div class="body inline">
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="우리 갤러리를 입력">우리 갤러리를 입력</a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong>악마의덴방콕에스코트에오신것을환영합니다 .</strong></h1>
			<p>8년동안악마의덴태국은태국에서최고의성인엔터테인먼트업체중하나로자리매김했습니다.  정직과품위로알려져있을뿐만아니라  국제기준에부합하는  병원을  통한  검사규정을  따름으로써  다른경쟁업체의귀감이되어왔습니다.</p>
			<div>&nbsp;</div>
			<p>악마의덴방콕은  많은분들이  자신의사생활이보호되는차원에서  서비스를받는것을선호한다는것을  인식함에따라  지금의변화에맞추어  그수요를충족하기위해  악마의덴의프리미엄서비스를더확장하기로하였습니다. </p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">저희는다음을보장해드립니다;</h2>
			<p>1. 모든에스코트의혈액검사와 HIV 및성병에대한검사를  국제적기준에부합하는  병원에서시행하며그결과는각각의프로필에  올라올것입니다. </p>
			<div>&nbsp;</div>
			<p>2. 모든사진은해당여성을있는그대로보여주며  어떤그래픽적인변경도없습니다. </p>
			<div>&nbsp;</div>
			<p>3. 에스코트의개인적인서비스는  필요에따라제공될수있습니다.</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?>: Where Fantasies Come True</strong></p>
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