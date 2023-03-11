<?php

namespace RDGW\Member;

use DateTime;

class MemberFinder
{
	public function find(int $id): MemberRDGW
	{
		$memberRDGW = new MemberRDGW();
		$memberRDGW->setClubID(1);
		$memberRDGW->setDiscount(50);
		$memberRDGW->setEmail("test@test.com");
		$memberRDGW->setTelephoneNumber("05405 7410");
		$memberRDGW->setFirstName("Lea");
		$memberRDGW->setLastName("Rieping");
		$memberRDGW->setGender("W");
		$memberRDGW->setBirthDate(new DateTime());
		$memberRDGW->setBankAccountID(1);
		$memberRDGW->setAddressInformationID(1);
		$memberRDGW->setID($id);
		return $memberRDGW;
	}

	/**
	 * @return MemberRDGW[]
	 */
	public function findByClub(int $clubID): array
	{
		return [];
	}
}
