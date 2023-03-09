<?php

class ClubRDGW {

	private $clubName;
	private $clubType;

	public function getClubName(){
		return $this->clubName;
	}

	public function getClubType(){
		return $this->clubType;
	}

	public function setClubName(string $clubName)
	{
		$this->clubName = $clubName;
	}

	public function setClubType(string $clubType)
	{
		$this->clubType = $clubType;
	}

	public function insert(): void
	{
	}

	public function update(): void
	{
	}

}