<?php
   $vote = get_input('value');
   $guid = get_input('guid');

   $entity = get_entity($guid);
   $user = elgg_get_logged_in_user_entity();

   if (!$entity->canAnnotate(0, 'votes')) {
	register_error(elgg_echo("votes:cannotvote"));
        forward(REFERER);
   }


   $options = array('guid' => (int)$guid,
		    'annotation_name' => 'votes',
		    'annotation_owner_guid' => $user->guid);

   $annotations = elgg_get_annotations($options);
   
   if (is_array($annotations) && count($annotations)) {
	$annotation = $annotations[0];
        $id = $annotation->id;
   	update_annotation($id,
                                        'votes',
                                        $vote,
                                        "",
                                        $user->guid,
                                        $entity->access_id);
        system_message(elgg_echo("proposals:vote:update", array($vote)));
   } else {
   	$annotation = create_annotation($guid,
                                        'votes',
                                        $vote,
                                        "",
                                        $user->guid,
                                        $entity->access_id);
        system_message(elgg_echo("proposals:vote:create", array($vote)));

   }


   forward(REFERER);
   //forward($entity->getURL());
