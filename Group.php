<?php 

namespace App\Lib\ACF;

abstract class Group implements GroupInterface
{
	protected $data = [];

	abstract protected function data();

	public function __construct($data = [])
	{

		$this->data = $data ?: $this->data();
	}

	public function get_classname()
	{
		return static::class;
	}

	public function get_title()
	{
		return $this->data['title'];
	}

	public function get_locations()
	{
		return $data['location'] ?? [];
	}

	public function set_locations($locations = [])
	{
		$this->data['location'] = $locations;
		return $this;
	}

	public function add_location($location = [])
	{
		$this->data['location'][] = $location;
		return $this;
	}

	// TODO : implement remove_location

	public function register()
	{
		acf_add_local_field_group($this->data);
	}
}