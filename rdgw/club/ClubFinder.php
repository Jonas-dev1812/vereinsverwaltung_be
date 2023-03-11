<?php

namespace RDGW\Club;

class ClubFinder
{
	public function find(int $id): ClubRDGW
	{
		return new ClubRDGW();
	}
}
