<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_settings extends CI_Controller {

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
			if( $this->admin_init->Have_Permission('edit_admins') )
			{
				# Set Form Validation Rules
				$this->form_validation->set_rules('ibsng_ip_address','ibsng_ip_address', 'required');
				$this->form_validation->set_rules('ibsng_server_port','ibsng_server_port', 'required');
				$this->form_validation->set_rules('ibsng_timeout','ibsng_timeout', 'required');
				$this->form_validation->set_rules('ibsng_server_username','ibsng_server_username', 'required');
				$this->form_validation->set_rules('ibsng_server_password','ibsng_server_password', 'required');
				$this->form_validation->set_rules('ibsng_admin_prefix','ibsng_admin_prefix', 'required');
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					
					$query = $this->db->get_where('tblibsng', array('user_id' => $this->admin_init->User_ID));
					
					if ($query->num_rows() > 0)
					{
					  
					
						$row = $query->row();
					
					
						$data = array(
							'ibsng_ip_address' => $row->ibsng_ip_address,
							'ibsng_server_port' => $row->ibsng_server_port,
							'ibsng_timeout' => $row->ibsng_timeout,
							'ibsng_server_username' => $row->ibsng_server_username,
							'ibsng_server_password' => $row->ibsng_server_password,
							'ibsng_admin_prefix' => $row->ibsng_admin_prefix,
						
							'Site_Select_Template_Option' => $this->admin_init->Select_Default_Template_Option('site'),
							'Site_Select_Language_Option' => $this->admin_init->Select_Default_Language_Option('site'),
							'Admin_Select_Template_Option' => $this->admin_init->Select_Default_Template_Option('admin'),
							'Admin_Select_Language_Option' => $this->admin_init->Select_Default_Language_Option('admin'),	
						);
				
						# Load Main Settings Template	
						$this->load->view($this->admin_init->Admin_Template.'/ibsng_main_settings', $data); 	
					
					} 
					else
					{
						# Load Main Settings Template	
						$this->load->view($this->admin_init->Admin_Template.'/ibsng_main_settings'); 	
					}
				}
				# Run If Data Sent By Form
				else
				{
					$data = array(
					   'ibsng_ip_address' => $_POST['ibsng_ip_address'],
					   'ibsng_server_port' => $_POST['ibsng_server_port'],
					   'ibsng_timeout' => $_POST['ibsng_timeout'],
					   'ibsng_server_username' => $_POST['ibsng_server_username'],
					   'ibsng_server_password' => $_POST['ibsng_server_password'],
					   'ibsng_admin_prefix' => $_POST['ibsng_admin_prefix'],
					);
					
					$query = $this->db->get_where('tblibsng', array('user_id' => $this->admin_init->User_ID));
					
					if ($query->num_rows() > 0)
					{
						# Update Settings Table From Database
						$this->db->where('user_id', $this->admin_init->User_ID);
						$this->db->update('tblibsng', $data); 
					}
					else
					{
						$data['user_id'] = $this->admin_init->User_ID;
						$this->db->insert('tblibsng', $data); 
					}
					# Show Success Page And Redirect
					$this->admin_init->Show_Success_Page($this->lang->line('edit_settings_success'),'admin/ibsng/main_settings');		
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