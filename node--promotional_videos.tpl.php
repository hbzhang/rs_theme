<div class="person">

<?php
if(isset($content['body']))
{
	print render($content['body']);
}
?>
</div>
<style>
#content-title
{
	display: none;
}
</style>