<?php
namespace Mail\Action;

use Laminas\Mvc\Console\Controller\AbstractConsoleController;

abstract class BaseConsoleAction extends AbstractConsoleController
{
	abstract public function executeAction();
}
