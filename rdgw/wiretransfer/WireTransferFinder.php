<?php

namespace RDGW\WireTransfer;

class WireTransferFinder
{
	public function find(int $id): WireTransferRDGW
	{
		return new WireTransferRDGW();
	}
}
