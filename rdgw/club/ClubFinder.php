<?php

namespace RDGW\Club;

use RDGW\Finder;
use RDGW\IFinder;
use RDGW\IGateway;

class ClubFinder extends Finder implements IFinder
{
	protected function getTableName(): string
	{
		return "Club";
	}

	protected function getGatewayInstance(): IGateway
	{
		return new ClubRDGW();
	}
}
