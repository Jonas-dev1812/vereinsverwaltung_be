<?php

namespace API\Controller;

use RDGW\AddressInformation\AddressInformationFinder;
use RDGW\AddressInformation\AddressInformationRDGW;
use RDGW\IFinder;
use RDGW\IGateway;

class AddressInformationController extends GatewayController
{
	public function getFinder(): IFinder
	{
		return new AddressInformationFinder();
	}

	public function getNewGatewayInstance(): IGateway
	{
		return new AddressInformationRDGW();
	}
}
