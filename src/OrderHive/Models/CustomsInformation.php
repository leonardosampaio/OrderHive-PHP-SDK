<?php
namespace OrderHive\Models;

class CustomsInformation extends Model
{
	// 	String	Description of category [1 - 2000 char].
	public $description;
	// 	Double	Price of product for customs.
	public $value;
	// 	String	Weight of product.
	public $weight;
	// 	String	Weight unit of the product.
	public $weight_unit;
	// 	String	Origin country of product
	public $origin_country;
	// 	String	HSN code of product. [1 - 100 char].
	public $hs_tariff_number;
}
