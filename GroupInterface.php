<?php 

namespace App\Lib\ACF;

interface GroupInterface
{
	public function get_classname();
	public function get_title();
	public function get_locations();
	public function set_locations($locations = []);
	public function add_location($location = []);
	// TODO : implement remove_location
	public function register();
}