<?php

class DescShort {
	private $shortUrlCode;
	private $shortOwnerIp;
	private $shortUrlBase;
	private $shortBaseUrl;

	public function getShortUrlCode() {
		return $this->shortUrlCode;
	}

	public function setShortUrlCode($shortUrlCode) {
		return $this->shortUrlCode = $shortUrlCode;
	}

	public function getShortOwnerIp() {
		return $this->shortOwnerIp;
	}

	public function setShortOwnerIp($shortOwnerIp) {
		return $this->shortOwnerIp = $shortOwnerIp;
	}

	public function getShortUrlBase() {
		return $this->shortUrlBase;
	}

	public function setShortUrlBase($shortUrlBase) {
		return $this->shortUrlBase = $shortUrlBase;
	}

	public function getShortBaseUrl()
	{
	    return $this->shortBaseUrl;
	}
	
	public function setShortBaseUrl($shortBaseUrl)
	{
	    return $this->shortBaseUrl = $shortBaseUrl;
	}
}