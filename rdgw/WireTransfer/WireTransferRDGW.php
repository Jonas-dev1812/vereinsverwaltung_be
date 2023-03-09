<?php

class WireTransferRDGW
{
	private $transferDate;
	private $toAccountID;
	private $fromAccountID;

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

	public function setToAccountID(int $val): void
	{
		$this->toAccountID = $val;
	}

	public function setFromAccountID(int $val): void
	{
		$this->fromAccountID = $val;
	}

	public function insert(): void
	{
	}

	public function update(): void
	{
	}
}
