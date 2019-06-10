<?php
class User_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function check($uid)
    {
        $id = $this->db->get_where('users', ['id' => $uid])->row()->id_pegawai;
    	$query = $this->db->get_where('pegawai', ['id_pegawai' => $id]);
    	if ($query->num_rows() != null) {
    		return $query->row();
    	}
    }
}