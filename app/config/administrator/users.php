<?php

/**
 * Users model config
 */

return array(

	'title' => 'Users',

	'single' => 'user',

	'model' => 'User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'username',
		'email',
		'status',
		'media' => array(
			'title' => 'Associated Media',
			'relationship' => 'media',
			'select' => '(:table).name',

		),
		'created_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'username',
		'email',
		'status' => array(
			'title' => 'Status',
			'type' => 'enum',
			'options' => array('user', 'admin'),
		),
		'media' => array(
			'title' => 'Associated Media',
			'type' => 'relationship',
			'select' => 'name',

		),
		'created_at' => array(
			'type' => 'datetime'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'username',
		'email',
		'status' => array(
			'title' => 'Status',
			'type' => 'enum',
			'options' => array('user', 'admin'),
		),
		'media' => array(
			'title' => 'Associated Media',
			'type' => 'relationship',
			'select' => 'name',
		),
	),

);