<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_m');
        $this->load->model('Question_attempts_m');
    }
    public function index() {
        $insertData = array();
        // Form field validation rules
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $insertData = array('name' => $this->input->post('name'), 'email' => $this->input->post('email'));
        if ($this->form_validation->run() == true) {
            // Insert  data
            $insert = $this->user_m->insert($insertData);
            if ($insert) {
                //$this->session->set_flashdata('success', 'Record has been added successfully.');
                redirect(base_url('home/start'));
            } else {
                //$this->session->set_flashdata('error', 'Some problems occured, please try again.');
                redirect(base_url('home'));
            }
        }
        $this->load->view('frontend/home/register');
    }
    public function start() {
        if ($this->session->userdata('user_login') != true) {
            redirect(base_url('home'));
        }
        $amount = 10;
        $submitted_data = $this->Question_attempts_m->CheckTestSubmitted();
        $data['submitted_data'] = $submitted_data;
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = $this->input->post();
            $correct_values = $this->session->userdata('correct_values');
            for ($i = 0;$i < $amount;$i++) {
                $ans = (array_key_exists($i, $data)) ? $data[$i] : '';
                //$ans = ($data[$i])?$data[$i]:'ddd';
                $cor = $correct_values[$i];
                $insertData = array('given_answer' => $ans, 'correct_answer' => $cor, 'user_id' => $this->session->userdata('user_id'));
                //print_r($insertData ); die;
                $insert = $this->Question_attempts_m->saveTest($insertData);
            }
            $updateData = array('submitted_on' => date('Y-m-d H:i:s'));
            $update = $this->user_m->userUpdate($updateData, $this->session->userdata('user_id'));
            if ($insert) {
                //$this->session->set_flashdata('success', 'Record has been added successfully.');
                redirect(base_url('home/start'));
            } else {
                //$this->session->set_flashdata('error', 'Some problems occured, please try again.');
                redirect(base_url('home'));
            }
        }

		if($submitted_data == false){
			$api_url = 'https://opentdb.com/api.php?amount=' . $amount;
			// Read JSON file
			$json_data = '';
			$json_data = file_get_contents($api_url);
			if(!empty($json_data)){
				// Decode JSON data into PHP array
				$response_data = json_decode($json_data);
				//print_r($response_data); die;
				$question_data = $response_data->results;
				foreach ($question_data as $questions) {
					array_push($questions->incorrect_answers, $questions->correct_answer);
					shuffle($questions->incorrect_answers);
					$correct_values[] = $questions->correct_answer;
				}
				$this->session->set_userdata('correct_values', $correct_values);
				$data['question_data'] = $question_data;
			}else{
				$this->session->set_flashdata('error', 'Please kindly check internet connection.');
				redirect(base_url('home'));
			}
		}

		$this->load->view('frontend/home/index', $data);
        
    }
    public function logout() {
        $this->user_m->logout();
        redirect(base_url('home'));
    }
}
