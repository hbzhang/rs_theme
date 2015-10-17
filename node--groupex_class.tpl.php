<?php
if($view_mode == "full")
{
$isCancelled = false;
if(isset($content['field_cancelled']) && $content['field_cancelled'][0]['#markup'] == 1)
{
	$isCancelled = true;
}
if($isCancelled && isset($content['field_cancelcomment']))
{
	$cancelComment = $content['field_cancelcomment'][0]['#markup'];
}

$class = $content['field_groupexclass']['#items']['0']['nid'];
$classinfo = db_select('node', 'A')->fields('A', array('title'));
$classinfo->leftJoin('field_data_body', 'B', 'A.nid=B.entity_id');
$classinfo->fields('B',array('body_value'))->condition('A.nid', $class);
$classinfo = $classinfo->execute()->fetchAll();

$url = '#';
$instructorname = '<unknown>';
if (isset($content['field_instructor'])) {
  $instructor = $content['field_instructor']['#items']['0']['nid'];
  $instructorinfo = db_select('node', 'A')->fields('A', array('title'));
  $instructorinfo->leftJoin('field_data_field_displayname', 'B', 'A.nid=B.entity_id');
  $instructorinfo->fields('B', array('field_displayname_value'));
  $instructorinfo->condition('A.nid', $instructor);
  $instructorinfo = $instructorinfo->execute()->fetchAll();
  if($instructorinfo[0]->field_displayname_value == "")
  {
  	$instructorname = $instructorinfo[0]->title;
  } else
  {
  	$instructorname = $instructorinfo[0]->field_displayname_value;
  }
  $src = "node/" . $instructor;
  $url = db_select('url_alias', 'A')->fields('A', array('alias'))->condition('A.source', $src)->execute()->fetchAll();
  $url = "/" . $url[0]->alias;
}

$allpasses = $content['field_passes']['#items'];
$passes = "";
foreach($allpasses as $pass)
{
	$passes .= $pass['node']->title . " <strong>|</strong> ";
}
$passes = substr($passes, 0, -19);

$categories = $content['field_category']['#items'];
$categoryout = "";
foreach($categories as $category)
{
	$categoryout .= "<a href='/fitness/groupex/schedule?cat=" . $category['taxonomy_term']->tid . "'>" . $category['taxonomy_term']->name . "</a> ";
}
?>
<h1><?php print $classinfo[0]->title; ?></h1>
<hr>
<?php print $classinfo[0]->body_value; ?>
<hr>
<strong>Instructor: </strong><a href="<?php print $url; ?>"><?php print $instructorname; ?></a>
<hr>
<strong>Filed Under:</strong> <?php print $categoryout; ?>
<hr>
<strong>Passes Allowed Entry:</strong> <?php print $passes; ?>
<hr>
<h3>Upcoming Dates</h3>
<?php
$dates = $content['field_date']['#items'];
$utc = new DateTimeZone("UTC");
$tz = new DateTimeZone(variable_get("date_default_timezone"));
$today = new DateTime(null, $tz);
$today->setTime(0,0,0);
foreach($dates as $class)
{
	$date = new DateTime($class['value'],$utc);
	$date->setTimeZone($tz);
	if($date >= $today)
	{
		$d = $today->diff($date);
		$hr = intval($d->format('%h'));
		$dy = intval($d->format('%a'));
		if($dy == 0)
		{
			// datediff isnt realizing that today and tomorrow are different actual dates, only checking the exact difference in times
			$tom = intval($date->format('j'));
			$tod = intval($today->format('j'));
			if($tod != $tom)
			{
				
			}
		}
		if($dy == 0)
		{
			print "<em><strong>Today:</strong></em> ";
		} else if($dy == 1)
		{
			print "<em><strong>Tomorrow:</strong></em> ";
		} else if($today->format('W') == $date->format('W'))
		{
			print "<strong>This Week:</strong> ";
		}
	  print $date->format('l, F jS, Y \a\t g:iA') . "<br>";
	}
}
}
?>
<br><br><h2><a href="/fitness/groupex/schedule">Go Back to the Schedule</a></h2>
<style>#content-title{display:none;}</style>