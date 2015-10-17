<style>
#content-title {display:none;}
</style>
<h1>Domino's Pizza Sportsmanship Award</h1><hr>
<div class="view-im-sportsmanship">
	<div class="view-content border">
		<div>
<?php
$style = $content['field_picture']['0']['#image_style'];
$img = image_style_url($style, $content['field_picture']['#items']['0']['uri']);
print "<img src='$img'>";
?>
		</div>
		<div>
<?php
print "<br><br>" . $content['field_imsport']['0']['#title'] . " (" . $content['field_league']['#items']['0']['value'] . ")";
?>
		</div>
		<div>
<?php
print "<h2>" . $title . "</h2>";
?>
			<br><br>
<?php
print "<a href='" . file_create_url($content['field_picture']['#items']['0']['uri']) . "'>Click here to download the full size image</a>";
?>
<br><br><br><br>
		</div>
	</div>
</div>
<ul class="rs"><li class="head">Sportsmanship Archives</li>
<li><a href="/intramurals/sportsmanship/archives">View all of the current year's Domino's Pizza Sportsmanship Award Winners</a></li>
</ul>