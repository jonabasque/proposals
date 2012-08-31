<?php

   $entity = elgg_extract('entity', $vars, FALSE);

   $options = array('guid' => $entity->guid, 'annotation_name' => 'votes');
   $annotations = elgg_get_annotations($options);
   $total_votes = count($annotations);

   echo elgg_view_annotation_list($annotations);

