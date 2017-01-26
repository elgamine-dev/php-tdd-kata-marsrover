<?php

class Rover {
	private $x;
	private $y;
	private $dir;

	private $directions = [
		'cardinals'=> ['n','e','s','w'],
		'x'=>[0, -1, 0, 1],
		'y'=>[-1, 0, 1, 0]
	];

	public function __construct($x=0, $y=0, $dir='w'){
		$this->x = $x;
		$this->y = $y;
		$this->dir = $dir;
	}

	public function left(){
		$this->turn(true);
	}

	public function right(){
		$this->turn(false);
	}

	private function turn($left = true){
		$shift = ($left) ? - 1 : 1;
		$bound = ($left) ? count($this->directions['cardinals']) - 1 : 0;
		$key = array_search($this->dir, $this->directions['cardinals']);
		if(isset($this->directions['cardinals'][$key + $shift])) {
			$this->dir = $this->directions['cardinals'][$key + $shift];
		} else {
			$this->dir = $this->directions['cardinals'][$bound];
		}
	}

	public function forward(){
		$this->move(1);
	}

	public function backward(){
		$this->move(-1);
	}

	private function move($dir = 1){
		$key = array_search($this->dir, $this->directions['cardinals']);
		$this->x = $this->x + $this->directions['x'][$key] * $dir;
		$this->y = $this->y + $this->directions['y'][$key] * $dir;
	}


	public function get($data) {
		return $this->$data;
	}

}