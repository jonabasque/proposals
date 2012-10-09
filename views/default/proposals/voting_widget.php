<?php

elgg_load_library('elgg:proposals');

$entity = elgg_extract('entity', $vars, FALSE);

$votes = proposals_get_votes($entity);
$member_count = $entity->getContainerEntity()->getMembers(0, 0, true);	

$status = proposals_get_status_from_votes($votes, $member_count);
$points = proposals_get_points_from_votes($votes);

$my_annotation = current(elgg_get_annotations(array(
	'guid' => $entity->guid,
	'annotation_name' => 'votes',
	'annotation_owner_guid' => elgg_get_logged_in_user_guid(),
)));

$buttons = array('yes', 'no', 'block', 'abstain');
$content = "";
foreach($buttons as $button) {
	$button_text = elgg_echo("proposals:votes:$button");
	if (!empty($votes[$button])) {
		$button_text .= " (".$votes[$button].")";
	}
	if ($button == $my_annotation->value) {
		$content .= $button_text;
	}
	else {
		$content .= elgg_view('proposals/voting_popup', array(
			'entity' => $vars['entity'],
			'view' => "voting_form",
			'namespace' => $button,
			'form_options' => array('value' => $button, 'guid' => $entity->guid),
			'text' => "$button_text",
		));
	}
	$content .= " ";
}
$status_text = elgg_echo("proposals:votes:$status");

$votes_link = elgg_view('proposals/voting_popup', array(
	'entity' => $vars['entity'],
	'view' => "voting_results",
	'text' => array_sum($votes) . "/" . $member_count,
));

$total_label = elgg_echo("proposals:votes:total");
$status_label = elgg_echo("proposals:votes:status");

echo <<<HTML
<div class="votes-points votes-status-$status">
	$points
</div>
<div class="votes-info">
	$content

<div><label>$total_label</label> $votes_link</div>
<div><label>$status_label</label> $status_text</div>
</div>
HTML;
