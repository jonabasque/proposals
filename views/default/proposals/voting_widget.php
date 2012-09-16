<?php

   $entity = elgg_extract('entity', $vars, FALSE);
   $user = elgg_get_logged_in_user_entity();

   $group = $entity->getContainerEntity();
   $member_count = $group->getMembers(0, 0, true);

   $options = array('guid' => $entity->guid, 'annotation_name' => 'votes');
   $annotations = elgg_get_annotations($options);
   $total_votes = count($annotations);

   $options = array('guid' => $entity->guid, 'annotation_name' => 'votes', 'annotation_owner_guid' => $user->guid);
   $my_annotations = elgg_get_annotations($options);

   $counts = array();
   foreach(array("yes", "no", "block", "abstain") as $namen) {
       $counts[$name] = 0;
   }
   foreach($annotations as $annotation) {
       if (!isset($counts[$annotation->value]))
          $counts[$annotation->value] = 0;
       $counts[$annotation->value] += 1;
   }

   $points = $counts["yes"] - ($counts["no"] + $counts["block"]);
   if ($points > 0)
	$points = "+".$points;
   $status = "no_consensus";
   if ($counts["block"])
     $status = "blocked";
   elseif ($total_votes < $member_count/2)
     $status = "new";
   elseif ($counts["no"] >= $member_count / 2)
     $status = "no_consensus";
   elseif (($counts["yes"] > $counts["no"]+($member_count-$total_votes)))
     $status = "consensus";
  
   if (is_array($my_annotations) && count($my_annotations)) {
	$annotation = $my_annotations[0];
	$selected = $annotation->value;
        
   }

   echo "<div class='votes-points votes-status-$status'>";
   echo "$points";
   echo "</div>";
   echo "<div class='votes-info'>";
   $buttons = array('yes', 'no', 'block', 'abstain');
   foreach($buttons as $button) {
     $button_text = elgg_echo("proposals:votes:$button");
     if (!empty($counts[$button])) {
         $button_text .= " (".$counts[$button].")";
     }
     if ($button == $selected) {
       echo $button_text;
     }
     else {
         $votes_options = array('entity'=>$vars['entity'],
			'view' => "voting_form",
			'namespace' => $button,
			'form_options' => array('value'=>$button, 'guid'=>$entity->guid),
			'text' => "$button_text"
	 );
   	 echo elgg_view('proposals/voting_popup', $votes_options);

 /*      echo elgg_view('output/url', array(
          'href' => "action/proposals/vote?value=$button&guid=$entity->guid",
          'text' => $button_text,
          'is_action' => true,
       ));*/
     }
     echo " ";
   }
   $status_text = elgg_echo("proposals:votes:$status");
   echo "<br />";

   $votes_options = array('entity'=>$vars['entity'],
			'view' => "voting_results",
			'text' => "$total_votes/$member_count"
		);
   $votes_link = elgg_view('proposals/voting_popup', $votes_options);
   echo elgg_echo("proposals:votes:total").": $votes_link<br />";
   echo elgg_echo("proposals:votes:status").": $status_text";
   echo "</div>";
   echo "<div class='clearfloat'>";
   echo "</div>";
