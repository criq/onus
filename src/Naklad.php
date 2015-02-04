<?php

namespace Onus;

class Naklad {

	public function __construct($original, $level, $text) {
		$this->original = $original;
		$this->level    = $level;
		$this->text     = $text;
		$this->hash = sha1(serialize([
			$this->level,
			$this->text,
		]));
	}

}
