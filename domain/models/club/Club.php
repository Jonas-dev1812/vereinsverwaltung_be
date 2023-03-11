<?php

namespace Domain\Models\Club;

use RDGW\Club\ClubRDGW;

class Club
{
	protected $rdgw;

	public function __construct(ClubRDGW $rdgw)
	{
		$this->rdgw = $rdgw;
	}
}
