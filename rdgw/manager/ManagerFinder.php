<?php

namespace RDGW\Manager;

use RDGW\Finder;
use RDGW\IFinder;
use RDGW\IGateway;

class ManagerFinder extends Finder implements IFinder
{
	protected function getTableName(): string
	{
		return "Manager";
	}

	protected function getGatewayInstance(): IGateway
	{
		return new ManagerRDGW();
	}
}
