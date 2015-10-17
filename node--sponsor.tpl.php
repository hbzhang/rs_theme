<?php
$body = "";
$img = "";
$phone = "";
$website = "";
$address = "";
$editl = "";
$deletel = "";
if(isset($content['body']))
{
	$body = $content['body']['#items']['0']['safe_value'];
}
if(isset($content['field_sponsor_logo']))
{
	$img = "<img src='" . file_create_url($content['field_sponsor_logo']['#items']['0']['uri']) . "'>";
}
if(isset($content['field_sponsor_phone']))
{
	$phone = $content['field_sponsor_phone']['#items']['0']['safe_value'];
}
if(isset($content['field_sponsor_website']))
{
	$website = $content['field_sponsor_website']['#items']['0']['safe_value'];
}
if(isset($content['field_sponsor_address']))
{
	$address = $content['field_sponsor_address']['#items']['0']['value'];
}
if(user_access("edit any sponsor content"))
{
	$editl = "<a href='/node/" . $node->nid . "/edit?destination=sponsors'>edit</a>";
}
if(user_access("delete any sponsor content"))
{
	$deletel = "<a href='/node/" . $node->nid . "/delete?destination=sponsors'>delete</a>";
}
?>
<div class="view-Sponsor border">
<?php
print "$img<h2>$title</h2>$editl $deletel";
?>
</div>
<div>
<?php
print "<p>$body</p>";
if($address != "")
{
	print "<h3>Address:</h3><div>$address</div>";
}
if($phone != "")
{
	print "<h3>Phone:</h3><div>$phone</div>";
}
if($website != "")
{
	print "<h3>Website:</h3><div>$website</div>";
}
?>
</div>
<?php
if($view_mode == "teaser")
{
	print "<hr>";
}
?>