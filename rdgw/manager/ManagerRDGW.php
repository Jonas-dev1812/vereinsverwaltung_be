<?php

namespace RDGW\Manager;

class ManagerRDGW
{
	private $username;
	private $password;
	private $session; 

	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}
	
	public function getSession() {
		return $this->session;
	}

	public function setUsername(string $username)
	{
		$this->username = $username;
	}

	public function setPassword(string $password)
	{
		$this->password = $password;
	}

	public function setSession(string $session)
	{
		$this->session = $session;
	}

	public function insert(): void
	{
	}

	public function update(): void
	{
	}

}