<?php
/**
 * Created by PhpStorm.
 * User: Ivan Koretskiy aka gillbeits[at]gmail.com
 * Date: 02.03.16
 * Time: 16:12
 */

namespace Creational;


trait Multiton {

	use Singleton;

	/**
	 * @return static
	 */
	public static function getInstance()
	{
		return static::getNamedInstance();
	}

	public static function getNamedInstance($key = '__DEFAULT__')
	{
		if (!isset(static::$instance[$key])) {
			if (!static::$instance) {
				static::$instance = [];
			}
			static::$instance[$key] = (new \ReflectionClass(get_called_class()))
				->newInstanceWithoutConstructor();
		}

		return static::$instance[$key];
	}
}
