<?php
/**
 * Show who has voted on something
 *
 *  @uses $vars['entity']
 */


$list = '';
$votes_list = elgg_view('proposals/voting_results', $vars);

$num_of_votes = 6;
$guid = $vars['entity']->getGUID();

if ($votes_list) {
        $params = array(
                'text' => $vars['text'],
                'title' => elgg_echo('proposals:votes:see'),
                'rel' => 'popup',
                'href' => "#votes-$guid"
        );
        $list = elgg_view('output/url', $params);
        $list .= "<div class='elgg-module elgg-module-popup elgg-likes hidden clearfix' id='votes-$guid'>";
        $list .= $votes_list;
        $list .= "</div>";
        echo $list;
}
else {
	echo $vars['text'];
}

