<?php
namespace OrderHive\Models;

use DateTime;

class Model
{
	/**
	 * Default constructor
	 * @param  array  $properties
	 */
	public function __construct(array $properties = array())
	{
		foreach ($properties as $key => $value) {
			switch ($key) {
				case 'created':
				case 'modified':
					$this->{$key} = new DateTime(date('m/d/Y h:i:s', $value));
					break;
				default:
					$this->{$key} = $value;
			}
		}
	}
}
