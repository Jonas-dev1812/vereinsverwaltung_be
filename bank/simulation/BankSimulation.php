<?php

namespace Bank\Simulation;

use Bank\Interfaces\IBankApi;
use DateTime;

class BankSimulation implements IBankApi
{
	public function executeTransaction(string $fromIBAN, string $toIBAN, int $amount): bool
	{
		$wireTransfer = new BankWireTransferRDGW();
		$wireTransfer->setFromIBAN($fromIBAN);
		$wireTransfer->setToIBAN($toIBAN);
		$wireTransfer->setAmount($amount);
		$wireTransfer->setTransferDate(new DateTime());
		$wireTransfer->insert();
		return true;
	}
}
