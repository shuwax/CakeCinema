<?php
/**
 * Screening Fixture
 */
class ScreeningFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'screening';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'screening_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'Halls_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'Movies_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'Screening_Halls_FK' => array('column' => 'Halls_id', 'unique' => 0),
			'Screening_Movies_FK' => array('column' => 'Movies_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'screening_date' => '2016-02-25',
			'Halls_id' => 1,
			'Movies_id' => 1
		),
	);

}
