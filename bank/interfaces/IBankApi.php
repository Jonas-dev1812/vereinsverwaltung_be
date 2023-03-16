<?php

namespace Bank\Interfaces;

interface IBankApi
{
	public function executeTransaction(string $fromIBAN, string $toIBAN, int $amount): bool;
}
