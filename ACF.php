<?php 

namespace App\Lib\ACF;

class ACF
{
	protected static $registry;
	protected static $loader;
	protected static $namespace;

	public static function init() {
		self::$namespace = 'App\\Controllers\\ACF';
		self::$registry = new Registry();
		self::$loader = new Loader();
		add_action('init', [get_called_class(), 'addGroups']);
	}

	public function group($name)
	{
		$group = self::$registry->get(self::$namespace . '\\' . $name);
		if(!$group) {
			$group = self::$loader->instantiateClass(self::$namespace . '\\' . $name);
			self::$registry->add($group);
		}
		return $group;
	}

	public static function addGroups()
	{
		$group = null;
		while($group = self::$registry->pop()) {
			$group->register();
		}
	}
}