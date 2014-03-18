<!DOCTYPE html>
<html>
<head>
	<title>iReserve: <?= $property->propertyName; ?></title>
</head>
<body style="padding:0; margin:0; background:#fefefe; font-family:sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:8px;border-top-style:solid;border-top-color:#404040;border-bottom-width:8px;border-bottom-style:solid;border-bottom-color:#404040;padding:10px 0 10px 0;background-color:#CCCCCC;">
                    	<img src="http://www.edrpo.com/edrAssets/irSiteLogos/<?= $thisRsv->propNumber; ?>.png" />
		    			<br>
		    			<span style="color:#404040;font-size:11px;text-align: center;">
							<?= $property->propertyName; ?><br>
							<?= $property->propertyAddress; ?><br>
							<?= $property->propertyCity . ", " . $property->propertyState . "  " . $property->propertyZip; ?><br>
							<?= formatPhone($property->propertyPhone); ?><br>
							<?= "<a style='color:#404040;' href='" . $property->propertyProductionURL . "'>Property Website</a>"; ?>
		    			</span>
                	</td>
				</tr>
                <tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				
				<tr>
					<td>
						<br>Hello, <?= $thisRsv->fname; ?>,
						<br><br>Your reservation listed below is confirmed:
						<br><br>
						<table>
							<tr><td>Resource:</td><td><?= $thisRsv->resource; ?></td></tr>
							<tr><td>Date:</td><td><?= $thisRsv->resDate; ?></td></tr>
							<tr><td>Time:</td><td><?= $thisRsv->start; ?></td></tr>
						</table>
                    </td>
                </tr>
                <tr>
                	<td>
                		<?= $thisRsv->resourcePropertySpecs; ?>
                	</td>
                </tr>
		</table>
			
		</td>
	</tr>
</table>
</body>
</html>
