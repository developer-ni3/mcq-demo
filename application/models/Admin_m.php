<?php
class Admin_m extends CI_Model {
    function __construct() {
        parent::__construct();
        // Set table name
        $this->table = 'admins';
        // Set default order
        $this->order = array('id' => 'desc');
    }
    public function login() {
        $encry_password = sha1($this->input->post('password'));
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', $encry_password);
        $query = $this->db->get();
        //print_r($user); die;
        if ($query->num_rows() == 1) {
            $user = $query->row();
            // Log in user
            $data = array('name' => $user->name, 'email' => $user->email, 'id' => $user->id, 'loggedin' => TRUE);
            $this->session->set_userdata($data);
        }
    }
    public function logout() {
        $this->session->sess_destroy();
    }
    public function loggedin() {
        return (bool)$this->session->userdata('loggedin');
    }
    function getRecord($params = array()) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $params['id']);
        $query = $this->db->get();
        $result = $query->row();
        // Return fetched data
        return $result;
    }
}
