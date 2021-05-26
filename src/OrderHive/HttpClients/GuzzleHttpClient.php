<?php
/**
 * Using Guzzle 5.0 (some things changed on Guzzle 6.0)
 */
namespace OrderHive\HttpClients;

use GuzzleHttp\Client;
use OrderHive\Exceptions\OrderHiveException;

class GuzzleHttpClient implements HttpClientInterface
{
	protected $headers = array();
	
	protected $url = '';
	
	public function __construct($params)
	{
		$this->url = $params['url'];
		if (empty($this->url)) {
			throw new OrderHiveException('CurlHttpClient: Invalid url');
		}
		
		if (isset($params['headers'])) {
			$this->headers = $params['headers'];
		}
	}
	
	public function get($cmd)
	{
		return $this->exec($cmd);
	}
	
	public function post($cmd, array $data = [])
	{
		return $this->exec($cmd, 'post', $data);
	}
	
	public function put($cmd, array $data = [])
	{
		return $this->exec($cmd, 'put', $data);
	}
	
	public function delete($cmd)
	{
		return $this->exec($cmd, 'delete', $data);
	}
	
	private function exec($cmd, $method = 'get', array $data = [])
	{
		$client = new Client(array('base_url' => $this->url));
		
		if ($method == 'get') {
			$response = $client->get($cmd, array(
				'headers' => $this->headers,
				'verify' => false // disable SSL verification
			));
		} elseif ($method == 'post') {
			$response = $client->post($cmd, array(
				'headers' => $this->headers,
				'body' => json_encode($data),
				'verify' => false // disable SSL verification
			));
		} elseif ($method == 'put') {
			$response = $client->put($cmd, array(
				'headers' => $this->headers,
				'body' => json_encode($data),
				'verify' => false // disable SSL verification
			));
		} elseif ($method == 'delete') {
			$response = $client->delete($cmd);
		}
		$data = $response->json();
		return $data;
	}
	
	public function addHeader($header, $value = null)
	{
		$this->headers[$header] = $value;
	}
}
