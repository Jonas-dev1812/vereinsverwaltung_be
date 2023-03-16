<?php

namespace API\Controller;

use Domain\Models\Club\ClubFactory;
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

	protected function handleCustomEndointWithID()
	{
		if ($this->requestMethod === "POST") {
			$this->handlePostRequests();
		}
	}

	protected function handlePostRequests()
	{
		switch ($this->customEndpoint) {
			case "collectMoney":
				$gateway = $this->getGatewayByID();
				$clubFactory = new ClubFactory();
				$club = $clubFactory->createClub($gateway);
				$club->collectMoney();
		}
	}
}
