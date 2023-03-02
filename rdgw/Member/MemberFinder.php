<?php

class MemberFinder
{
	public function find(int $id): MemberRDGW
	{
		return new MemberRDGW();
	}

	/**
	 * @return MemberRDGW[]
	 */
	public function findByClub(int $clubID): array
	{
		return [];
	}
}
