<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public $error;

	public function __construct()
	{
		parent::__construct();
		$this->error = [];
	}
	public function index()
	{
		switch ($this->input->get('type')) {
			case 'nominations':
				$this->load->admin_dashboard('dashboard/nominations/index');
				break;

			default:
				$this->load->admin_dashboard('dashboard/basic/index');
				break;
		}
	}

	public function login()
	{
		$data = [
			'page' => [
				'title' => "Login Page" . " • " . APP_NAME
			]
		];
		$this->load->view('pages/login', $data);
	}
	public function register()
	{
		$formdata = $this->input->post();
	}

	public function qrcode_render()
	{
		$data  = [];
		// $this->encryption->initialize(
		// 	array(
		// 		'cipher' => ENCRYPTION_ALGO,
		// 		'mode' => ENCRYPTION_MODE,
		// 	)
		// );
		try {
			$plain_text = 'This is a plain-text message!';
			// $ciphertext = $this->encryption->encrypt($plain_text);

			// echo $ciphertext . "<br>";
			echo $this->encryption->decrypt("4f3a26d0b0fb60b6a1958caa1386578afc33dff5181e6c6ccbbf7121308ddc39b8e61ce052b6f6e8f0ae8447828bdca1679dc84f5dfb6cd47080d63897884e1cSTiaDf8XdMWZWpRUBYr5NN7rauJpE7gUVXyhjj7auDDH/RRswNL86TVA43yc500E");
		} catch (Exception $th) {
			$this->error['status'] = 'failed';
			$this->error['code'] = 'InvalidKeyError';
			$this->error['message'] = 'The Key passed does not match with the records or is expired!';
		}
		try {
			$this->load->library('QRCodeLib');
			$image = $this->qrcodelib->render($this->input->post('url'));

			$data['status'] = "success";
			$data['qrcode'] = $image;
		} catch (Exception $ex) {
			$this->error['status'] = 'failed';
			$this->error['code'] = 'InvalidData';
			$this->error['message'] = 'The Data Passed does not match with the records!';

			return $this->error;
		}

		if ($data['status'] == 'success') {
			echo "<img src='" . $data['qrcode'] . "' width='300'/>";
		} else {
			print_r(json_encode($this->error));
		}
	}
}
