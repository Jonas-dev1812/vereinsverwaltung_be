<?php

namespace RDGW\BankAccount;

use PDOStatement;
use RDGW\Gateway;

class BankAccountRDGW extends Gateway
{
	private $bic;
	private $iban;
	private $name;

	public function getBic()
	{
		return $this->bic;
	}

	public function getIban()
	{
		return $this->iban;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setBic(string $bic)
	{
		$this->bic = $bic;
	}

	public function setIban(string $iban)
	{
		$this->iban = $iban;
	}

	public function setName(string $name)
	{
		$this->name = $name;
	}

	protected function getPreparedInsertStatementString(): string
	{
		return "INSERT INTO {$this->getTableName()} (name, bic, iban) VALUES (?, ?, ?)";
	}

	protected function getPreparedUpdateStatementString(): string
	{
		return "UPDATE {$this->getTableName()} SET name = ?, bic = ?, iban = ? WHERE ID = {$this->getID()}";
	}

	protected function executePreparedStatement(PDOStatement $stmt): void
	{
		$stmt->execute([$this->getName(), $this->getBic(), $this->getIban()]);
	}

	protected function getTableName(): string
	{
		return "BankAccount";
	}

	public function setByArray(array $array): void
	{
		$this->bic = $array["bic"];
		$this->iban = $array["iban"];
		$this->name = $array["name"];

		if(isset($array["ID"])){
			$this->setID($array["ID"]);
		}
	}

	public function jsonSerialize()
	{
		return [
			"ID" => $this->getID(),
			"bic" => $this->getBic(),
			"iban" => $this->getIban(),
			"name" => $this->getName()
		];
	}
}
