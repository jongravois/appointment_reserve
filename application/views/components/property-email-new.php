<!DOCTYPE html>
<html>
<head>
	<title>iRESERVE RESERVATION</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="680" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
						RESERVATION RECEIVED
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr style="height:2em;background-color:#efefef;">
								<td colspan='2' align='center'><strong>CONTACT INFORMATION</strong></td>
							</tr>
							<tr>
								<td style="width:30%;text-align: right;">NAME:</td>
								<td style="width:70%;text-align: left;"><b><?= $thisRsv->fname . " " . $thisRsv->lname; ?></b></td>
							</tr>
							<tr>
								<td style="text-align: right;">UNIT:</td>
								<td style="text-align: left;"><b><?= $thisRsv->unit; ?></b></td>
							</tr>
							<tr>
								<td style="text-align: right;">EMAIL:</td>
								<td style="text-align: left;"><b><a href="mailto:<?= $thisRsv->email; ?>"><?= $thisRsv->email; ?></a></b></td>
							</tr>
							<tr>
								<td style="text-align: right;">RESOURCE:</td>
								<td style="text-align: left;"><b><?= $thisRsv->resource; ?></b></td>
							</tr>
							<tr>
								<td style="text-align: right;">DATE:</td>
								<td style="text-align: left;"><b><?= $thisRsv->resDate; ?></b></td>
							</tr>
							<tr>
								<td style="text-align: right;">TIME:</td>
								<td style="text-align: left;"><b><?= $thisRsv->start; ?></b></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>