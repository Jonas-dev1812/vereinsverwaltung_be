<?php

namespace RDGW\Member;

use DateTime;
use PDOStatement;
use RDGW\Gateway;

class MemberRDGW extends Gateway
{
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

	protected function getPreparedInsertStatementString(): string
	{
		return "INSERT INTO {$this->getTableName()} (bankAccountID, clubID, addressInformationID, telephoneNumber, email, gender, birthDate, firstName, lastName, discount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	}

	protected function getPreparedUpdateStatementString(): string
	{
		return "UPDATE {$this->getTableName()} SET bankAccountID = ?, clubID = ?, addressInformationID = ?, telephoneNumber = ?, email = ?, gender = ?, birthDate = ?, firstName = ?, lastName = ?, discount = ? WHERE ID = {$this->getID()}";
	}

	protected function executePreparedStatement(PDOStatement $stmt): void
	{
		$stmt->execute([$this->getBankAccountID(), $this->getClubID(), $this->getAddressInformationID(), $this->getTelephoneNumber(), $this->getEmail(), $this->getGender(), $this->getBirthDate()->format("Y-m-d"), $this->getFirstName(), $this->getLastName(), $this->getDiscount()]);
	}

	protected function getTableName(): string
	{
		return "Member";
	}

	public function setByArray(array $array): void
	{
		$birthDate = DateTime::createFromFormat("Y-m-d", $array["birthDate"]);
		$this->setAddressInformationID($array["addressInformationID"]);
		$this->setBankAccountID($array["bankAccountID"]);
		$this->setBirthDate($birthDate);
		$this->setClubID($array["clubID"]);
		$this->setDiscount($array["discount"]);
		$this->setEmail($array["email"]);
		$this->setGender($array["gender"]);
		$this->setLastName($array["lastName"]);
		$this->setTelephoneNumber($array["telephoneNumber"]);
		$this->setFirstName($array["firstName"]);

		if (isset($array["ID"])) {
			$this->setID($array["ID"]);
		}
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
			"birthDate" => $this->getBirthDate()->format("Y-m-d"),
			"firstName" => $this->getFirstName(),
			"lastName" => $this->getLastName(),
			"discount" => $this->getDiscount()
		];
	}
}
