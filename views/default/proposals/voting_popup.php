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

if ($num_of_votes) {
        $params = array(
                'text' => $vars['text'],
                'title' => elgg_echo('proposals:votes:see'),
                'rel' => 'popup',
                'href' => "#likes-$guid"
        );
        $list = elgg_view('output/url', $params);
        $list .= "<div class='elgg-module elgg-module-popup elgg-likes hidden clearfix' id='likes-$guid'>";
        $list .= $votes_list;
        $list .= "</div>";
        echo $list;
}

