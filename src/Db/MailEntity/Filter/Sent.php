<?php
namespace Mail\Db\MailEntity\Filter;

use Common\Db\Filter;
use Doctrine\ORM\QueryBuilder;

class Sent implements Filter
{
	const DB_COLUMN = 't.sentAt';

	private bool $sent;

	private function __construct(bool $sent)
	{
		$this->sent = $sent;
	}

	public static function yes(): Sent
	{
		return new self(true);
	}

	public static function no(): Sent
	{
		return new self(false);
	}

	public function addClause(QueryBuilder $queryBuilder): void
	{
		if ($this->sent)
		{
			$queryBuilder->andWhere(
				$queryBuilder->expr()->isNotNull(self::DB_COLUMN)
			);
		}
		else
		{
			$queryBuilder->andWhere(
				$queryBuilder->expr()->isNull(self::DB_COLUMN)
			);
		}
	}
}