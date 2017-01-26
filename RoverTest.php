<?php
require_once 'vendor/autoload.php';
require_once 'Rover.php';

use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase {
	
	public function testInitializeEmpty() {
		$rover = new Rover();
		$this->assertEquals($rover->get('x'), 0);
		$this->assertEquals($rover->get('y'), 0);
		$this->assertEquals($rover->get('dir'), 'w');
	}

	public function testInitialWithValues(){
		$rover = new Rover(1,2,'e');
		$this->assertEquals($rover->get('x'), 1);
		$this->assertEquals($rover->get('y'), 2);
		$this->assertEquals($rover->get('dir'), 'e');
	}

	public function testCanGoForwardFacingWest(){
		$rover = new Rover();
		$this->assertEquals($rover->get('x'), 0);

		$rover->forward();

		$this->assertEquals($rover->get('x'), 1);
		$this->assertEquals($rover->get('y'), 0);
		$this->assertEquals($rover->get('dir'), 'w');
	}


	public function testCanGoForwardFacingEast(){
		$rover = new Rover(0, 0, 'e');
		$this->assertEquals($rover->get('x'), 0);

		$rover->forward();

		$this->assertEquals($rover->get('x'), -1);
		$this->assertEquals($rover->get('y'), 0);
		$this->assertEquals($rover->get('dir'), 'e');
	}

	public function testCanGoForwardFacingNorth(){
		$rover = new Rover(0, 0, 'n');
		$this->assertEquals($rover->get('x'), 0);

		$rover->forward();

		$this->assertEquals($rover->get('x'), 0);
		$this->assertEquals($rover->get('y'), -1);
		$this->assertEquals($rover->get('dir'), 'n');
	}

	public function testCanGoForwardFacingSouth(){
		$rover = new Rover(0, 0, 's');
		$this->assertEquals($rover->get('x'), 0);

		$rover->forward();

		$this->assertEquals($rover->get('x'), 0);
		$this->assertEquals($rover->get('y'), 1);
		$this->assertEquals($rover->get('dir'), 's');
	}

	public function testCanGoBackwardFacingWest(){
		$rover = new Rover();
		$this->assertEquals($rover->get('x'), 0);

		$rover->backward();

		$this->assertEquals($rover->get('x'), -1);
		$this->assertEquals($rover->get('y'), 0);
		$this->assertEquals($rover->get('dir'), 'w');
	}


	public function testCanGoBackwardFacingEast(){
		$rover = new Rover(0, 0, 'e');
		$this->assertEquals($rover->get('x'), 0);

		$rover->backward();

		$this->assertEquals($rover->get('x'), 1);
		$this->assertEquals($rover->get('y'), 0);
		$this->assertEquals($rover->get('dir'), 'e');
	}

	public function testCanGoBackwardFacingNorth(){
		$rover = new Rover(0, 0, 'n');
		$this->assertEquals($rover->get('x'), 0);

		$rover->backward();

		$this->assertEquals($rover->get('x'), 0);
		$this->assertEquals($rover->get('y'), 1);
		$this->assertEquals($rover->get('dir'), 'n');
	}

	public function testCanGoBackwardFacingSouth(){
		$rover = new Rover(0, 0, 's');
		$this->assertEquals($rover->get('x'), 0);

		$rover->backward();

		$this->assertEquals($rover->get('x'), 0);
		$this->assertEquals($rover->get('y'), -1);
		$this->assertEquals($rover->get('dir'), 's');
	}

	public function testTurnLeftWhenFacingNorth(){
		$rover = new Rover(0,0,'n');
		$rover->left();
		$this->assertEquals('w', $rover->get('dir'));
	}

	public function testTurnLeftWhenFacingWest(){
		$rover = new Rover(0,0,'w');
		$rover->left();
		$this->assertEquals('s', $rover->get('dir'));
	}

	public function testTurnLeftWhenFacingSouth(){
		$rover = new Rover(0,0,'s');
		$rover->left();
		$this->assertEquals('e', $rover->get('dir'));
	}

	public function testTurnLeftWhenFacingEast(){
		$rover = new Rover(0,0,'e');
		$rover->left();
		$this->assertEquals('n', $rover->get('dir'));
	}


	public function testTurnRightWhenFacingNorth(){
		$rover = new Rover(0,0,'n');
		$rover->right();
		$this->assertEquals('e', $rover->get('dir'));
	}

	public function testTurnRightWhenFacingEast(){
		$rover = new Rover(0,0,'e');
		$rover->right();
		$this->assertEquals('s', $rover->get('dir'));
	}

	public function testTurnRightWhenFacingSouth(){
		$rover = new Rover(0,0,'s');
		$rover->right();
		$this->assertEquals('w', $rover->get('dir'));
	}
	public function testTurnRightWhenFacingWest(){
		$rover = new Rover(0,0,'w');
		$rover->right();
		$this->assertEquals('n', $rover->get('dir'));
	}

	public function testRoadtrip(){
		$rover = new Rover(0,0,'w');
		$rover->forward();
		$rover->forward();
		$this->assertEquals(2, $rover->get('x'));
		$rover->left();
		$this->assertEquals('s', $rover->get('dir'));
		$rover->forward();
		$this->assertEquals(1, $rover->get('y'));
		$this->assertEquals(2, $rover->get('x'));

	}


}