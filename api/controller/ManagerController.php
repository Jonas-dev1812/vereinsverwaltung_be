<?php

namespace API\Controller;

use RDGW\IFinder;
use RDGW\IGateway;
use RDGW\Manager\ManagerFinder;
use RDGW\Manager\ManagerRDGW;

class ManagerController extends GatewayController
{
	public function getFinder(): IFinder
	{
		return new ManagerFinder();
	}

	public function getNewGatewayInstance(): IGateway
	{
		return new ManagerRDGW();
	}
}
