<?php
$dev = false;
if($dev)
{
print "<textarea rows=20 cols=80>";
print_r($rows);
print "</textarea>";
}
$mensh = false;
$womensh = false;
$corech = false;
$openh = false;
$width = 50;
$userresult = false;
$nidre = '/<div class="views-field views-field-nid">([^<]+)<\/div>/';
$imtitlere = '/<div class="views-field views-field-title">([^<]+)<\/div>/';
$lastnightre = '/<div class="views-field views-field-entity-id">([^<]+)<\/div>/';
$tonightre = '/<div class="views-field views-field-entity-id-1">([^<]+)<\/div>/';
$rosterre = '/<div class="views-field views-field-field-rosterfile">([^<]+)<\/div>/';
$userresultre = '/<div class="views-field views-field-field-user-result">        <div class="field-content">([^<]+)<\/div>  <\/div>/';
$divre = '/<div class="views-field views-field-field-avail-division">        <div class="field-content">([^<]+)<\/div>  <\/div>/';
preg_match($imtitlere, $rows, $titlematch);
preg_match($lastnightre, $rows, $lastnightmatch);
preg_match($tonightre, $rows, $tonightmatch);
preg_match($rosterre, $rows, $rostermatch);
preg_match($userresultre, $rows, $userresultmatch);
preg_match($nidre, $rows, $nidmatch);
preg_match($divre, $rows, $divmatch);
$imtitle = trim($titlematch[1]);
$lastnighturl = trim($lastnightmatch[1]);
$tonighturl = trim($tonightmatch[1]);
$rosterurl = trim($rostermatch[1]);
if(count($userresultmatch) > 0 && $userresultmatch[1] != 0)
{
	$userresult = true;
}

if(count($divmatch) > 0)
{
	$divisions = trim($divmatch[1]);
	$diva = explode(",", $divisions);
	foreach($diva as $div)
	{
		$div = strtolower(trim($div)) . "h";
		$$div = true;
	}
}
$widc = 0;
if($mensh)
{
	$widc++;
}
if($womensh)
{
	$widc++;
}
if($corech)
{
	$widc++;
}
if($openh)
{
	$widc++;
}
$width = ($widc != 0 ? floor(100 / $widc) : 100);
$nid = trim($nidmatch[1]);
$nid = intval($nid);
?>
<style>
#content-title{display:none;}
</style>
<h1><?php print $imtitle; ?> Schedule / Results</h1>
<hr>
<h2>Current Info / Tools</h2>
<ul>
<?php
if($userresult)
{
	print "<li><a href='/intramurals/sports/result-submission'>Submit Your Results</a></li>";
}
if($tonighturl != "")
{
	print "<li><a href='$tonighturl'>Tonights Game</a></li>";
}
if($lastnighturl != "")
{
	print "<li><a href='$lastnighturl'>Last Nights Game</a></li>";
}
if($rosterurl != "")
{
	print "<li><a href='$rosterurl'>TEAM ROSTERS</a></li>";
}
?>
</ul>
<h2>Schedules / Win Loss Records</h2>
<?php
$files = db_select('field_data_field_imsport', 'A')->fields('C', array('uri'))->fields('D', array('field_league_value'))->fields('E', array('field_division_value'))->condition('A.field_imsport_nid', $nid);
$files->leftJoin('node', 'N', 'A.entity_id=N.nid');
$files->leftJoin('field_data_field_schedulefile', 'B', 'A.entity_id=B.entity_id');
$files->leftJoin('file_managed', 'C', 'B.field_schedulefile_fid=C.fid');
$files->leftJoin('field_data_field_league', 'D', 'A.entity_id=D.entity_id');
$files->leftJoin('field_data_field_division', 'E', 'A.entity_id=E.entity_id');
$files->leftJoin('field_data_field_filetype', 'G', 'A.entity_id=G.entity_id');
$files->orderBy('field_league_value', 'ASC');
$files->orderBy('field_division_value', 'ASC');
$files->condition('field_filetype_value', 'p', '!=');
$files->condition('N.status', 1);
$mens = clone $files;
$womens = clone $files;
$corec = clone $files;
$open = clone $files;
$mens = $mens->condition('field_league_value', 'Mens')->execute()->fetchAll();
$womens = $womens->condition('field_league_value', 'Womens')->execute()->fetchAll();
$corec = $corec->condition('field_league_value', 'CoRec')->execute()->fetchAll();
$open = $open->condition('field_league_value', 'open')->execute()->fetchAll();
$max = count($mens);
if(count($womens) > $max)
{
	$max = count($womens);
}
if(count($corec) > $max)
{
	$max = count($corec);
}
if(count($open) > $max)
{
	$max = count($open);
}
?>
<table class='schedule'>
	<tr class='headerrow'>
<?php
if($mensh) {
  print "<th width='$width%'>Mens</th>";
}
if($womensh) {
  print "<th width='$width%'>Womens</th>";
}
if($corech) {
	print "<th width='$width%'>CoRec</th>";
}
if($openh) {
	print "<th width='$width%'>Open</th>";
}
?>
	</tr>
<?php
for($i=0;$i<$max;$i++)
{
?>
	<tr>
<?php
	if($mensh)
	{
		if(count($mens) > $i && $mens[$i])
		{
  		print "<td><a href='" . file_create_url($mens[$i]->uri) . "'>Mens " . $mens[$i]->field_division_value . "</a></td>";
		}
		else
		{
			print "<td></td>";
		}
	}
	if($womensh)
	{
		if(count($womens) > $i && $womens[$i])
		{
			print "<td><a href='" . file_create_url($womens[$i]->uri) . "'>Womens " . $womens[$i]->field_division_value . "</a></td>";
		}
		else
		{
			print "<td></td>";
		}
	}
	if($corech)
	{
		if(count($corec) > $i && $corec[$i])
		{
			print "<td><a href='" . file_create_url($corec[$i]->uri) . "'>CoRec " . $corec[$i]->field_division_value . "</a></td>";
		}
		else
		{
			print "<td></td>";
		}
	}
	if($openh)
	{
		if(count($open) > $i && $open[$i])
		{
			print "<td><a href='" . file_create_url($open[$i]->uri) . "'>Open " . $open[$i]->field_division_value . "</a></td>";
		}
		else
		{
			print "<td></td>";
		}
	}
?>
	</tr>
<?php
}
?>
</table>