<div class="club border">
<?php
	print "<style>#content-title {display:none;}</style><h1>$title Club</h1><hr>";
	if(isset($content['field_club_image']))
	{
		$style = $content['field_club_image']['0']['#image_style'];
		$img = "<img src='" . image_style_url($style, $content['field_club_image']['#items']['0']['uri']) . "'>";
	}
	else
	{
		$img = "<img src='/sites/drupal.recsports.vt.edu/files/announcements/RecSports_transp.gif' width='350' height='200'>";
	}
	print $img;
	$url = $content['field_website']['#items']['0']['safe_value'];
	$email = $content['field_contact_email']['0']['#markup'];
	$name = $content['field_contact_name']['0']['#markup'];
	print "<strong>Contact Info:</strong> If you are interested in joining this club team, or have questions, you should contact:<br><br>";
	print "<strong>$name</strong><br><a href='mailto:$email'>$email</a><br><br>";
	print "<strong>Website</strong><br><a href='$url' target='_blank'>Visit the $title Web site</a></div>";
	print "<h2 style='clear:left;'>About $title Club</h2><br>" . render($content['body']);
?>
<a href="..">Go Back to the Full Club Listing</a><br><br>