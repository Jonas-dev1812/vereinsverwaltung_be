<?php

class ManagerRDGW
{
	private string $username;
	private string $password;
	private string $session; 

	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}
	
	public function getSession() {
		return $this->session;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setSession($session) {
		$this->session = $session;
	}

	public function insert(): int {
		return 6;
	}

	public function update(): void
	{
	}

}