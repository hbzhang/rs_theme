<?php
function DivisionText($div)
{
	$div = intval($div);
	switch($div)
	{
		case -1:
			return "Advanced";
			break;
		case -2:
			return "Intermediate";
			break;
		case -3:
			return "Beginner";
			break;
	}
}
$mensh = false;
$womensh = false;
$corech = false;
$openh = false;
$width = 50;
$imtitlere = '/<div class="views-field views-field-title">([^<]+)<\/div>/';
$nidre = '/<div class="views-field views-field-nid">([^<]+)<\/div>/';
$divre = '/<div class="views-field views-field-field-avail-division">        <div class="field-content">([^<]+)<\/div>  <\/div>/';
preg_match($imtitlere, $rows, $titlematch);
preg_match($nidre, $rows, $nidmatch);
preg_match($divre, $rows, $divmatch);
$imtitle = trim($titlematch[1]);
$nid = trim($nidmatch[1]);
$nid = intval($nid);
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
?>
<style>
#content-title {display:none;}
</style>
<h1><?php print $imtitle; ?> Playoff Brackets</h1>
<hr>
<?php
$files = db_select('field_data_field_imsport', 'A')->fields('C', array('uri'))->fields('D', array('field_league_value'))->fields('E', array('field_division_value'))->condition('A.field_imsport_nid', $nid);
$files->leftJoin('field_data_field_schedulefile', 'B', 'A.entity_id=B.entity_id');
$files->leftJoin('file_managed', 'C', 'B.field_schedulefile_fid=C.fid');
$files->leftJoin('field_data_field_league', 'D', 'A.entity_id=D.entity_id');
$files->leftJoin('field_data_field_division', 'E', 'A.entity_id=E.entity_id');
$files->leftJoin('field_data_field_filetype', 'G', 'A.entity_id=G.entity_id');
$files->orderBy('field_league_value', 'ASC');
$files->condition('field_filetype_value', 'p');
$mens = clone $files;
$womens = clone $files;
$corec = clone $files;
$open = clone $files;
$mens = $mens->condition('field_league_value', 'Mens')->execute()->fetchAll();
$womens = $womens->condition('field_league_value', 'Womens')->execute()->fetchAll();
$corec = $corec->condition('field_league_value', 'CoRec')->execute()->fetchAll();
$open = $open->condition('field_league_value', 'Open')->execute()->fetchAll();
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
				if(count($mens) > 0 && $mens[$i])
				{
					print "<td><a href='" . file_create_url($mens[$i]->uri) . "'>Mens " . DivisionText($mens[$i]->field_division_value) . "</a></td>";
				}
				else
				{
					print "<td></td>";
				}
			}
			if($womensh)
			{
				if(count($womens) > 0 && $womens[$i])
				{
					print "<td><a href='" . file_create_url($womens[$i]->uri) . "'>Womens " . DivisionText($womens[$i]->field_division_value) . "</a></td>";
				}
				else
				{
					print "<td></td>";
				}
			}
			if($corech)
			{
				if(count($corec) > 0 && $corec[$i])
				{
					print "<td><a href='" . file_create_url($corec[$i]->uri) . "'>CoRec " . DivisionText($corec[$i]->field_division_value) . "</a></td>";
				}
				else
				{
					print "<td></td>";
				}
			}
			if($openh)
			{
				if(count($open) > 0 && $open[$i])
				{
					print "<td><a href='" . file_create_url($open[$i]->uri) . "'>Open " . DivisionText($open[$i]->field_division_value) . "</a></td>";
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