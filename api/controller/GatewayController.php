<?php

namespace API\Controller;

use Exception;
use RDGW\IFinder;
use RDGW\IGateway;
use Throwable;

abstract class GatewayController
{
	// TODO Authentification
	protected $requestMethod;
	protected $id;
	protected $data;
	protected $customEndpoint;

	public function __construct(string $requestMethod, array $data = [], ?int $id, string $customEndpoint = null)
	{
		$this->requestMethod = $requestMethod;
		$this->id = $id;
		$this->data = $data;
		$this->customEndpoint = $customEndpoint;
	}

	public function processRequest()
	{
		try{
			if ($this->customEndpoint) {
				$this->handleCustomEndpoint();
				return;
			}
			if ($this->id !== null) {
				$this->processRequestWithID();
			} else {
				$this->processRequestWithoutID();
			}
		} catch (Throwable $e) {
			echo json_encode($e->getMessage());
		}
	}

	private function processRequestWithID()
	{
		switch ($this->requestMethod) {
			case "GET":
				$gateway = $this->getGatewayByID();
				echo json_encode($gateway);
				break;
			case "PUT":
				throw new Exception("Can't put with ID");
			case "PATCH":
				$gateway = $this->getGatewayByID();
				$gateway->setByArray($this->data);
				$gateway->setID($this->id);
				$gateway->update();
				echo json_encode($gateway);
				break;
			case "DELETE":
				$gateway = $this->getGatewayByID();
				$gateway->delete();
				break;
			default:
				throw new Exception("Unsupported request method: {$this->requestMethod}");
		}
	}

	private function processRequestWithoutID()
	{
		switch ($this->requestMethod) {
			case "GET":
				$finder = $this->getFinder();
				$gateways = $finder->findAll($this->id);
				echo json_encode($gateways);
				break;
			case "PUT":
				$gateway = $this->getNewGatewayInstance();
				$gateway->setByArray($this->data);
				$gateway->insert();
				echo json_encode($gateway);
				break;
			case "PATCH":
				throw new Exception("Can't patch without ID");
			case "DELETE":
				throw new Exception("Can't delete without ID");
			default:
				throw new Exception("Unsupported request method: {$this->requestMethod}");
		}
	}

	public function getGatewayByID(): IGateway {
		$finder = $this->getFinder();
		return $finder->find($this->id);
	}
	
	abstract function getFinder(): IFinder;
	abstract function getNewGatewayInstance(): IGateway;
	private final function handleCustomEndpoint(): void
	{
		if ($this->id) {
			$this->handleCustomEndointWithID();
		} else {
			$this->handleCustomEndpointWithoutID();
		}
	}

	protected function handleCustomEndointWithID()
	{
	}

	protected function handleCustomEndpointWithoutID()
	{
	}
}
