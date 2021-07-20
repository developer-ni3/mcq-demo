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
    
    function getLists(){
        $data = $row = array();
        $userData = $this->admin_m->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($userData as $user){
            $i++;                
            $status = '<div class="hidden-sm hidden-xs action-buttons">
                <a class="green" href="'.base_url("admin/user/edit/".$user->id).'">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>

                <a class="red" onclick="return confirm(\'Are you sure?\')" href="'.base_url("admin/user/delete/".$user->id).'">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>  
                </a>
            </div>' ;

            $data[] = array($i, $user->name, $user->email, $status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->admin_m->countAll(),
            "recordsFiltered" => $this->admin_m->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
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

    public function add()
	{

		$data = array();
        $insertData = array();
        
		// Form field validation rules
		$this->form_validation->set_rules('name', 'name', 'required');
		
		$encry_password = sha1($this->input->post('password'));

		$insertData = array(
			'name'=> $this->input->post('name'),
			'password' => $encry_password,
			'email'     => $this->input->post('email')
		);
		
		if($this->form_validation->run() == true){
			// Insert  data
			$insert = $this->admin_m->insert($insertData);

			if($insert){
				$this->session->set_flashdata('success', 'Record has been added successfully.');
				//redirect(base_url('admin/user/add'));
			}else{
				$this->session->set_flashdata('error', 'Some problems occured, please try again.');
			}
		}
        
		$this->load->view('admin/user/add');
	}

	public function edit($id){
        $data = array();
        
        // Get member data
        $user = $this->admin_m->getRecord(array('id' => $id));

		// Form field validation rules
		$this->form_validation->set_rules('name', 'name', 'required');
		//$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
		
		$updateData = array(
			'name'=> $this->input->post('name')
			///'email'     => $this->input->post('email')
		);
		
		// Validate submitted form data
		if($this->form_validation->run() == true){
			// Update member data
			$update = $this->admin_m->update($updateData, $id);

			if($update){
				$this->session->set_flashdata('success', 'Record has been updated successfully.');
				redirect(base_url('admin/user/edit/'.$id));
			}else{
				$this->session->set_flashdata('error', 'Record has been updated successfully.');
				redirect(base_url('admin/user/edit/'.$id));
			}
		}

		$data['row'] = $user;
		if(empty($data['row'])){
			redirect(base_url('admin/user'));
			exit;
		}
        // Load the edit page view
        $this->load->view('admin/user/edit', $data);
        
	}


	public function delete($id){
        // Check whether id is not empty
        if($id){
            // Delete
            $delete = $this->admin_m->delete($id);
            
            if($delete){
                $this->session->set_flashdata('success', 'Record has been removed successfully.');
            }else{
                $this->session->set_flashdata('error', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect(base_url('admin/user'));
	}
}

?>