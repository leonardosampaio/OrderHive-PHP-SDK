<?php
namespace OrderHive\HttpClients;

use OrderHive\Exceptions\OrderHiveException;

class CurlHttpClient implements HttpClientInterface
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
		return $this->exec($cmd, 'delete');
	}
	
	private function exec($cmd, $method = 'get', array $data = [])
	{
		$ch = curl_init();
		
		$url = $this->url.$cmd;
		
		$options = array(
			CURLOPT_HTTPHEADER => $this->format_headers($this->headers),
			CURLOPT_URL => $url,
			CURLOPT_HEADER => false,
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_TIMEOUT => 60,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
		);
		if ($method == 'post' || $method == 'put') {
			$options[CURLOPT_POSTFIELDS] = json_encode($data);
		}
		if ($method != 'post' && $method != 'get') {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
		}
		curl_setopt_array($ch, $options);
		
		$result = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_error($ch);
			throw new OrderHiveException('CurlHttpClient error: '.$errno.': '.$error_message);
		}
		
		if ($result === false) {
			throw new OrderHiveException('CurlHttpClient error: Invalid response from API');
		}
		curl_close($ch);
		if ($result !== '') {
			$response = json_decode($result, true);
		}
		
		if ($response === null) {
			throw new OrderHiveException('CurlHttpClient error: Could not parse response from API');
		}
		
		return $response;
	}
	
	/**
	 * Format headers as values array, eg header_1, header_2...
	 *
	 * @param  array  $headers
	 * @return array
	 */
	private function format_headers(array $headers)
	{
		if (empty($headers)) {
			return [''];
		}
		$headers_array = array();
		foreach ($headers as $key => $val) {
			$headers_array[] = $key.': '.$val;
		}
		
		return $headers_array;
	}
	
	public function addHeader($header, $value = null)
	{
		$this->headers[$header] = $value;
	}
}
