<?php

namespace RDGW\BankAccount;

use RDGW\Finder;
use RDGW\IFinder;
use RDGW\IGateway;

class BankAccountFinder extends Finder implements IFinder
{
	protected function getTableName(): string
	{
		return "BankAccount";
	}

	protected function getGatewayInstance(): IGateway
	{
		return new BankAccountRDGW();
	}
}
