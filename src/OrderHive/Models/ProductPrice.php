<?php
namespace OrderHive\Models;

class ProductPrice extends Model
{
	// Number	Custom pricing tier id [Required]. 1 - Buy Price, 2 - Wholesale Price.
	public $price_id;
	//	Double	Price value [Required].
	public $price;
	// Price name [Buy, Wholesale]
	public $name;
	// Date created
	public $created;
	// Date last modified
	public $modified;
}
