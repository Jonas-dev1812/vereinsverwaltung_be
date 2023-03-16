<?php

namespace Domain\Models\Club;

use Bank\Simulation\BankSimulation;
use Domain\Models\BankAccount\BankAccount;
use RDGW\Club\ClubRDGW;

class Club
{
	protected $gateway;
	protected $bankAccount;

	/**
	 * @var Members[] $members
	 */

	protected $members = [];

	public function __construct(ClubRDGW $gateway)
	{
		$this->gateway = $gateway;
	}

	public function setBankAccount(BankAccount $bankAccount): void
	{
		$this->bankAccount = $bankAccount;
	}

	public function setMembers(array $members): void
	{
		$this->members = $members;
	}

	public function collectMoney(): bool
	{
		$bank = new BankSimulation();

		foreach ($this->members as $member) {
			$individualFee = $member->calculateMembershipFee($this->gateway->getMembershipFee());
			$bank->executeTransaction($member->getIBAN(), $this->bankAccount->getIBAN(), $individualFee);
		}

		return true;
	}

	public function getMembers(): array
	{
		return $this->members;
	}
}
