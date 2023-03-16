<?php

namespace Domain\Models\AddressInformation;

use RDGW\AddressInformation\AddressInformationRDGW;

class AddressInformation
{
	protected $gateway;

	public function __construct(AddressInformationRDGW $gateway)
	{
		$this->gateway = $gateway;
	}
}
