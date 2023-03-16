<?php

namespace API\Controller;

use RDGW\Club\ClubFinder;
use RDGW\Club\ClubRDGW;
use RDGW\IFinder;
use RDGW\IGateway;

class ClubController extends GatewayController
{
	public function getFinder(): IFinder
	{
		return new ClubFinder();
	}

	public function getNewGatewayInstance(): IGateway
	{
		return new ClubRDGW();
	}
}
