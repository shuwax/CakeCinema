<?php
App::uses('Cinema', 'Model');

/**
 * Cinema Test Case
 */
class CinemaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cinema'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cinema = ClassRegistry::init('Cinema');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cinema);

		parent::tearDown();
	}

}
