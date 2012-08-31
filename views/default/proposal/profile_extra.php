<?php

echo elgg_view("proposals/voting_widget", $vars);
if ($vars['full_view'])
	echo elgg_view("proposals/voting_results", $vars);
