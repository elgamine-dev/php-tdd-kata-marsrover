<?php

class Rover {
	private $x;
	private $y;
	private $dir;

	public function __construct($x=0, $y=0, $dir='w'){
		$this->x = $x;
		$this->y = $y;
		$this->dir = $dir;
	}

	public function left(){
		if($this->dir === 'n') {
			return $this->dir = "w";
		}
		if($this->dir === 'w') {
			return $this->dir = "s";
		}
		if($this->dir === 's') {
			return $this->dir = "e";
		}
		if($this->dir === 'e') {
			return $this->dir = "n";
		}

	}

	public function right(){
		if($this->dir === 'n') {
			return $this->dir = "e";
		}
		if($this->dir === 'e') {
			return $this->dir = "s";
		}
		if($this->dir === 's') {
			return $this->dir = "w";
		}
		if($this->dir === 'w') {
			return $this->dir = "n";
		}
	}

	public function forward(){
		if($this->dir === 'w') {
			$this->x = $this->x + 1;
		}
		if($this->dir === 'e') {
			$this->x = $this->x - 1;
		}
		if($this->dir === 'n') {
			$this->y = $this->y - 1;
		}
		if($this->dir === 's') {
			$this->y = $this->y + 1;
		}
	}

	public function backward(){
		if($this->dir === 'w') {
			$this->x = $this->x - 1;
		}
		if($this->dir === 'e') {
			$this->x = $this->x + 1;
		}
		if($this->dir === 'n') {
			$this->y = $this->y + 1;
		}
		if($this->dir === 's') {
			$this->y = $this->y - 1;
		}
	}


	public function get($data) {
		return $this->$data;
	}

}