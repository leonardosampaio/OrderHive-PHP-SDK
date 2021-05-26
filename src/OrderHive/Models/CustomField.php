<?php
namespace OrderHive\Models;

class CustomField extends Model
{
	// String	Custom field id.
	public $id;
	// String   Custom field name
	public $name;
	//	String	Custom field value.
	public $value;
	//	String	Custom field type.
	public $type;
	// Bool Show on front card
	public $show_on_frontcard;
}
