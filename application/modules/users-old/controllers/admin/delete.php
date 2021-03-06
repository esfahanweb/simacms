<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->library('form_validation');
		$this->load->model('admin/admin_forms');
		
		# Load Post Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		$page_title = $this->lang->line('delete_user');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('delete_users') )
			{
				# Load Edit Categories Template	
				if ($id==0)
				{	
					# Show Success Page
					$this->admin_init->Show_Success_Page('<strong>متاسفانه </strong>دسترسی به این صفحه مجاز نمیباشد !','admin');	
				}
				else
				{
					$this->form_validation->set_rules('submit','submit', 'required');
			
					if ($this->form_validation->run() == FALSE)
					{
						$data = array(
									'id' => $id,
									);	
					
						$this->load->view('admin/delete', $data); 	
					}
					else
					{
						$this->db->where('id', $id);
						$this->db->delete('users'); 
						

					
						# Show Success Page
						$this->admin_init->Show_Success_Page($this->lang->line('delete_user_success'),'admin/users/show');	
					}
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
