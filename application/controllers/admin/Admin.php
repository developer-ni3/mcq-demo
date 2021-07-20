<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends My_Controller {

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

    public function __construct(){
		parent::__construct();
        $this->load->model('admin_m');
	}

    function index(){
        $this->load->view('admin/user/index');
    }

	public function login(){
		//Redirect the user if already logged in
		$dashboard = base_url('admin/dashboard');
		$this->admin_m->loggedin() == FALSE || redirect($dashboard);
		
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == TRUE) {
			// We can login and redirect
			if ($this->admin_m->login() == TRUE) {
				redirect($dashboard);
			}
			else {
				$this->session->set_flashdata('error', 'That username/password combination does not exist');
				redirect(base_url('admin/admin/login'), 'refresh');
			}
		}
		
		$this->load->view("admin/admin/login");
    }

    public function logout(){
    	$this->admin_m->logout();
		
    	redirect(base_url('admin/admin/login'));
    }

}

?>