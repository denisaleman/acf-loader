<?php 

namespace App\Lib\ACF;

class Loader
{
	public function instantiateClass(string $class) {
		if(class_exists($class)) {
			return new $class();
		}
	}
}