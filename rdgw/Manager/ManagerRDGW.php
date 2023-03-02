<?php

class ManagerRDGW {
	
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

}