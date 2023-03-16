<?php

namespace Bank\Simulation;

use DataBase\Database;
use DateTime;
use PDOStatement;

class BankWireTransferRDGW
{
	private $fromIBAN;
	private $toIBAN;
	private $amount;
	private $transferDate;

	public function getAmount(): int
	{
		return $this->amount;
	}

	public function getToIBAN(): string
	{
		return $this->toIBAN;
	}

	public function getFromIBAN(): string
	{
		return $this->fromIBAN;
	}

	public function getTransferDate(): DateTime
	{
		return $this->transferDate;
	}

	public function setAmount(int $val): void
	{
		$this->amount = $val;
	}

	public function setFromIBAN(string $val): void
	{
		$this->fromIBAN = $val;
	}

	public function setToIBAN(string $val): void
	{
		$this->toIBAN = $val;
	}

	public function setTransferDate(DateTime $val): void
	{
		$this->transferDate = $val;
	}

	public function insert(): void
	{
		$db = Database::getInstance();
		$pdo = $db->getConnection();
		$stmt = $pdo->prepare($this->getPreparedInsertStatementString());
		$this->executePreparedStatement($stmt);
	}

	protected function getPreparedInsertStatementString(): string
	{
		return "INSERT INTO {$this->getTableName()} (transferDate, toIBAN, fromIBAN, amount) VALUES (?, ?, ?, ?)";
	}

	protected function executePreparedStatement(PDOStatement $stmt): void
	{
		$stmt->execute([$this->getTransferDate()->format("Y-m-d"), $this->getToIBAN(), $this->getFromIBAN(), $this->getAmount()]);
	}

	protected function getTableName(): string
	{
		return "BankWireTransfer";
	}
}
