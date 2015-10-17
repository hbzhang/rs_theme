<?php
$jserr = 0;
$prototype = 'sites/all/libraries/lightbox/js/prototype.js';
$scriptaculous = 'sites/all/libraries/lightbox/js/scriptaculous.js';
$lightboxjs = 'sites/all/libraries/lightbox/js/lightbox.js';
$lightboxcss = 'sites/all/libraries/lightbox/css/lightbox.css';
if(!file_exists($prototype))
{
	drupal_set_message("The Prototype javascript file is not installed.  Please add it to '/$prototype'", 'error');
	$jserr++;
}
if(!file_exists($scriptaculous))
{
	drupal_set_message("The Prototype javascript file is not installed.  Please add it to '/$scriptaculous'", 'error');
	$jserr++;
}
if(!file_exists($lightboxjs))
{
	drupal_set_message("The Prototype javascript file is not installed.  Please add it to '/$lightboxjs'", 'error');
	$jserr++;
}
if(!file_exists($lightboxcss))
{
	drupal_set_message("The Prototype CSS file is not installed.  Please add it to '/$lightboxcss'", 'error');
	$jserr++;
}
if($jserr == 0)
{
	drupal_add_js($prototype, 'file');
	drupal_add_js($scriptaculous, 'file');
	drupal_add_js($lightboxjs, 'file');
	drupal_add_css($lightboxcss, 'file');
}
?>
<style>
#block-system-main .content
{
	text-align: center;
}
#gallery
{
	text-align: left;
	display: inline-block;
	width: 100%;
}
</style>
<script>
(function ($) {
	$(".gallery-image").colorbox();
})(jQuery);
</script>
<div id="gallery" class="border">
<?php
if(array_key_exists('field_slideshow_image_top', $content))
{
	$images = $content['field_slideshow_image_top']['#items'];
	$numImages = count($images);
	$curIm = 0;
	foreach($images as $image)
	{
		$furl = file_create_url($image['uri']);
		list($width, $height, $type, $attr) = getimagesize($furl);
		$width = ceil($width / 2);
		print "<a href='$furl' rel='lightbox[content]'><img src='$furl' width='200' class='gallery-image'></a>";
	}
}
if(array_key_exists('field_slideshow_image', $content))
{
	$images = $content['field_slideshow_image']['#items'];
	$numImages = count($images);
	$curIm = 0;
	foreach($images as $image)
	{
		$furl = file_create_url($image['uri']);
		list($width, $height, $type, $attr) = getimagesize($furl);
		$width = ceil($width / 2);
		print "<a href='$furl' rel='lightbox[content]'><img src='$furl' width='200' class='gallery-image'></a>";
	}
}
if(array_key_exists('field_slideshow_image2', $content))
{
	$images = $content['field_slideshow_image2']['#items'];
	$numImages = count($images);
	$curIm = 0;
	foreach($images as $image)
	{
		$furl = file_create_url($image['uri']);
		list($width, $height, $type, $attr) = getimagesize($furl);
		$width = ceil($width / 2);
		print "<a href='$furl' rel='lightbox[content]'><img src='$furl' width='200' class='gallery-image'></a>";
	}
}
?>
</div>