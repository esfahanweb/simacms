<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 *  SIMA Content Management System
	 *  Discounts Module
	 *  Admin Section
	 *  Add Controller
	 */
	 
	public function index()
	{
		# Load Discounts Language File
		$this->lang->load('discounts', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_new_discount');
		
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
					$this->discounts->add_form(); 	
				}
				# Run If Data Sent By Form
				else
				{
					$this->discounts->add_data();	
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
