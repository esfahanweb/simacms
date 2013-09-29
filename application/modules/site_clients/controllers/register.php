<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Home module controller.
	 */
	
	 
	 
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('home/blocks');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		
		# Load Post Language File
		$this->lang->load('users', $this->init->Site_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('homepage');
		

		# Load Header Template
		$this->init->show_header($page_title);	
		
		
		# Check Admin Already Logged In 
			if( !$this->init->User_Logged_In() )
			{
				# Form Validation Rules
				$this->form_validation->set_rules('email','email', 'required');
				$this->form_validation->set_rules('firstname','firstname', 'required');
					$this->form_validation->set_rules('lastname','lastname', 'required');
					$this->form_validation->set_rules('password','password', 'required');
					$this->form_validation->set_rules('address','address', 'required');
					$this->form_validation->set_rules('state','state', 'required');
					$this->form_validation->set_rules('city','city', 'required');
				
				# Show New Admin Form
				if ($this->form_validation->run() == FALSE)
				{	
				
					//$select_user_group = $this->configadmins->Form_Select(1, 'groups');
					$select_user_template = $this->init->Select_Default_Template_Option('site');
					$Form_Select_user_Languages = $this->init->Select_Default_Language_Option('site');

					
					$data = array(
					   'select_user_template' => $select_user_template,
					   'Form_Select_user_Languages' => $Form_Select_user_Languages,
					);
					
					# Load SHOW USERS Template
						$this->load->view($this->init->Site_Template.'/register', $data);	
				}
				else
				{
					$data = array(
						// Registered group ID =2
					   'group_id' => 2,
					   'firstname' => $_POST['firstname'],
					   'lastname' => $_POST['lastname'],
					   'companyname' => $_POST['email'],
					   'email' => $_POST['email'],
					   'address' => $_POST['address'],
					   'state' => $_POST['state'],
					   'city' => $_POST['city'],
					   'postcode' => $_POST['postcode'],
					   'phonenumber' => $_POST['phonenumber'],
					   'site_template' => $_POST['site_template'],
					   'site_language' => $_POST['site_language'],
  					   'status' => 'Active',
					);
					
					# Insert New Admin Data Into DataBase
					$this->db->insert('users', $data); 
					
					# Show Success Page
					$this->init->Show_Success_Page($this->lang->line('register_success'),'');				
				}
				
			}
			else
			{
				$this->init->Show_Access_Is_Denied();
				# Redirect To Login Page
				$this->init->Redirect('');
			}
					

			
		# Load Footer Template
		$this->init->show_footer();
		
			
	
	}
} 
