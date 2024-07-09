<?php

use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Output\QROutputInterface;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once FCPATH . 'vendor/autoload.php';

class QRCodeLib
{
	public $qrcode;
	public $options;

	public function init($type = 'jpg')
	{
		$this->options = new QROptions(
			[
				'eccLevel' => EccLevel::L,
				'outputType' => $type,
				'version' => 4,
			]
		);
		$this->qrcode = new QRCode($this->options);
		return $this->qrcode;
	}

	public function render($link){
		$image = $this->init()->render($link);

		return $image;
	}
}
