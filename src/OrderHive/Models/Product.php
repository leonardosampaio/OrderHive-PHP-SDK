<?php

namespace OrderHive\Models;

class Product extends Model
{
    // Int The id of the product [Required]
    public $id;
    //	String	The name of the product [Required, 1 - 1024 char].
    public $name;
    //	String	Sku of the product [Required, 1 - 100 char].
    public $sku;
    //	String	Description of product [1 - 1000 char].
    public $description;
    //	String	Brand of product [1- 100 char].
    public $brand;
    //	String	Barcode of product [1 - 20 char].
    public $barcode;
    //	String	Weight of product.
    public $weight;
    //	String	Weight unit of the product.
    public $weight_unit;
    //	String	HSN code of product. [1 - 100 char].
    public $hsn_code;
    //	Number	Threshold to calculate status of stock like in stock, low stock.
    public $threshold;
    //	ProductCategory Product Category.
    public $category;
    //	ProductPrice[]	Custom prices including buy and wholesale price.
    public $product_prices;
    //	ProductStore[]	Product store and their prices.
    public $product_stores;
    //	Tag[]	Tags to assign.
    public $tags;
    //	CustomField[]	Custom fields value of product.
    public $custom_fields;
    //	CustomsInformation of product.
    public $customs_information;
    // ProductWarehouse[]  Warehouse(s) containing product
    public $product_warehouses;
    // ProductImage[]   Product image(s)
    public $product_images;

    public function __construct(array $properties = array())
    {
	    parent::__construct($properties);
	    foreach (get_object_vars($this) as $key => $value) {
		    if (isset($value)) {
			    switch ($key) {
				    case 'product_prices':
					    $product_prices = [];
					    foreach ($value as $productPrice) {
						    $product_prices[] = new ProductPrice($productPrice);
					    }
					    $this->product_prices = $product_prices;
					    break;
				    case 'product_warehouses':
					    $product_warehouses = [];
					    foreach ($value as $productWarehouse) {
						    $product_warehouses[] = new ProductWarehouse($productWarehouse);
					    }
					    $this->product_warehouses = $product_warehouses;
					    break;
				    case 'product_stores':
					    $product_stores = [];
					    foreach ($value as $productStore) {
						    $this->product_stores[] = new ProductStore($productStore);
					    }
					    $this->product_stores = $product_stores;
					    break;
				    case 'product_images':
					    $product_images = [];
					    foreach ($value as $productImage) {
						    $this->product_images[] = new ProductImage($productImage);
					    }
					    $this->product_images = $product_images;
					    break;
				    case 'image':
					    $this->product_images[] = new ProductImage($value);
					    unset($this->image);
					    break;
				    case 'customs_information':
					    $this->customs_information = new CustomsInformation($value);
					    break;
				    case 'custom_fields':
					    $custom_fields = [];
					    foreach ($value as $customField) {
						    $this->custom_fields[] = new CustomField($customField);
					    }
					    $this->custom_fields = $custom_fields;
					    break;
				    default:
					    $this->{$key} = $value;
			    }
		    }
	    }
    }
}
