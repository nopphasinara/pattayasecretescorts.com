<?php
	$reset = 'border="0" cellspacing="0" cellpadding="0"';
?>
<table width="100%" bgcolor="#1b0102" style="font-family: arial;" <?php echo $reset; ?>>
	<tr><td colspan="3" height="30">&nbsp;</td></tr>
	<tr>
		<td width="40">&nbsp;</td>
		<td align="center">
			<!--structure-->
			<table width="640" style="font-size: 14px;" <?php echo $reset; ?>>
				<tr><td height="20">&nbsp;</td></tr>
				<tr>
					<td>
						<p><img src="<?php echo $fullUrl.'image/logo-email.png'; ?>" height="281" alt="" /></p>
						<h1 style="text-align: left; color: #ffd902;">Heading Title Here</h1>
					</td>
				</tr>
				<tr>
					<td width="640" style="color: #fff;">
						Hi xxxx,
						<br /><br />
						You recently requested to reset your current password on account ['.$data['email'].'].
						<br /><br />
						<strong>If you did not make this change</strong><br />
						Please click on this link to cancel this request.
						<br /><br />
						<strong>If you made this change</strong><br />
						Please click here to reset your password.
						<br /><br />
						Sincerely,<br />
						The Google Accounts team
					</td>
				</tr>
				<tr><td height="20">&nbsp;</td></tr>
			</table>
			<br />
			<table width="600" style="font-size: 11px; color: #777;" <?php echo $reset; ?>>
				<tr>
					<td width="640">
						&copy; 2014 Google Inc., 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA
					</td>
				</tr>
				<tr><td colspan="3" height="20">&nbsp;</td></tr>
			</table>
			<!--/structure-->
		</td>
		<td width="40">&nbsp;</td>
	</tr>
	<tr><td colspan="3" height="30">&nbsp;</td></tr>
</table>