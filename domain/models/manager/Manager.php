<?php

class Manager
{
	protected $rdgw;

	public function __construct(ManagerRDGW $rdgw)
	{
		$this->rdgw = $rdgw;
	}
}
