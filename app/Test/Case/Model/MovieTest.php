<?php
App::uses('Movie', 'Model');

/**
 * Movie Test Case
 */
class MovieTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.movie',
		'app.categories'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Movie = ClassRegistry::init('Movie');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Movie);

		parent::tearDown();
	}

}
