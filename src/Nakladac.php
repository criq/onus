<?php

namespace Onus;

class Nakladac {

	public function __construct($original, $level) {
		$this->original = trim($original);
		$this->level = $level ?: 5;
	}

	public function nakladej() {
		$text = preg_replace('#["„“]#', null, $this->original);
		$level = $this->level;

		$text = mb_ereg_replace_callback('#\b(\w+)\b#u', function($i) use($level) {
			$word = $i[1];
			if (rand(1, $level) == 1) {
				return '„' . $word . '“';
			} else {
				return $word;
			}
		}, $text);

		return new Naklad($this->original, $this->level, $text);
	}

}
