<?php
App::uses('Screening', 'Model');

/**
 * Screening Test Case
 */
class ScreeningTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.screening'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Screening = ClassRegistry::init('Screening');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Screening);

		parent::tearDown();
	}

}
