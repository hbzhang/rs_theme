<div class="announcement border">
<?php
	$outBody = $content['body']['#items']['0']['safe_value'];
	if(isset($content['field_announce_picture']))
	{
		$style = $content['field_announce_picture']['0']['#image_style'];
		print "<img src='" . image_style_url($style, $content['field_announce_picture']['#items']['0']['uri']) . "'>";
	}
	print "<div class='desc'>$outBody</div>";
?>
</div>
<div class="announcementLink">
<?php
	if(isset($content['field_extra_link']) && isset($content['field_extra_link_text']))
	{
		$url = $content['field_extra_link']['#items']['0']['safe_value'];
		$text = $content['field_extra_link_text']['#items']['0']['safe_value'];
		print "<a href='$url'>$text</a>";
	}
?>
</div>