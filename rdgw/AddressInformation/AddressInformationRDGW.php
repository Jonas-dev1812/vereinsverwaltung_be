<?php

class AddressInformationRDGW
{
	private $street;
	private $houseNumber;
	private $city;
	private $zip;
	private $country;

	public function getStreet(): string
	{
		return $this->street;
	}

	public function getHouseNumber(): string
	{
		return $this->houseNumber;
	}

	public function getCity(): string
	{
		return $this->city;
	}

	public function getZip(): string
	{
		return $this->zip;
	}

	public function getCountry(): string
	{
		return $this->country;
	}

	public function setStreet(string $val): void
	{
		$this->street = $val;
	}

	public function setHouseNumber(string $val): void
	{
		$this->houseNumber = $val;
	}

	public function setCity(string $val): void
	{
		$this->city = $val;
	}

	public function setZip(string $val): void
	{
		$this->zip = $val;
	}

	public function setCountry(string $val): void
	{
		$this->country = $val;
	}

	public function insert(): void
	{
	}

	public function update(): void
	{
	}
}
