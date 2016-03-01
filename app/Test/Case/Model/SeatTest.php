<?php
App::uses('Seat', 'Model');

/**
 * Seat Test Case
 */
class SeatTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.seat',
		'app.halls'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Seat = ClassRegistry::init('Seat');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Seat);

		parent::tearDown();
	}

}
