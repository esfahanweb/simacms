<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index()
	{
		# Load Required Libraries
		$this->load->library('form_validation');
		
		# Load Required Models
		$this->load->model('admin_init');

		# Load Settings Language File
		$this->lang->load('settings', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('main_settings');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('edit_categories') )
			{
				# Set Form Validation Rules
				$this->form_validation->set_rules('registered_group_id','registered_group_id', 'registered_group_id');

				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					$registered_group_id = $this->init->Fetch_Default_Settings('users_settings' ,'registered_group_id');
					$registered_group_id = $this->admin_init->get_select_from_id('groups', $registered_group_id);
					
					$unregistered_group_id = $this->init->Fetch_Default_Settings('users_settings' ,'unregistered_group_id');
					$unregistered_group_id = $this->admin_init->get_select_from_id('groups', $unregistered_group_id);
					
					$data = array(
						'registered_group_id' => $registered_group_id,
						'unregistered_group_id' => $unregistered_group_id,
			 	   	);
				
					# Load Main Settings Template	
					$this->load->view($this->admin_init->Admin_Template.'/users/settings', $data); 	
				}
				# Run If Data Sent By Form
				else
				{
					$data = array(
					   'registered_group_id' => $_POST['registered_group_id'],
					   'unregistered_group_id' => $_POST['unregistered_group_id'],
					);
					
					# Update Settings Table From Database
					$this->db->update('users_settings', $data); 
					
					# Show Success Page And Redirect
					$this->admin_init->Show_Success_Page($this->lang->line('edit_settings_success'), base_url().'admin/users/settings');		
				}
			}
			# If Admin Not Have Enough Permission
			else
			{
				# Show Access Is Denied
				$this->admin_init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->admin_init->show_footer();
		}
		# If Admin Not Logged In
		else
		{
			# Show Access Is Denied
			$this->admin_init->Show_Access_Is_Denied();
			
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}	
	}	
}