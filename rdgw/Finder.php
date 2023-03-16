<?php

namespace RDGW;

use DataBase\Database;
use PDO;

abstract class Finder implements IFinder {
	protected $id;

	public function find(int $id): ?IGateway
	{
		$db = Database::getInstance();
		$pdo = $db->getConnection();
		$stmt = $pdo->prepare("SELECT * FROM {$this->getTableName()} WHERE ID = ?");
		$stmt->execute([$id]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$gateway = $this->getGatewayInstance();
		$gateway->setByArray($data);

		return $gateway;
	}

	public function findAll(): array {
		$gateways = [];
		$db = Database::getInstance();
		$pdo = $db->getConnection();
		$stmt = $pdo->query("SELECT * FROM {$this->getTableName()}");
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$gateway = $this->getGatewayInstance();
			$gateway->setByArray($row);
			$gateways[] = $gateway;
		}

		return $gateways;
	}

	protected abstract function getTableName(): string;
	protected abstract function getGatewayInstance(): IGateway;
}