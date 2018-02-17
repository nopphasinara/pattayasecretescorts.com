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
			<h1 class="title text_yellow give_space10"><strong>Services</strong></h1>
			<h2 class="subtitle text_yellow give_space15">IMAGINEZ!</h2>
			<div class="list_normal">
				<div class="item">Vous pouvez choisir une, deux ou autant de belles thaïlandaises que vous pensez pouvoir gérer.</div>
				<div class="item">1 heure (ou plus) de petits soins pendant lesquelles vous serez le directeur et la star de tout ce qu'il se passe.</div>
				<div class="item">Le tout dans l'intimité et le confort de votre chambre d'hôtel.</div>
				<div class="item">Une expérience ultime et la satisfaction des fantasmes de toute une vie.</div>
				<div class="item last">Satisfaction garantie!</div>
			</div>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">LE TOUT POUR UN TARIF TOUT COMPRIS.</h2>
			<p>Pourquoi gâcher votre temps et votre argent pour être déçu par l'expérience thaïlandaise standard ? Une visite des escort-girls de Devil's Den Bangkok vous montrera ce qu'est vraiment le plaisir à la thaïlandaise.</p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?> offre à tous les hommes, femmes et couples à la recherche de passion et de plaisir une expérience à laquelle il faut goûter au moins une fois dans sa vie.</p>
			<div>&nbsp;</div>
			<p>Chez <?php echo $cf->get('siteName'); ?> nous sommes dévoués à rendre votre expérience inoubliable, nous donnons ainsi beaucoup de valeur à vos idées et votre avis sur le service. Contactez-nous par e-mail: <a href="mailto:<?php echo $bookingEmail; ?>" title="<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a>. Si vous êtes à la recherche de services spécifiques, nous ferons de notre mieux pour vous guider ou vous satisfaire.</p>
			<div>&nbsp;</div>
			<p><strong class="text_yellow">A-Level:</strong> Certaines de nos escort-girls offrent des services de A-level (des frais supplémentaires s'appliquent, voir les tarifs).</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">UNIFORMES D'ESCORTS</h2>
			<p>Nous offrons toute une gamme d'uniformes sexy. Ils sont disponibles sans frais supplémentaires et peuvent rendre votre rencontre encore plus inoubliable.</p>
			<div>&nbsp;</div>
			<div class="list_normal">
				<div class="item">Étudiante</div>
				<div class="item">Hôtesse de l'air</div>
				<div class="item">Policière</div>
				<div class="item">Soubrette</div>
				<div class="item">Infirmière</div>
				<div class="item last">Bas</div>
			</div>
			<div>&nbsp;</div>
			<p>Vous pouvez également fournir un uniforme de votre choix. Les escorts de Devil's Den sont là pour vous faire plaisir!</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">COMMENT RÉSERVER LES ESCORT-GIRLS DE DEVIL'S DEN Bangkok</h2>
			<p>Vous pouvez envoyer un e-mail à <a href="mailto:<?php echo $bookingEmail; ?>" title="<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a> ou cliquer sur le bouton RÉSERVEZ MAINTENANT qui se trouve en bas de chaque page.</p>
			<div>&nbsp;</div>
			<p>Vous pouvez également nous appeler tous les jours entre 12h et 22h au <?php echo $sitePhone; ?>.</p>

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