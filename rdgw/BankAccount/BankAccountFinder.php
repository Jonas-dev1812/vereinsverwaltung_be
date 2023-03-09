<?php

class BankAccountFinder
{
	public function find(int $id): BankAccountRDGW
	{
		return new BankAccountRDGW();
	}
}
