<?php

namespace Domain\Models\Manager;

use RDGW\Manager\ManagerRDGW;

class Manager
{
	protected $rdgw;

	public function __construct(ManagerRDGW $rdgw)
	{
		$this->rdgw = $rdgw;
	}
}
