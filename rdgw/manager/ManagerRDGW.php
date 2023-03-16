<?php

namespace RDGW\Manager;

use PDOStatement;
use RDGW\Gateway;

class ManagerRDGW extends Gateway
{
	private $ID;
	private $username;
	private $password;
	private $session; 

	public function getID(): int
	{
		return $this->ID;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}
	
	public function getSession() {
		return $this->session;
	}

	public function setID(int $val): void
	{
		$this->ID = $val;
	}

	public function setUsername(string $username)
	{
		$this->username = $username;
	}

	public function setPassword(string $password)
	{
		$this->password = $password;
	}

	public function setSession(?string $session)
	{
		$this->session = $session;
	}

	protected function getPreparedInsertStatementString(): string
	{
		return "INSERT INTO {$this->getTableName()} (username, password, session) VALUES (?, ?, ?)";
	}

	protected function getPreparedUpdateStatementString(): string
	{
		return "UPDATE {$this->getTableName()} SET username = ?, password = ?, session = ? WHERE ID = {$this->getID()}";
	}

	protected function executePreparedStatement(PDOStatement $stmt): void
	{
		$stmt->execute([$this->getUsername(), $this->getPassword(), $this->getSession()]);
	}

	protected function getTableName(): string
	{
		return "Manager";
	}

	public function setByArray(array $array): void
	{
		$this->setPassword($array["password"]);
		$this->setUsername($array["username"]);

		if(isset($array["ID"])){
			$this->setID($array["ID"]);
		}

		if (isset($array["session"]))
		{
			$this->setSession($array["session"]);
		}
	}

	public function jsonSerialize()
	{
		return [
			"ID" => $this->getID(),
			"username" => $this->getUsername(),
			"session" => $this->getSession(),
		];
	}
}