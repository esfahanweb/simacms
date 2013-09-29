<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	/**
	 *  SIMA Content Management System
	 *  Prices Module
	 *  Admin Section
	 *  Edit Controller
	 */
	 
	public function index($id)
	{
		# Load Prices Language File
		$this->lang->load('prices', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('edit_price');
		
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
					$this->prices->edit_form($id);
				}
				# Run If Data Sent By Form
				else
				{	
					$this->prices->edit_data($id);
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
