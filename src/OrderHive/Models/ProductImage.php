<?php
namespace OrderHive\Models;

class ProductImage extends Model
{
	// Number	Product image Id
	public $id;
	//	Image Url
	public $url;
	// Product image thumbnail
	public $thumbnail;
	// Product image name
	public $name;
	// Product image size
	public $size;
	// Product image is default
	public $default_image;
	// Date created
	public $created;
	// Date last modified
	public $modified;
	
	public function __construct(array $properties = array())
	{
		parent::__construct($properties);
		foreach ($properties as $key => $value) {
            switch ($key) {
                case 'image':
                    $this->url = $value;
                    unset ($this->image);
            }
        }
    }
}
