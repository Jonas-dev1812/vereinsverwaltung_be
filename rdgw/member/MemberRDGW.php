<?php

namespace RDGW\Member;

use DateTime;
use JsonSerializable;

class MemberRDGW implements JsonSerializable
{
	private $ID;
	private $clubID;
	private $addressInformationID;
	private $bankAccountID;
	private $firstName;
	private $lastName;
	private $birthDate;
	private $gender;
	private $telephoneNumber;
	private $email;
	private $discount;

	public function getID(): int
	{
		return $this->ID;
	}

	public function getAddressInformationID(): int
	{
		return $this->addressInformationID;
	}

	public function getBankAccountID(): int
	{
		return $this->bankAccountID;
	}

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function getLastName(): string
	{
		return $this->lastName;
	}

	public function getBirthDate(): DateTime
	{
		return $this->birthDate;
	}

	public function getGender(): string
	{
		return $this->gender;
	}

	public function getTelephoneNumber(): string
	{
		return $this->telephoneNumber;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getDiscount(): int
	{
		return $this->discount;
	}

	public function getClubID(): int
	{
		return $this->clubID;
	}

	public function setID(string $val): void
	{
		$this->ID = $val;
	}

	public function setFirstName(string $val): void
	{
		$this->firstName = $val;
	}

	public function setLastName(string $val): void
	{
		$this->lastName = $val;
	}

	public function setBirthDate(DateTime $val): void
	{
		$this->birthDate = $val;
	}

	public function setGender(string $val): void
	{
		$this->gender = $val;
	}

	public function setTelephoneNumber(string $val): void
	{
		$this->telephoneNumber = $val;
	}

	public function setEmail(string $val): void
	{
		$this->email = $val;
	}

	public function setDiscount(int $val): void
	{
		$this->discount = $val;
	}

	public function setClubID(int $val): void
	{
		$this->clubID = $val;
	}

	public function setBankAccountID(int $val): void
	{
		$this->bankAccountID = $val;
	}

	public function setAddressInformationID(int $val): void
	{
		$this->addressInformationID = $val;
	}

	public function insert(): void
	{
	}

	public function update(): void
	{
	}

	public function jsonSerialize()
	{
		return [
			"ID" => $this->getID(),
			"bankAccountID" => $this->getBankAccountID(),
			"clubID" => $this->getClubID(),
			"addressInformationID" => $this->getAddressInformationID(),
			"telephoneNumber" => $this->getTelephoneNumber(),
			"email" => $this->getEmail(),
			"gender" => $this->getGender(),
			"getBirthDate" => $this->getBirthDate()->format("Y-m-d")
		];
	}
}
