<?php

namespace RDGW\AddressInformation;

class AddressInformationFinder
{
	public function find(int $id): AddressInformationRDGW
	{
		return new AddressInformationRDGW();
	}
}
