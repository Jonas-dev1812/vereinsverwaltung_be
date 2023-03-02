<?php

class ClubRDGW {

	private string $clubName;
	private string $clubType;

	public function getClubName(){
		return $this->clubName;
	}

	public function getClubType(){
		return $this->clubType;
	}

	public function setClubName($clubName){
		$this->clubName = $clubName;
	}

	public function setClubType($clubType){
		$this->clubType = $clubType;
	}

	public function insert(): int {
		return 6;
	}

	public function update(): void
	{
	}

}