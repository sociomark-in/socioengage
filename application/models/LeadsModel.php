<?php
class LeadsModel extends CI_Model
{

    public $result = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
		$this->db->select(['name', 'email', 'contact', 'source_url', 'created_at']);
		$this->db->order_by('created_at', 'DESC');
        $this->result = $this->db->get('web_form_appointments')->result_array();
        return json_encode($this->result);
    }
}
