<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prices extends CI_Controller {

	/**
	 *  SIMA Content Management System
	 *  Prices Module
	 *  Admin Section
	 *  Show Controller
	 */
	 
	public function index($type, $relid)
	{
		# Load Prices Language File
		$this->lang->load('prices', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_prices');
		
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
					$this->prices->prices_form($type, $relid);
				}
				# Run If Data Sent By Form
				else
				{	
					$this->prices->prices_data($relid);
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
