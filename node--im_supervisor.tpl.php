<div class="person">
<?php
$fullname = "";
$bio = "";
$img = "";
$email = "";
$position = "";
if(!empty($content['body']))
{
	$bio = $content['body']['#items']['0']['safe_value'];
}
if(!empty($content['field_picture']))
{
	$style = $content['field_picture']['0']['#image_style'];
	$img = image_style_url($style, $content['field_picture']['#items']['0']['uri']);
} else
{
	$img = "http://drupal.recsports.vt.edu/sites/drupal.recsports.vt.edu/files/default_images/NO_Picture_Male.jpg";
}
$img = "<img style='float:left;padding:2px;border:solid 1px #9d9879;margin-right:15px;' src='" . $img . "'>";

print "<h1>$title</h1><hr>";
print $img . "<strong>Intramural Supervisor</strong><br>";

print "<br>" . $bio;
?>
</div>
<style>
#content-title
{
	display: none;
}
</style>