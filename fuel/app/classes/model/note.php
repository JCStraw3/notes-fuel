<?php

use Orm\Model;

class Model_Note extends Model{

	// Attributes.

	protected static $_properties = array(
		'id',
		'title',
		'body',
		'created_at',
		'updated_at',
	);

	// Timestamps.

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	// Table name.

	protected static $_table_name = 'notes';

}