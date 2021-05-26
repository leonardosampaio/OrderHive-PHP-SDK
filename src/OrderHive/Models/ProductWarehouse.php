<?php
namespace OrderHive\Models;

class ProductWarehouse extends Model
{
	// Number	Warehouse id [Required].
	public $warehouse_id;
	//	String	Warehouse name [Required].
	public $warehouse_name;
	// Number   Quantity in warehouse
	public $quantity;
	// Number   Quantity reserved in warehouse
	public $reserve_qty;
	// Number   Quantity purchased in warehouse
	public $purchase_qty;
}
