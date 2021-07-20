<?php
class Question_attempts_m extends CI_Model {
    function __construct() {
        parent::__construct();
        // Set table name
        $this->table = 'question_attempts';
        // Set orderable column fields
        // Set default order
        $this->order = array('id' => 'desc');
    }
    public function saveTest($data = array()) {
        $insert = $this->db->insert($this->table, $data);
        // Return the status
        $insert ? $this->db->insert_id() : false;
        return $insert;
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
    function CheckTestSubmitted() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        //print_r($user); die;
        if ($query->num_rows() > 0) {
            $us_id = $this->session->userdata('user_id');
            $query = $this->db->query("SELECT id,name,email,submitted_on,(SELECT count(user_id) FROM question_attempts WHERE correct_answer=given_answer AND users.id=question_attempts.user_id) AS correct_cnt FROM users WHERE id = $us_id ");
            $data = $query->row();
            return $data;
        } else {
            return false;
        }
    }
}
