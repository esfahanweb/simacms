<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {

	/**
	 * Show module controller.
	 */
	public function index($id = '')
	{
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->model('invoices_m', 'invoices');
		
		# Load Post Language File
		$this->lang->load('posts', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_posts');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('show_posts') )
			{
				
					
				$data = $this->invoices->show();
				# Load SHOW USERS Template
				$this->load->view('admin/show', $data);

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
