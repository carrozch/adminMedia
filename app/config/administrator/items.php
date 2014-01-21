<?php

/**
 * Items model config
 */

return array(

	'title' => 'Products',

	'single' => 'item',

	'model' => 'Item',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'product_id' => array(
			'title' => 'Associated Product',
			//'relationship' => 'getProduct',
			//'select' => '(:table).name',
		),
		'status_media' => array(
			'title' => 'Status',
		),
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
		'status_media' => array(
			'title' => 'Status',
			'type' => 'enum',
			'options' => array('free', 'blocked'),
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
		'status_media' => array(
			'title' => 'Status',
			'type' => 'enum',
			'options' => array('free', 'blocked'),
		),
		'media' => array(
			'title' => 'Associated Media',
			'type' => 'relationship',
			'select' => 'name',
		),
	),
	
	/**
	 * This is where you can define the model's global custom actions
	 */
	'global_actions' => array(
		'import_xml' => array(
			'title' => 'Update',
			'messages' => array(
				'active' => 'Loading...',
				'success' => 'Success!',
				'error' => 'An error occured',
			),
			//the Eloquent query builder is passed to the closure
			'action' => function($query)
			{
				//get all the rows for this query
				$result = $query->get();

				//do something to put it into excel
				$filePath = 'test';

				//return a download response
				return Response::download($filePath);
			}
		),
	),

);