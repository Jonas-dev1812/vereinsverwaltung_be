<?php

namespace Domain\Models\Club;

use Domain\Models\AddressInformation\AddressInformation;
use Domain\Models\BankAccount\BankAccount;
use Domain\Models\Member\Member;
use RDGW\AddressInformation\AddressInformationFinder;
use RDGW\BankAccount\BankAccountFinder;
use RDGW\Member\MemberRDGW;

class MemberFactory
{
	/**
	 * @var MemberRDGW $gateway
	 */

	protected $gateway;
	/**
	 * @var Member $member
	 */
	protected $member;

	public function createClub(MemberRDGW $gateway): Member
	{
		$this->gateway = $gateway;
		$this->member =  new Member($gateway);

		$this->setBankAccount();
		$this->setAddressInformation();

		return $this->member;
	}

	protected function setBankAccount(): void
	{
		$bankAccountFinder = new BankAccountFinder();
		$bankAccountGateway = $bankAccountFinder->find($this->gateway->getBankAccountID());

		$this->member->setBankAccount(new BankAccount($bankAccountGateway));
	}

	protected function setAddressInformation(): void
	{
		$addressInformationFinder = new AddressInformationFinder();
		$addressInformationGateway = $addressInformationFinder->find($this->gateway->getAddressInformationID());
		$this->member->setAddressInformation(new AddressInformation($addressInformationGateway));
	}
}
