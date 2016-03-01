<?php
/**
 * Seat Fixture
 */
class SeatFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'num_rown' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'num_seat' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Halls_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'num_rown' => 1,
			'num_seat' => 1,
			'Halls_id' => 1
		),
	);

}
