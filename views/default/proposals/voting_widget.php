<?php

   $entity = elgg_extract('entity', $vars, FALSE);
   $user = elgg_get_logged_in_user_entity();

   $options = array('guid' => $entity->guid, 'annotation_name' => 'votes');
   $annotations = elgg_get_annotations($options);
   $options = array('guid' => $entity->guid, 'annotation_name' => 'votes', 'owner_guid' => $user->guid);
   $my_annotations = elgg_get_annotations($options);
   
   if (is_array($my_annotations) && count($my_annotations)) {
	$annotation = $my_annotations[0];
	$selected = $annotation->value;
        
   }


   $buttons = array('yes', 'no', 'block', 'abstain');
   foreach($buttons as $button) {
     if ($button == $selected) {
       echo $button;
     }
     else {
       echo elgg_view('output/url', array(
          'href' => "action/proposals/vote?value=$button&guid=$entity->guid",
          'text' => $button,
          'is_action' => true,
       ));
     }
     echo " ";
   }
   echo count($annotations);
