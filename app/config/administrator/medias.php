<?php

/**
 * Medias model config
 */

return array(

	'title' => 'Medias',

	'single' => 'medias',

	'model' => 'Media',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'num_products' => array(
			'title' => '# Products',
			'relationship' => 'getProduct',
			'select' => 'COUNT((:table).id)',
		),

		'intro_text' => array(
			'title' => 'Short description',
		),
		'full_text' => array(
			'title' => 'Long description',
		),
		
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name',
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name',
		'intro_text',
		'full_text',
	),

);