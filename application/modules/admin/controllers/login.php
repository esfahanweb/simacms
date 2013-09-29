<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Show module controller.
	 */
	public function index()
	{
		# Load Required Libraries
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		
		# Load Required Models
		$this->load->model('admin_init');
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('admin_login');
		
		# Set Form Validation Rules	
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('password','password', 'required');	
		
		# Run If No Data Sent By Form Yet		
		if ($this->form_validation->run() == FALSE)
		{	
			$user_login_data = array(
				'username'  => '',
				'user_id'     => '',
				'user_logged_in' => FALSE
			);
			
			$this->session->unset_userdata($user_login_data);	
				
			$data = array(
				'TMPL' => base_url().'application/views/'.$this->admin_init->Admin_Template,
				'companyname' => $this->init->Config['companyname'],
				'PageTitle' => $page_title,
			);
			
			# Load Login Template	
			$this->load->view($this->admin_init->Admin_Template.'/login', $data); 
		}
		# Run If Data Sent By Form
		else
		{
			$data = array(		
				'username' => $_POST['username'],
				'password' => $_POST['password'],
			);

			$query = $this->db->get_where('users', array('username' => $data['username']));
			$row = $query->row();
			# Check Username		
			if(isset($row->username))
			{
				# Check Password
				if($row->password == $this->encrypt->sha1($data['password']))
				{
					$user_login_data = array(
						'username'  => $data['username'],
						'user_id'     => $row->id,
						'user_logged_in' => TRUE
					 );

					$this->session->set_userdata($user_login_data);
				
					# Show Success Page
					$this->admin_init->Redirect('admin', '<strong>تبریک </strong>شما با موفقیت به سیستم وارد شدید !');
					
				}
				# If Password Is Invalid	
				else
				{
					$user_login_data = array(
						'username'  => '',
						'user_id'     => '',
						'user_logged_in' => FALSE
					);

					$this->session->unset_userdata($user_login_data);
							
					# Show Access Is Denied				
					$this->admin_init->Show_Access_Is_Denied();
					
					# Redirect To Login Page
					$this->admin_init->Redirect('admin/login');
							
				}
			}
			# If Username Is Invalid
			else
			{
				# Show Access Is Denied	
				$this->admin_init->Show_Access_Is_Denied();
				
				# Redirect To Login Page
				$this->admin_init->Redirect('admin/login');
			}		
		}
	}	
}