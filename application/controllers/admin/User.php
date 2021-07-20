<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends My_Controller {

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
        $this->load->model('user_m');
	}

    function index(){
        $data['users'] = $this->user_m->getUsers();
        $this->load->view('admin/user/index', $data);
    }
    
    function getLists(){
        $data = $row = array();
        $userData = $this->user_m->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($userData as $user){
            $i++;   
			//$score = 10 ;             
            $status = '<div class="hidden-sm hidden-xs action-buttons">
                <a class="green" href="'.base_url("admin/user/edit/".$user->id).'">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>

                <a class="red" onclick="return confirm(\'Are you sure?\')" href="'.base_url("admin/user/delete/".$user->id).'">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>  
                </a>
            </div>' ;

            $data[] = array($i, $user->name, $user->email, $i, $status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_m->countAll(),
            "recordsFiltered" => $this->user_m->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

	public function delete($id){
        // Check whether id is not empty
        if($id){
            // Delete
            $delete = $this->user_m->delete($id);
            
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