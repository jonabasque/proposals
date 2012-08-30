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
   $status = "no consensus";
   if ($counts["block"])
     $status = "blocked";
   elseif ($counts["no"] >= $member_count / 2)
     $status = "no consensus";
   elseif ($counts["yes"] > $counts["no"])
     $status = "consensus";
  
   if (is_array($my_annotations) && count($my_annotations)) {
	$annotation = $my_annotations[0];
	$selected = $annotation->value;
        
   }


   $buttons = array('yes', 'no', 'block', 'abstain');
   foreach($buttons as $button) {
     $button_text = $button;
     if (!empty($counts[$button])) {
         $button_text .= " (".$counts[$button].")";
     }
     if ($button == $selected) {
       echo $button_text;
     }
     else {
       echo elgg_view('output/url', array(
          'href' => "action/proposals/vote?value=$button&guid=$entity->guid",
          'text' => $button_text,
          'is_action' => true,
       ));
     }
     echo " ";
   }
   echo "<br />";
   echo "total: $total_votes/$member_count<br />";
   echo "points: $points<br />";
   echo "status: $status";
