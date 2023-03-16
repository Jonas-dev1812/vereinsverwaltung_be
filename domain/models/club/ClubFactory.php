<?php

namespace Domain\Models\Club;

use Domain\Models\BankAccount\BankAccount;
use Domain\Models\Member\Member;
use RDGW\BankAccount\BankAccountFinder;
use RDGW\Club\ClubRDGW;
use RDGW\Member\MemberFinder;

class ClubFactory
{
	/**
	 * @var ClubRDGW $gateway
	 */

	protected $gateway;
	/**
	 * @var Club $club
	 */
	protected $club;

	public function createClub(ClubRDGW $gateway): Club
	{
		$this->gateway = $gateway;
		$this->club =  new Club($gateway);

		$this->setBankAccount();
		$this->setMembers();

		return $this->club;
	}

	protected function setBankAccount(): void
	{
		$bankAccountFinder = new BankAccountFinder();
		$bankAccountGateway = $bankAccountFinder->find($this->gateway->getBankAccountID());

		$this->club->setBankAccount(new BankAccount($bankAccountGateway));
	}

	protected function setMembers(): void
	{
		$members = [];
		$memberFinder = new MemberFinder();
		$memberGateways = $memberFinder->findByClub($this->gateway->getID());

		foreach ($memberGateways as $memberGateway) {
			$members[] = new Member($memberGateway);
		}

		$this->club->setMembers($members);
	}
}
