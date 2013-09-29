<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index()
	{

		
		# Load Categories Language File
		$this->lang->load('discounts', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_discount');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					
					$data['type'] = $this->config->item('type_options');
					$data['type'] = form_dropdown('type', $data['type']);
						
					
					# Load Edit Categories Template
					$this->load->view('admin/add', $data); 	
	
				}
				# Run If Data Sent By Form
				else
				{
					$data = $_POST;
					$this->discounts->add($data);	
				}
			}
			# If Admin Not Have Enough Permission
			else
			{
				# Show Error
				$this->admin_init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->admin_init->show_footer();
		}
		# If Admin Not Logged In
		else
		{
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}	
	}	
}
