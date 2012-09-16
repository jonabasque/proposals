<?php
/**
 * Edit assembly general properties form
 *
 * @package Assemblies
 */

$group = get_entity($vars['guid']);
$value = $vars['value'];
$vars['entity'] = $group;

// Grab variables
$periodicity = $group->assembly_periodicity;

$vars['periodicity'] = $periodicity;

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
$hidden_input = elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['guid']));
$hidden_input .= elgg_view('input/hidden', array('name' => 'value', 'value' => $value));


echo <<<___HTML

<div>
	<label for="vote_comment">$comment_label</label>
	$comment_input
</div>

<div class="elgg-foot">
	$hidden_input
	$action_buttons
</div>

___HTML;
