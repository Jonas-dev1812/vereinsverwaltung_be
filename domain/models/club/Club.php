<?php

class Club
{
	protected $rdgw;

	public function __construct(ClubRDGW $rdgw)
	{
		$this->rdgw = $rdgw;
	}
}
