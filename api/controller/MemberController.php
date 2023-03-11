<?php

namespace API\Controller;

use RDGW\Member\MemberFinder;

class MemberController
{
	private $requestMethod;
	private $id;

	public function __construct(string $requestMethod, ?int $id)
	{
		$this->requestMethod = $requestMethod;
		$this->id = $id;
	}

	public function processRequest()
	{
		if ($this->id !== null) {
			$this->processRequestWithID();
		} else {
			$this->processRequestWithoutID();
		}
	}

	private function processRequestWithID()
	{
		switch ($this->requestMethod) {
			case "GET":
				$finder = new MemberFinder();
				$member = $finder->find($this->id);
				echo json_encode($member);
				break;
		}
	}

	private function processRequestWithoutID()
	{
		switch ($this->requestMethod) {
			case "GET":
				echo "Hallo";
				break;
		}
	}
}
