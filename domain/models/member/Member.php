<?php

namespace Domain\Models\Member;

use RDGW\Member\MemberRDGW;

class Member
{
	protected $rdgw;

	public function __construct(MemberRDGW $rdgw)
	{
		$this->rdgw = $rdgw;
	}
}
