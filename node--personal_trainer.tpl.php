<div class="person">
<?php
$fullname = "";
$bio = "";
$img = "";
$email = "";
$position = "";
if(!array_key_exists('field_displayname', $content))
{
	$fullname = $title;
} else
{
	$fullname = $content['field_displayname']['#items']['0']['safe_value'];
}
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
if(!empty($content['field_email']))
{
	$email = $content['field_email']['#items']['0']['email'];
	$email = "<a href='mailto:$email'>$email</a>";
} else
{
	$email = "";
}

print "<h1>" . $fullname . "</h1><hr>";
print $img . "<strong>Personal Trainer</strong><br>";

if($email != "")
{
	print $email . "<br>";
}
if(isset($content['field_phone']))
{
	print "<strong>Phone:</strong> " . $content['field_phone']['#items']['0']['safe_value'] . "<br>";
}
if(isset($content['field_fax']))
{
	print "<strong>Fax:</strong> " . $content['field_fax']['#items']['0']['safe_value'] . "<br>";
}
if(isset($content['field_address']))
{
	print "<strong>Address:</strong> " . $content['field_address']['#items']['0']['safe_value'] . "<br>";
}
print "<br>" . $bio;
if(isset($content['field_fact']))
{
	print "<br><br><strong>Fun Fact:</strong> " . $content['field_fact']['#items']['0']['safe_value'] . "<br><br>";
}
if(isset($content['field_exercise']))
{
	print "<strong>Favorite Exercise:</strong> " . $content['field_exercise']['#items']['0']['safe_value'] . "<br><br>";
}
?>
</div>
<style>
#content-title
{
	display: none;
}
</style>