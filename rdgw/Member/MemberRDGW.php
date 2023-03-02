<?php

class MemberRDGW
{
	private string $firstName;
	private string $lastName;
	private DateTime $birthDate;
	private Gender $gender;
	private string $telephoneNumber;
	private string $email;
	private int $discount;
	private int $clubID;

	public function getFirstName(): string
	{
		return $this->firstName;
	}

	public function getLastName(): string
	{
		return $this->lastName;
	}

	public function getBirthDate(): DateTime
	{
		return $this->birthDate;
	}

	public function getGender(): Gender
	{
		return $this->gender;
	}

	public function getTelephoneNumber(): string
	{
		return $this->telephoneNumber;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getDiscount(): int
	{
		return $this->discount;
	}

	public function getClubID(): int
	{
		return $this->clubID;
	}

	public function setFirstName(string $val): void
	{
		$this->firstName = $val;
	}

	public function setLastName(string $val): void
	{
		$this->lastName = $val;
	}

	public function setBirthDate(DateTime $val): void
	{
		$this->birthDate = $val;
	}

	public function setGender(Gender $val): void
	{
		$this->gender = $val;
	}

	public function setTelephoneNumber(string $val): void
	{
		$this->telephoneNumber = $val;
	}

	public function setEmail(string $val): void
	{
		$this->email = $val;
	}

	public function setDiscount(int $val): void
	{
		$this->discount = $val;
	}

	public function setClubID(int $val): void
	{
		$this->clubID = $val;
	}

	public function insert(): int
	{
		return 1;
	}

	public function update(): void
	{
	}
}
