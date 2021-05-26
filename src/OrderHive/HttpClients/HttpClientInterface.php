<?php
namespace OrderHive\HttpClients;

interface HttpClientInterface
{
	
	public function get($cmd);
	
	public function post($cmd, array $data = []);
	
	public function put($cmd, array $data = []);
	
	public function delete($cmd);
	
	public function addHeader($header, $value = null);
}
