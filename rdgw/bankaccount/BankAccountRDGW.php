<?php

namespace RDGW\BankAccount;

class BankAccountRDGW
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

	public function insert(): void
	{
	}

	public function update(): void
	{
	}
}
