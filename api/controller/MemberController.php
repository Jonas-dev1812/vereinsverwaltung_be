<?php

namespace API\Controller;

use RDGW\IFinder;
use RDGW\IGateway;
use RDGW\Member\MemberFinder;
use RDGW\Member\MemberRDGW;

class MemberController extends GatewayController
{
	public function getFinder(): IFinder
	{
		return new MemberFinder();
	}

	public function getNewGatewayInstance(): IGateway
	{
		return new MemberRDGW();
	}
}
