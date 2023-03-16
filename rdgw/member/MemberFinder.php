<?php

namespace RDGW\Member;

use DataBase\Database;
use PDO;
use RDGW\Finder;
use RDGW\IGateway;

class MemberFinder extends Finder
{
	protected function getTableName(): string
	{
		return "Member";
	}

	protected function getGatewayInstance(): IGateway
	{
		return new MemberRDGW();
	}
	/**
	 * @return MemberRDGW[]
	 */
	public function findByClub(int $clubID): array
	{
		$gateways = [];

		$db = Database::getInstance();
		$pdo = $db->getConnection();
		$stmt = $pdo->prepare("SELECT * FROM {$this->getTableName()} WHERE ClubID = ?");
		$stmt->execute([$clubID]);

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$gateway = $this->getGatewayInstance();
			$gateway->setByArray($row);
			$gateways[] = $gateway;
		}

		return $gateways;
	}
}
