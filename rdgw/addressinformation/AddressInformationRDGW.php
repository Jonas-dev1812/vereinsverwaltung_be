<?php

namespace RDGW\AddressInformation;

use PDOStatement;
use RDGW\Gateway;

class AddressInformationRDGW extends Gateway
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

	protected function getPreparedInsertStatementString(): string
	{
		return "INSERT INTO {$this->getTableName()} (street, houseNumber, city, zip, country) VALUES (?, ?, ?, ?, ?)";
	}

	protected function getPreparedUpdateStatementString(): string
	{
		return "UPDATE {$this->getTableName()} SET street = ?, houseNumber = ?, city = ?, zip = ?, country = ? WHERE ID = {$this->getID()}";
	}

	protected function executePreparedStatement(PDOStatement $stmt): void
	{
		$stmt->execute([$this->getStreet(), $this->getHouseNumber(), $this->getCity(), $this->getZip(), $this->getCountry()]);
	}

	protected function getTableName(): string
	{
		return "AddressInformation";
	}

	public function setByArray(array $array): void {
		$this->setCity($array["city"]);
		$this->setCountry($array["country"]);
		$this->setHouseNumber($array["houseNumber"]);
		$this->setStreet($array["street"]);
		$this->setZip($array["zip"]);

		if(isset($array["ID"])){
			$this->setID($array["ID"]);
		}
	} 

	public function jsonSerialize()
	{
		return [
			"ID" => $this->getID(),
			"city" => $this->getCity(),
			"houseNumber" => $this->getHouseNumber(),
			"street" => $this->getStreet(),
			"zip" => $this->getZip(),
		];
	}
}
