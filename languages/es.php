<?php
/**
 * Assembly Spanish language file.
 *
 */

$spanish = array(
	'proposals' => 'Propuestas',
	'proposals:enableproposals' => 'Activar las propuestas en el grupo',
	'decission:group' => 'Decisiones del grupo',

	// Proposals
	'proposals:proposal:none' => 'No hay propuestas creadas',
	'item:object:proposal' => 'Propuestas',
	'proposal:add' => 'Crear una propuesta',
	'proposal:edit' => 'Editar una propuesta',

	// Proposal attributes
	'proposals:proposal:title' => 'Título',
	'proposals:proposal:description' => 'Descripción',
	'proposals:proposal:tags' => 'Tags',
	'proposals:proposal:access_id' => 'Acceso',
	'proposals:proposal:owner' => 'Creada por %s',

	// Decissions
	'proposals:decission:none' => 'No hay decisiones creadas',
	'item:object:decission' => 'Decisiones',
	'decission:add' => 'Crear una nueva decisión',
	'proposals:decission:children' => 'Propuestas',
	'crud:decission:nochildren' => 'No hay propuestas creadass',

	// Decission attributes
	'proposals:decission:title' => 'Título',
	'proposals:decission:description' => 'Objetivo',
	'proposals:decission:tags' => 'Tags',
	'proposals:decission:access_id' => 'Acceso',
	'proposals:decission:owner' => 'Creada por %s',

	// Group module
	'proposals:decission:write' => 'Comenzar una nueva decisión',
	'proposals:decission:group' => 'Decisiones del grupo',

	// Votes
	'proposals:vote:create' => 'Has votado %s',
	'proposals:vote:update' => 'Has actualizado el voto a %s',
	'proposals:votes:consensus' => 'Consenso',
	'proposals:votes:no_consensus' => 'No hay consenso',
	'proposals:votes:blocked' => 'Bloqueada',
	'proposals:votes:new' => 'Nueva',
	'proposals:votes:status' => 'estado',
	'proposals:votes:total' => 'total',
	'proposals:votes:yes' => 'si',
	'proposals:votes:no' => 'no',
	'proposals:votes:block' => 'bloquear',
	'proposals:votes:abstain' => 'abstenerse',
	'proposals:votes:comment' => 'Comentario que añadir al voto',

	// Vote popup
	'proposals:votes:uservoteedthis' => '%s voto',
	'proposals:votes:usersvotedthis' => '%s votos',
	'proposals:votes:see' => 'Ver votos',

	// Other
	'decission:childof' => 'De la asamblea %s',
	'proposal:childof' => 'Propuesta para %s',
	'proposals:proposal:improves_guid' => 'Mejora',

	// river
	'river:create:object:decission' => '%s ha creado una decisión %s',
	'river:create:object:proposal' => '%s creado una propuesta %s',
	'river:edited:object:decission' => '%s ha editado una decisión %s',
	'river:edited:object:proposal' => '%s ha editado una propuesta %s',
	'river:comment:object:decission' => '%s ha comentado acerca de una decisión %s',
	'river:comment:object:proposal' => '%s ha comentado acerca de una propuesta %s',


);

add_translation('es', $spanish);
