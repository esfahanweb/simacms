<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 * Add module controller.
	 */
 
	public function index()
	{	
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->model('configadmins');
		
		# Load Needed Libraries
		$this->load->library('encrypt');
		$this->load->library('form_validation');
		
		# Load Admins Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_new_user');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('add_users') )
			{
				# Form Validation Rules
				$this->form_validation->set_rules('email','email', 'required');
				
				# Show New Admin Form
				if ($this->form_validation->run() == FALSE)
				{	
				
					$select_user_group = $this->configadmins->Form_Select(1, 'groups');
					$select_user_template = $this->admin_init->Select_Default_Template_Option('site');
					$Form_Select_user_Languages = $this->admin_init->Select_Default_Language_Option('site');

					
					$data = array(
					   'select_user_group' => $select_user_group,
					   'select_user_template' => $select_user_template,
					   'Form_Select_user_Languages' => $Form_Select_user_Languages,
					   'Status_Option' => $this->admin_init->Status_Option('users',0),
					);
					
					# Load SHOW USERS Template
					$this->load->view('admin/add', $data); 
				}
				else
				{
					$data = array(
					   'group_id' => $_POST['group_id'],
					   'firstname' => $_POST['firstname'],
					   'lastname' => $_POST['lastname'],
					   'email' => $_POST['email'],
					   'site_template' => $_POST['site_template'],
					   'site_language' => $_POST['site_language'],
  					   'status' => $_POST['status'],
					);
					
					# Insert New Admin Data Into DataBase
					$this->db->insert('users', $data); 
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('add_user_success'),'admin/users/show');				
				}
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
