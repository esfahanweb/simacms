<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {

	/**
	 *  SIMA Content Management System
	 *  Gateways Module
	 *  Admin Section
	 *  Show Controller
	 */
	 
	public function index()
	{
		# Load Gateways Language File
		$this->lang->load('gateways', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_gateways');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{	
				$this->gateways->show_search();	
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
