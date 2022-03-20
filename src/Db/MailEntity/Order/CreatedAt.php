<?php
namespace Mail\Db\MailEntity\Order;

use Common\Db\Order\AscOrDesc;

class CreatedAt extends AscOrDesc
{
	protected function getField(): string
	{
		return 't.createdAt';
	}
}