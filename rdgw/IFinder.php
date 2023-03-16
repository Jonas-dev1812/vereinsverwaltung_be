<?php

namespace RDGW;

interface IFinder {
	public function find(int $id): ?IGateway;
	/**
	 * @return IGateway[]
	 */
	public function findAll(): array;
}