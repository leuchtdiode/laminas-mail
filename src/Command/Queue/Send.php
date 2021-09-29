<?php
namespace Mail\Command\Queue;

use Exception;
use Mail\Command\BaseCommand;
use Mail\Queue\UnsentMailsSender;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Send extends BaseCommand
{
	private UnsentMailsSender $unsentMailsSender;

	/**
	 * @param UnsentMailsSender $unsentMailsSender
	 */
	public function __construct(UnsentMailsSender $unsentMailsSender)
	{
		$this->unsentMailsSender = $unsentMailsSender;

		parent::__construct();
	}

	protected function configure()
	{
		$this
			->setName('mail:queue:send')
			->setDescription('Sends unsent mails in queue');
	}

	/**
	 * @throws Exception
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->unsentMailsSender->send();

		return self::SUCCESS;
	}
}
