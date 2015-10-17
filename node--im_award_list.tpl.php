<?php
print render($content['body']);

$cstyle = $content['field_champ_img']['0']['#image_style'];
$champ = "<img src='" . image_style_url($cstyle, $content['field_champ_img']['#items']['0']['uri']) . "'>";

$sstyle = $content['field_champ_img']['0']['#image_style'];
$sport = "<img src='" . image_style_url($sstyle, $content['field_sports_img']['#items']['0']['uri']) . "'>";

$hstyle = $content['field_champ_img']['0']['#image_style'];
$hof = "<img src='" . image_style_url($hstyle, $content['field_hof_img']['#items']['0']['uri']) . "'>";

?>
<ul class="rs awards border">
	<li class="left"><a href="/intramurals/wall-of-champions">Wall of Champions</a><?php print $champ; ?></li>
	<li class="right"><a href="/intramurals/sportsmanship">Sportsmanship Awards</a><?php print $sport; ?></li>
	<li class="left"><a href="/intramurals/officials/hall-of-fame">Officials Hall of Fame</a><?php print $hof; ?></li>
</ul>