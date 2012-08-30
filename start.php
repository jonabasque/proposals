<?php
/**
 * Proposals
 *
 * @package Proposals
 *
 */

elgg_register_event_handler('init', 'system', 'proposals_init');

/**
 * Init proposals plugin.
 */
function proposals_init() {

	// add to the main css
	elgg_extend_view('css/elgg', 'proposals/css');

	// add group assemblies link to
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'assemblies_owner_block_menu');

	// add group assemblies link to
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'proposals_owner_block_menu');

	// Add group option
	add_group_tool_option('proposals', elgg_echo('proposals:enableproposals'), false);
	elgg_extend_view('groups/tool_latest', 'proposals/group_module');

	// 
	$action_path = elgg_get_plugins_path() . 'proposals/actions/proposals';
	elgg_register_action("proposals/vote", "$action_path/vote.php");

	// data types
	$variables = array(
		'title' => 'text',
		'description' => 'longtext',
		#'tags' => 'tags',
		'access_id' => 'access',
	);
	
	if (elgg_is_active_plugin('crud')) {
		$crud = crud_register_type('decission', $variables);
		$crud->children_type = 'proposal';
		$crud->module = 'proposals';
	}

	$variables = array(
		'title' => 'text',
		'description' => 'longtext',
		'tags' => 'tags',
		'access_id' => 'access',
	);
	
	if (elgg_is_active_plugin('crud')) {
		$crud = crud_register_type('proposal', $variables);
		#$crud->children_type = 'agenda_point';
		$crud->module = 'proposals';
	}
}

/**
 * Add a menu item to an ownerblock
 */
function proposals_owner_block_menu($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'group')) {
		if ($params['entity']->proposals_enable == "yes") {
			$url = "decission/owner/{$params['entity']->guid}";
			$item = new ElggMenuItem('proposals', elgg_echo('proposals:proposal:group'), $url);
			$return[] = $item;
		}
	}

	return $return;
}


