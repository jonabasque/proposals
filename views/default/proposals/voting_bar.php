<?php

$votes = elgg_extract('votes', $vars);

echo '<div class="voting-bar">';

foreach ($votes as $vote_type => $result) {
	$percent = $result / array_sum($votes) * 100;
	echo elgg_view('output/url', array(
		'title' => $result,
		'class' => "votes-bar-$vote_type",
		'style' => "width: $percent%",
	));
}

echo "</div>";
