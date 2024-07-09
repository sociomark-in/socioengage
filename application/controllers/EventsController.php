<?php

class EventsController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function api_event_register()
	{
		try {
			$formdata = $this->input->post();
			// $uid = random_string('alnum', 16);
			$uid = "RrUkv2Ahanj4tdu0";
			$this->load->library('QRCodeLib');
			$plain_text = json_encode($formdata);
			$ciphertext = $this->encryption->encrypt($plain_text);
			echo base_url('check-in/') . $uid;
			$image = $this->qrcodelib->render(base_url('check-in/') . $uid);
			$data['status'] = "success";
			$data['qrcode'] = $image;
			echo "<img src='" . $image . "' width='200' />";
		} catch (Exception $ex) {
			$this->error['status'] = 'failed';
			$this->error['code'] = 'InvalidData';
			$this->error['message'] = 'The Data Passed does not match with the records!';

			return $this->error;
		}
	}
}
