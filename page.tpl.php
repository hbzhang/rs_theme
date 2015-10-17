<style type="text/css">
#a2apage_BROWSER { display:none !important; }
#a2apage_EMAIL { display:none !important; }
div.a2apage_wide
{
	display:none;
}
</style>
<div id="container">
<div id="page">
	<div id="header">
		<img src="<?php print $logo; ?>" alt="Division of Student Affairs" />
	</div>
	<div id="sub-header">
		<div id="sub-header-left">
			<div id="sub-header-left-search">
				<?php if ($page['search_box']): ?>
					<?php print render($page['search_box']); ?>
				<?php endif; ?>
				<div class="clear"></div>
			</div>
			<div class="separator"></div>
			<div id="sub-header-left-nav">
				<ul> 
					<li> 
						<a href="http://www.vt.edu/">Virginia Tech Home</a> 
					</li> 
					<li> 
						<a href="http://www.dsa.vt.edu/">Division of Student Affairs</a> 
					</li> 
					<li> 
						<a href="/home" class="last">VT Recreational Sports</a> 
					</li> 
				</ul>
			</div>
			<div class="clear"></div>
		</div>
<?php
drupal_add_js('https://apis.google.com/js/plusone.js', 'external');
global $theme_path;
$curPage = $_SERVER['REQUEST_URI'];
$curPage = explode("/", $curPage);
$curPage = $curPage[1];
switch($curPage)
{
	case "user":
		print "<style>ul.tabs {display:none;}</style>";
		SetActiveTrailMenuItem("Home", $main_menu);
		$bgImg = "/images/backgrounds/home.jpg";
		break;
	case "aquatics":
		SetActiveTrailMenuItem("Aquatics", $main_menu);
		$bgImg = "/images/backgrounds/pool.jpg";
		break;
	case "facilities":
		SetActiveTrailMenuItem("Facilities", $main_menu);
	  $bgImg = "/images/backgrounds/facilities.jpg";
		break;
	case "fitness":
		SetActiveTrailMenuItem("Fitness", $main_menu);
		$bgImg = "/images/backgrounds/fitness.jpg";
		break;
	case "instruction":
		SetActiveTrailMenuItem("Instruction", $main_menu);
		$bgImg = "/images/backgrounds/instruction.jpg";
		break;
	case "intramurals":
		SetActiveTrailMenuItem("Intramural Sports", $main_menu);
		$bgImg = "/images/backgrounds/im.jpg";
		break;
	case "sportclubs":
		SetActiveTrailMenuItem("Sport Clubs", $main_menu);
		$bgImg = "/images/backgrounds/sportclubhead.jpg";
		break;
	case "clubs":
		SetActiveTrailMenuItem("Sport Clubs", $main_menu);
		$bgImg = "/images/backgrounds/sportclubhead.jpg";
			break;
	default:
		SetActiveTrailMenuItem("Home", $main_menu);
		$bgImg = "/images/backgrounds/home.jpg";
		break;
}
?>
<style>
#sub-header-right {
	background: url(<?php print "/" . $theme_path . $bgImg; ?>) no-repeat center top;
}
</style>
		<div id="sub-header-right">
			<!-- <?php print $curPage; ?> -->
			<h3 class="italic">Department of</h2>
			<h2><?php print $site_name ?></h2>
			<?php if ($page['menu']): ?>
				<?php print render($page['menu']); ?>
			<?php endif; ?>
			
		</div>
	</div>
	<div id="main">
		<div id="main-left">
			<div id="main-left-nav">
				<?php if ($page['left']): ?>
					<?php print render($page['left']); ?>
				<?php endif; ?>
			</div>
			<div id="main-left-bottom">
				<?php if ($page['left_bottom']): ?>
					<?php print render($page['left_bottom']); ?>
				<?php endif; ?>
			</div>
		</div>
		<!-- MAIN CONTENT HERE -->
		<div id="main-container">
			<div id="main-right">
			<?php if ($page['right']): ?>
				<?php print render($page['right']); ?>
			<?php endif; ?>
			</div>
			<div id="main-content">
				<div id="content-title">
					<h1><?php print render($title); ?></h1>
					<hr>
				</div>
				<?php print render($messages); ?>
				<?php print render($tabs); ?>
				<?php print render($page['content']); ?>
				<g:plusone></g:plusone>
			</div>
			<div id="main-content-footer">
			<ul>
				<li class="border">142 McComas Hall</li>
				<li class="border"><a href="/contact">Contact Rec Sports</a>
				<li>540-231-6856</li>
			</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="footer">
	<ul>
		<li class="first">
			<a href="http://www.givingto.vt.edu">Giving to Virginia Tech</a> 
		</li>
		<li>
			<a href="http://www.bookstore.vt.edu">Bookstore</a> 
		</li>
		<li>
			<a href="http://www.jobs.vt.edu/" class="open-window">Jobs at Virginia Tech</a> 
		</li>
		<li>
			<a href="http://www.vt.edu/contacts/">Contact Us</a> 
		</li>
		<li class="last">
			<a href="http://www.vt.edu/equal_opportunity.php">Equal Opportunity</a> 
		</li>
	</ul>
	<ul>
		<li class="first">
			<a href="http://www.vt.edu/privacy.php">Privacy Statement</a> 
		</li>
		<li>
			<a href="http://www.vt.edu/principles.php">Principles of Community</a> 
		</li>
		<li>
			<a href="http://www.vt.edu/acceptable_use.php">Acceptable Use Policy</a> 
		</li>
		<li class="last">
			<a href="http://www.vt.edu/accessibility.php">Accessibility</a> 
		</li>
	</ul>
<?php
global $base_url;
$secureurl = $base_url;
if(substr($base_url, 0, 5) != "https")
{
	$secureurl = "https" . substr($base_url, 4);
}
?>
	<p>
		&copy; 2014 Virginia Polytechnic Institute and State University | <a href="http://www.recsports.vt.edu/sites/drupal.recsports.vt.edu/files/ems.html">EMS</a> | <a href="<?php print $secureurl; ?>/user">User Login</a>
	</p>
        <P>
              <a href="http://www.dsa.vt.edu/students/studentcomplaints.php"><img src="http://i.imgur.com/0rgrPhx.png" border="0"></a> 
        </P>
</div>
</div>
<?php
// function to set the active trail menu dynamically by just passing a name, ie "Fitness", or "Aquatics"
function SetActiveTrailMenuItem($itemname, &$main_menu)
{
	foreach($main_menu as $key => $val)
	{
		if($val['title'] == $itemname)
		{
      $val['attributes'] = (isset($val['attributes']) ? $val['attributes'] : array());
			$main_menu[$key]['attributes'] = array_merge($val['attributes'], array('class' => array('0' => 'active-trail')));
		}
	}
}
?>
