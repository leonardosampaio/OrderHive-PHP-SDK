# OrderHive PHP SDK


A PHP client (fancy named SDK) to access OrderHive API.
Default HTTP library is CURL but it works with Guzzle too.


*Note: this is not an official OrderHive package; all product names, logos, and brands are property of their respective owners.*

## Installation

With [Composer](https://getcomposer.org/). Add the OrderHive PHP SDK package to your `composer.json` file.

```json
{
    "require": {
        "orderhive/php-sdk": "~1.0"
    }
}
```


## Usage

> **Note:** PHP 7 or greater is required.

Using

```
$config = array(
    'id_token' => 'YOUR_ID_TOKEN',
    'refresh_token' => 'YOUR_REFRESH_TOKEN'
    // 'client_http' => 'guzzle' // if you want to use guzzle 5.0    
);

$app = new OrderHive($config);
$result = $app->post('companies/search');
print_r($result);
```


## Tests

1. [Composer](https://getcomposer.org/) is a prerequisite for running the tests.
   Install composer globally, then run `composer install` to install required files.
2. Get API credentials from OrderHive and update the $config array.
3. The tests can be executed by running this command from the root directory:

```bash
$ ./vendor/bin/phpunit
```