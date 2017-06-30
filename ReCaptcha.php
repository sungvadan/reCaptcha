<?php

class ReCaptcha
{
	private $secret = "6LeehCcUAAAAALQGwPE2deD6W2_VQIVdoiKKfPFL";

	private $url = 'https://www.google.com/recaptcha/api/siteverify';




	public function isValid($response)
	{
		$data = [
			'secret' => $this->secret, 
			'response' => $response, 
		];

		$url = $this->url.'?'.http_build_query($data);

		if(function_exists("curl_version")){
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 2);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$response = curl_exec($curl);
		}else{
			$response = file_get_contents($url);
		}

		$response = json_decode($response);

		return $response->success;

	}

}