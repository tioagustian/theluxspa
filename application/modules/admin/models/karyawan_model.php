<?php
class Member_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function check($arr, $output = 'bool')
    {
    	$this->db->select('phone, fullname, city, dob, char_id, nickname');
    	$this->db->from('member');
    	$this->db->where($arr);
    	$query = $this->db->get();
    	if ($query->num_rows() != null) {
			
    		if ($output == 'bool') {
    			return true;
    		} else {
    			return $query->row();
    		}
    	}
    }
}