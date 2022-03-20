<?php
namespace Mail\Db\Attachment;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class RepositoryFactory implements FactoryInterface
{
	public function __invoke(
		ContainerInterface $container,
		$requestedName,
		array $options = null
	): object
	{
		return $container
			->get(EntityManager::class)
			->getRepository(Entity::class);
	}
}
