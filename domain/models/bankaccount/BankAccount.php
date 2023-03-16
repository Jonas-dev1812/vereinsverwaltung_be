<?php

namespace Domain\Models\BankAccount;

use RDGW\BankAccount\BankAccountRDGW;

class BankAccount
{
	protected $gateway;

	public function __construct(BankAccountRDGW $gateway)
	{
		$this->gateway = $gateway;
	}

	public function getIBAN(): string
	{
		return $this->gateway->getIban();
	}
}
