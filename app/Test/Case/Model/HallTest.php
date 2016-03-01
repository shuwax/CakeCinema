<?php
App::uses('Hall', 'Model');

/**
 * Hall Test Case
 */
class HallTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hall',
		'app.seat'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Hall = ClassRegistry::init('Hall');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Hall);

		parent::tearDown();
	}

}
