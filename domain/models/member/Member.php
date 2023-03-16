<?php

namespace Domain\Models\Member;

use Domain\Models\AddressInformation\AddressInformation;
use Domain\Models\BankAccount\BankAccount;
use RDGW\Member\MemberRDGW;

class Member
{
	protected $gateway;
	protected $bankAccount;
	protected $addressInformation;

	public function __construct(MemberRDGW $gateway)
	{
		$this->gateway = $gateway;
	}

	public function calculateMembershipFee(int $regularFee): int
	{
		return (100 - $this->gateway->getDiscount()) / 100 * $regularFee;
	}

	public function setBankAccount(BankAccount $bankAccount): void
	{
		$this->bankAccount = $bankAccount;
	}

	public function setAddressInformation(AddressInformation $addressInformation): void
	{
		$this->addressInformation = $addressInformation;
	}

	public function getIBAN(): string
	{
		return $this->bankAccount->getIBAN();
	}
}
