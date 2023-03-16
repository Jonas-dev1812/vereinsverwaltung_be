<?php

namespace RDGW\AddressInformation;

use RDGW\Finder;
use RDGW\IFinder;
use RDGW\IGateway;

class AddressInformationFinder extends Finder implements IFinder
{
	protected function getTableName(): string
	{
		return "AddressInformation";
	}

	protected function getGatewayInstance(): IGateway
	{
		return new AddressInformationRDGW();
	}
}
