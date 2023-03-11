<?php

namespace RDGW\BankAccount;

class BankAccountFinder
{
	public function find(int $id): BankAccountRDGW
	{
		return new BankAccountRDGW();
	}
}
