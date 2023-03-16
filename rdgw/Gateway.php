<?php

namespace RDGW;

use DataBase\Database;
use PDOStatement;

abstract class Gateway implements IGateway {
	protected $id;

	public function insert(): void
	{
		// TODO EXCEPTION
		$db = Database::getInstance();
		$pdo = $db->getConnection();
		$stmt = $pdo->prepare($this->getPreparedInsertStatementString());
		$this->executePreparedStatement($stmt);
		$this->setID($pdo->lastInsertId());
	}

	public function update(): void
	{
		// TODO EXCEPTION
		$db = Database::getInstance();
		$pdo = $db->getConnection();
		$stmt = $pdo->prepare($this->getPreparedUpdateStatementString());
		$this->executePreparedStatement($stmt);
	}

	public function delete(): void
	{
		// TODO EXCEPTION
		$db = Database::getInstance();
		$pdo = $db->getConnection();
		$pdo->query("DELETE FROM {$this->getTableName()} WHERE ID = {$this->getID()}");
	}

 	public function setID(int $val): void
	{
		$this->id = $val;
	}

	public function getID(): int
	{
		return $this->id;
	}

	protected abstract function getPreparedInsertStatementString(): string;
	protected abstract function getPreparedUpdateStatementString(): string;
	protected abstract function executePreparedStatement(PDOStatement $stmt): void;
	protected abstract function getTableName(): string;
	
}