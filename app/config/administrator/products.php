<?php

/**
 * Products model config
 */

return array(

	'title' => 'Products',

	'single' => 'product',

	'model' => 'Product',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'company_name' => array(
			'title' => 'Company',
		),
		'price' => array(
			'title' => 'Price',
			'select' => "CONCAT((:table).price, ' ', (:table).currency)",
		),
		'status' => array(
			'title' => 'Status',
		),
		'media' => array(
			'title' => 'Associated Media',
			'relationship' => 'media',
			'select' => '(:table).name',

		),
		'description' => array(
			'title' => 'Description',
		),
		'created_at',
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name',
		'company_name',
		'price',
		'status' => array(
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
		'name',
		'company_name',
		'price',
		'currency',
		'status' => array(
			'title' => 'Status',
			'type' => 'enum',
			'options' => array('free', 'blocked'),
		),
		'media' => array(
			'title' => 'Associated Media',
			'type' => 'relationship',
			'select' => 'name',
		),
		'description',
	),
	
	/**
	 * This is where you can define the model's global custom actions
	 */
	'global_actions' => array(
		'import_xml' => array(
			'title' => 'Import XML',
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