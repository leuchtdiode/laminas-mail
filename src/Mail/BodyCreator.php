<?php
namespace Mail\Mail;

use Laminas\View\Model\ViewModel;
use Laminas\View\Renderer\PhpRenderer;

class BodyCreator
{
	private PhpRenderer $phpRenderer;

	public function __construct(PhpRenderer $phpRenderer)
	{
		$this->phpRenderer = $phpRenderer;
	}

	public function forMail(Mail $mail): string
	{
		$placeholderValues = $mail->getPlaceholderValues()
			? $mail->getPlaceholderValues()->asArray()
			: [];

		$placeholderValues['subject'] = $mail->getSubject();

		$contentModel = new ViewModel(
			$placeholderValues
		);
		$contentModel->setTemplate($mail->getContentTemplate());

		$placeholderValues['content'] = $this->phpRenderer->render($contentModel);

		$layoutModel = new ViewModel($placeholderValues);
		$layoutModel->setTemplate($mail->getLayoutTemplate());

		return $this->phpRenderer->render($layoutModel);
	}
}
