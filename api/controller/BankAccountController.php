<?php

namespace API\Controller;

use RDGW\BankAccount\BankAccountFinder;
use RDGW\BankAccount\BankAccountRDGW;
use RDGW\IFinder;
use RDGW\IGateway;

class BankAccountController extends GatewayController
{
	public function getFinder(): IFinder
	{
		return new BankAccountFinder();
	}

	public function getNewGatewayInstance(): IGateway
	{
		return new BankAccountRDGW();
	}
}
