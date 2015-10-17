<div class="border" style="text-align:center;">
<?php
$semester = $content['field_semester']['#items']['0']['value'];
$year = $content['field_year']['#items']['0']['value'];
$sport = $content['field_imsport']['0']['#title'];
$league = $content['field_league']['0']['#markup'];
$group = $content['field_group']['0']['#markup'];
if($group == "N/A")
{
	$group = "";
}
switch($semester)
{
	case "1":
		$semester = "Spring";
		break;
	case "2":
		$semester = "Summer";
		break;
	case "3":
		$semester = "Fall";
		break;
}
print "<h1>$semester $year: $group $league $sport</h1><hr>";
if(isset($content['field_image']))
{
	$style = $content['field_image']['0']['#image_style'];
	$img = image_style_url($style, $content['field_image']['#items']['0']['uri']);
	print "<img src='$img'>";
}
?>
<br><br><br>
<?php
print "<h2>$title</h2>";
if(isset($content['field_image']))
{
	$oimg = file_create_url($content['field_image']['#items']['0']['uri']);
	print "<br><a href='$oimg'>Click here to download the full size image</a>";
}
print "<br><br><br><br>";
?>
</div>
<style>
#content-title
{display:none;}
</style>