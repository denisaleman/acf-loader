<?php 

namespace App\Lib\ACF;

interface RegistryInterface
{
	public function add($group);
	public function pop();
	public function get($title);
	public function remove($title);
}