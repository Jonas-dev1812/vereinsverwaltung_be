<?php

namespace RDGW;

use JsonSerializable;

interface IGateway extends JsonSerializable {
	public function insert(): void;
	public function update(): void;
	public function delete(): void;
	public function setByArray(array $array): void;
	public function getID(): ?int;
	public function setID(int $val): void;
}