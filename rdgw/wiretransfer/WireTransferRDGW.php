<?php

namespace RDGW\WireTransfer;

use DateTime;
use PDOStatement;
use RDGW\Gateway;

class WireTransferRDGW extends Gateway
{
	private $transferDate;
	private $toAccountID;
	private $fromAccountID;
	private $amount;

	public function getTransferDate(): DateTime
	{
		return $this->transferDate;
	}

	public function getToAccountID(): int
	{
		return $this->toAccountID;
	}

	public function getFromAccountID(): int
	{
		return $this->fromAccountID;
	}

	public function getAmount(): int
	{
		return $this->amount;
	}

	public function setToAccountID(int $val): void
	{
		$this->toAccountID = $val;
	}

	public function setFromAccountID(int $val): void
	{
		$this->fromAccountID = $val;
	}

	public function setAmount(int $val): void
	{
		$this->amount = $val;
	}

	protected function getPreparedInsertStatementString(): string
	{
		return "INSERT INTO {$this->getTableName()} (transferDate, toAccountID, fromAccountID) VALUES (?, ?, ?, ?)";
	}

	protected function getPreparedUpdateStatementString(): string
	{
		return "UPDATE {$this->getTableName()} SET transferDate = ?, toAccountID = ?, fromAccountID = ?, amount = ? WHERE ID = {$this->getID()}";
	}

	protected function executePreparedStatement(PDOStatement $stmt): void
	{
		$stmt->execute([$this->getTransferDate(), $this->getToAccountID(), $this->getFromAccountID(), $this->getAmount()]);
	}

	protected function getTableName(): string
	{
		return "WireTransfer";
	}

	public function setByArray(array $array): void
	{
		$this->setToAccountID($array["toAccountID"]);
		$this->setFromAccountID($array["fromAccountID"]);
		$this->setAmount($array["amount"]);

		if (isset($array["ID"])) {
			$this->setID($array["ID"]);
		}
	}

	public function jsonSerialize()
	{
		return [
			"ID" => $this->getID(),
			"toAccountID" => $this->getToAccountID(),
			"fromAccountID" => $this->getFromAccountID(),
			"transferDate" => $this->getTransferDate(),
			"amount" => $this->getAmount(),
		];
	}
}
