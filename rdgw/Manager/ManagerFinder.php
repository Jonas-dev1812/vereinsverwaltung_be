<?php

class ManagerFinder
{
	public function find(int $id): ManagerRDGW
	{
		return new ManagerRDGW();
	}
}
