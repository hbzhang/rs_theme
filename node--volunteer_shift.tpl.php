<?php
render($content);

$signup_url = '/node/add/signup/' . $node->nid . '?destination=' . $node->uri['path'];

$count = cck_signup_get_remaining_capacity($node);

print "There are only $count slots left for this shift, <a href='$signup_url'>Volunteer for this Shift!</a>";
?>