<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id)
	{
		

		
		# Load Admin Initialization Model
		$this->load->model('services/services_m','services');
		
		# Load Post Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		$page_title = $this->lang->line('edit_user');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('edit_users') )
			{
				# Load Edit Categories Template	
				//$query = $this->db->get_where('services', array('user_id' => $id));
				//$data = array(
				//	'id' => $id,
				//	'results' => $query->result(),
				//);
				# Load SHOW USERS Template
				//$this->load->view('admin/services',$data); 
				
				$data = $this->services->show_user_services($id);
				# Load SHOW USERS Template
				$this->load->view('admin/services', $data);	
			}
			else
			{
				# Show Error
				$this->admin_init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->admin_init->show_footer();
		}
		else
		{
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}
		
		
		
	}
	
	
	
}
