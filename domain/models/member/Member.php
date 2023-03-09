<?php

class Member
{
	protected $rdgw;

	public function __construct(Member $rdgw)
	{
		$this->rdgw = $rdgw;
	}
}
