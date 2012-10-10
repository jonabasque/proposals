<?php
/**
 * Edit assembly general properties form
 *
 * @package Assemblies
 */

$guid = $vars['guid'];
$vote = $vars['vote'];

$action_buttons = '';

$save_button = elgg_view('input/submit', array(
	'value' => elgg_echo('save'),
	'name' => 'save',
));
$action_buttons = $save_button;

$comment_label = elgg_echo('proposals:votes:comment');
$comment_input = elgg_view('input/text', array(
	'name' => 'vote_comment',
	'id' => 'vote_comment'
));

// hidden inputs
$guid_input = elgg_view('input/hidden', array('name' => 'guid', 'value' => $guid));
$vote_input .= elgg_view('input/hidden', array('name' => 'vote', 'value' => $vote));


echo <<<___HTML

<div>
	<label for="vote_comment">$comment_label</label>
	$comment_input
</div>

<div class="elgg-foot">
	$guid_input
	$vote_input
	$action_buttons
</div>

___HTML;
