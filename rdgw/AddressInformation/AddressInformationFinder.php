<?php

class AddressInformationFinder
{
	public function find(int $id): AddressInformationRDGW
	{
		return new AddressInformationRDGW();
	}
}
