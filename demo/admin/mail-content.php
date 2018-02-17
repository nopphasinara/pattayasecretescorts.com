<?php
	$reset = 'border="0" cellspacing="0" cellpadding="0"';
?>
<table width="100%" bgcolor="#2b0102" style="font-family: arial;" <?php echo $reset; ?>>
	<tr><td colspan="3" height="50">&nbsp;</td></tr>
	<tr>
		<td width="40">&nbsp;</td>
		<td align="center">
			<!--structure-->
			<table width="640" style="color: #fff;" <?php echo $reset; ?>>
				<tr>
					<td><a href="{fullUrl}" title="<?php echo $cf->get('siteName'); ?>" target="_blank"><img src="{fullUrl}image/logo-email.png" width="640" alt="" /></a></td>
				</tr>
				<tr><td height="20">&nbsp;</td></tr>
				<tr>
					<td><h1 style="font-size: 26px; color: #ffd902;">{mail_subject}</h1></td>
				</tr>
				<tr>
					<td>
						{mail_content}
					</td>
				</tr>
				<tr><td height="20">&nbsp;</td></tr>
				<tr>
					<td><img src="{fullUrl}image/seperate-email.png" width="640" alt="" /></td>
				</tr>
				<tr><td height="20">&nbsp;</td></tr>
				<tr>
					<td>
						<table width="640" <?php echo $reset; ?>>
							<tr>
								<td valign="top" align="center"><a href="http://www.twitter.com" title="" target="_blank"><img src="{fullUrl}image/banner-twitter-email.png" width="149" alt="" /></a></td>
								<td valign="top" align="center"><a href="http://www.devilsdenthailand.com" title="" target="_blank"><img src="{fullUrl}image/banner-ddt-email.png" width="149" alt="" /></a></td>
								<td valign="top" align="center"><a href="http://www.devilsdenvipbus.com" title="" target="_blank"><img src="{fullUrl}image/banner-ddvipbus-email.png" width="149" alt="" /></a></td>
								<td valign="top" align="center"><a href="http://www.facebook.com" title="" target="_blank"><img src="{fullUrl}image/banner-facebook-email.png" width="149" alt="" /></a></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td height="20">&nbsp;</td></tr>
				<tr>
					<td><img src="{fullUrl}image/footer-email.png" height="45" alt="" /></td>
				</tr>
			</table>
			<!--/structure-->
		</td>
		<td width="40">&nbsp;</td>
	</tr>
	<tr><td colspan="3" height="50">&nbsp;</td></tr>
</table>