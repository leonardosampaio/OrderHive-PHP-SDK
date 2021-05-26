<?php
namespace OrderHive\Models;

class ProductStore extends Model
{
	// Number	Store id for which you want to set price [Required].
	public $store_id;
	//	Double	Price value [Required].
	public $price;
	
	public $id;
	public $store_name;
	public $store_active;
	public $channel_id;
	public $product_name;
	public $product_sku;
	public $manage_stock_on_channel;
}
