<?php
class User_m extends CI_Model {
    function __construct() {
        parent::__construct();
        // Set table name
        $this->table = 'users';
        // Set default order
        $this->order = array('id' => 'desc');
    }
    function mail_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function insert($data = array()) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $data['email']);
        $query = $this->db->get();
        //print_r($user); die;
        if ($query->num_rows() == 1) {
            $user = $query->row();
            // Log in user
            $data1 = array('user_name' => $user->name, 'user_email' => $user->email, 'user_id' => $user->id, 'user_login' => TRUE);
            $this->session->set_userdata($data1);
            return true;
        } else {
            $insert = $this->db->insert($this->table, $data);
            // Return the status
            $l_id = $insert ? $this->db->insert_id() : false;
            if ($l_id) {
                $data1 = array('user_name' => $data['name'], 'user_email' => $data['email'], 'user_id' => $l_id, 'user_login' => TRUE);
                $this->session->set_userdata($data1);
                return true;
            } else {
                return false;
            }
        }
    }
    function getRecord($params = array()) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $params['id']);
        $query = $this->db->get();
        $result = $query->row();
        //print_r($result);
        // Return fetched data
        return $result;
    }
    function getUsers() {
        $query = $this->db->query("SELECT id,name,email,(SELECT count(user_id) FROM question_attempts WHERE correct_answer=given_answer AND users.id=question_attempts.user_id) AS correct_cnt FROM users ORDER BY users.id DESC ");
        $data = $query->result();
        return $data;
    }
    public function delete($id) {
        return $this->db->delete($this->table, array('id' => $id));
    }
    public function logout() {
        $this->session->unset_userdata('user_login');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_id');
        //$this->session->sess_destroy();
    }
    public function userUpdate($data, $id) {
        if (!empty($data) && !empty($id)) {
            // Update data
            $update = $this->db->update($this->table, $data, array('id' => $id));
            // Return the status
            return $update ? true : false;
        }
        return false;
    }
}
