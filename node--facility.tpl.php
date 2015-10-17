<?php
if($view_mode == "teaser")
{
	$i = 3;
} else if ($view_mode == "full")
{
	$i = 2;
}
$showing = "none";
$hours = "";
$hours2 = "";
if(isset($content['field_facility_image']))
{
	$style = $content['field_facility_image']['0']['#image_style'];
	$img = "<img src='" . image_style_url($style, $content['field_facility_image']['#items']['0']['uri']) . "'>";
}
if($i==2)
{
?>
<div class="facility border">
<?php
print $img;
?>
</div>
<?php
}
?>
<div class="view-facilities-list facilityhours">
	<div class="views-field-body">
<?php
if(isset($content['body']))
{
	$bod = $content['body']['#items']['0']['safe_value'];
}
if(isset($content['field_hours_1_schedule_name']) && isset($content['field_hours_1_schedule_dates']))
{
	$showing = "h1";
	$hours = "<h$i>" . $content['field_hours_1_schedule_name']['#items']['0']['safe_value'] . "</h$i><strong>" . $content['field_hours_1_schedule_dates']['0']['#markup'] . "</strong><br>";
	$mf1 = (isset($content['field_hours_1_mon_fri']) ? $content['field_hours_1_mon_fri']['#items']['0']['safe_value'] : "Closed") . " M-F<br>";
	$sat1 = (isset($content['field_hours_1_sat']) ? $content['field_hours_1_sat']['#items']['0']['safe_value'] : "Closed") . " Sat<br>";
	$sun1 = (isset($content['field_hours_1_sun']) ? $content['field_hours_1_sun']['#items']['0']['safe_value'] : "Closed") . " Sun<br>";
	$hours .= $mf1 . $sat1 . $sun1;
}
if(isset($content['field_hours_2_schedule_name']) && isset($content['field_hours_2_schedule_dates']))
{
	$hours2 = "<h$i>" . $content['field_hours_2_schedule_name']['#items']['0']['safe_value'] . "</h$i><strong>" . $content['field_hours_2_schedule_dates']['0']['#markup'] . "</strong><br>";
	$mf2 = (isset($content['field_hours_2_mon_fri']) ? $content['field_hours_2_mon_fri']['#items']['0']['safe_value'] : "Closed") . " M-F<br>";
	$sat2 = (isset($content['field_hours_2_sat']) ? $content['field_hours_2_sat']['#items']['0']['safe_value'] : "Closed") . " Sat<br>";
	$sun2 = (isset($content['field_hours_2_sun']) ? $content['field_hours_2_sun']['#items']['0']['safe_value'] : "Closed") . " Sun<br>";
	$hours2 .= $mf2 . $sat2 . $sun2;
}

print $hours . "<br>" . $hours2 . "<br>" . $bod;

if(isset($content['field_gallery_link']) && $i == 2)
{
	print "<h$i><a href='" . $content['field_gallery_link']['#items']['0']['safe_value'] . "'>Go to the $title Photo Gallery</a></h$i>";
}
?>
	</div>
</div>