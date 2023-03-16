<?php

namespace RDGW\WireTransfer;

use RDGW\Finder;
use RDGW\IGateway;

class WireTransferFinder extends Finder
{
	protected function getTableName(): string
	{
		return "WireTransfer";
	}

	protected function getGatewayInstance(): IGateway
	{
		return new WireTransferRDGW();
	}
}
