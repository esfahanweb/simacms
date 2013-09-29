<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index()
	{
		
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->library('form_validation');
		
		# Load Post Language File
		$this->lang->load('posts', $this->admin_init->Admin_Language);
		
		$page_title = $this->lang->line('add_new_post');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('add_posts') )
			{
				# Load Edit Categories Template	
		
		
		
				
				if ($this->form_validation->run() == FALSE)
				{
					
				
						
				$this->load->view('admin/ajax');
		
					
				}
				else
				{
					
					$this->load->view('admin/ajax');
						
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
