<?php
/**
 * Assembly English language file.
 *
 */

$english = array(
	'proposals' => 'Proposals',
	'proposals:enableproposals' => 'Enable group proposals',
	'proposals:decission:group' => 'Group decissions',

	// Proposals
	'proposals:proposal:none' => 'No proposals created yet',
	'item:object:proposal' => 'Proposals',
	'proposal:add' => 'Create proposal',
	'proposal:edit' => 'Edit proposal',

	// Proposal attributes
	'proposals:proposal:title' => 'Title',
	'proposals:proposal:description' => 'Description',
	'proposals:proposal:tags' => 'Tags',
	'proposals:proposal:access_id' => 'Access',
	'proposals:proposal:owner' => 'Created by %s',

	// Decissions
	'proposals:decission:none' => 'No decissions created yet',
	'item:object:decission' => 'Decissions',
	'decission:add' => 'Create new decission',
	'proposals:decission:children' => 'Proposals',
	'crud:decission:nochildren' => 'No proposals created yet',

	// Decission attributes
	'proposals:decission:title' => 'Title',
	'proposals:decission:description' => 'Description',
	'proposals:decission:tags' => 'Tags',
	'proposals:decission:access_id' => 'Access',
	'proposals:decission:owner' => 'Created by %s',

	// Group module
	'proposals:proposal:group' => 'Group decissions',
	'proposals:decission:write' => 'Write a new decission',

	// Votes
	'proposals:vote:create' => 'You set your vote to %s',
	'proposals:vote:update' => 'You updated your vote to %s',

	// river
	'river:create:object:decission' => '%s submitted a decission %s',
	'river:create:object:proposal' => '%s submitted a proposal %s',
	'river:edited:object:decission' => '%s edited a decission %s',
	'river:edited:object:proposal' => '%s edited a proposal %s',
	'river:comment:object:decission' => '%s commented on the decission %s',
	'river:comment:object:proposal' => '%s commented on the proposal %s',


);

add_translation('en', $english);
