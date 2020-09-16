<?php 

namespace App\Lib\ACF;

class Registry implements RegistryInterface
{
	protected $groups = [];
	protected $namespace;

	protected function _key($str) {
		return substr(md5($str), 0, 10);
	}

	public function add($group)
	{
		$key = $this->_key($group->get_classname());

		$this->groups[$key] = $group;
	}

	public function pop()
	{
		return array_pop($this->groups);
	}

	public function get($name)
	{
		$key = $this->_key($name);

		return $this->groups[$key];
	}

	public function remove($name)
	{
		$key = $this->_key($name);

        unset($this->groups[$key]);
	}
}