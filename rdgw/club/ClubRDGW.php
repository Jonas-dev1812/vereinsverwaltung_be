<?php

namespace RDGW\Club;

use PDOStatement;
use RDGW\Gateway;

class ClubRDGW extends Gateway
{
	private $ID;
	private $name;
	private $type;
	private $bankAccountID;
	private $membershipFee;

	public function getID(): int
	{
		return $this->ID;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getType(): string
	{
		return $this->type;
	}

	public function getBankAccountID(): int
	{
		return $this->bankAccountID;
	}

	public function getMembershipFee(): int
	{
		return $this->membershipFee;
	}

	public function setID(int $val): void
	{
		$this->ID = $val;
	}

	public function setName(string $name)
	{
		$this->name = $name;
	}

	public function setType(string $type)
	{
		$this->type = $type;
	}

	public function setBankAccountID(int $bankAccountID): void
	{
		$this->bankAccountID = $bankAccountID;
	}

	public function setMembershipFee(int $val): void
	{
		$this->membershipFee = $val;
	}

	protected function getPreparedInsertStatementString(): string
	{
		return "INSERT INTO {$this->getTableName()} (name, type, bankAccountID, membershipFee) VALUES (?, ?, ?, ?)";
	}

	protected function getPreparedUpdateStatementString(): string
	{
		return "UPDATE {$this->getTableName()} SET name = ?, type = ?, bankAccountID = ?, membershipFee = ? WHERE ID = {$this->getID()}";
	}

	protected function executePreparedStatement(PDOStatement $stmt): void
	{
		$stmt->execute([$this->getName(), $this->getType(), $this->getBankAccountID(), $this->getMembershipFee()]);
	}

	protected function getTableName(): string
	{
		return "Club";
	}

	public function setByArray(array $array): void
	{
		$this->setBankAccountID($array["bankAccountID"]);
		$this->setName($array["name"]);
		$this->setType($array["type"]);
		$this->setMembershipFee($array["membershipFee"]);

		if (isset($array["ID"])) {
			$this->setID($array["ID"]);
		}
	}

	public function jsonSerialize()
	{
		return [
			"name" => $this->getName(),
			"bankAccountID" => $this->getBankAccountID(),
			"ID" => $this->getID(),
			"type" => $this->getType(),
			"membershipFee" => $this->getMembershipFee()
		];
	}
}