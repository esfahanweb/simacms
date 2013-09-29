<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sent extends CI_Controller {

	/**
	 *  SIMA Content Management System
	 *  Emails Module
	 *  Admin Section
	 *  Show Controller
	 */
	 
	public function __construct()
	{
		parent::__construct();
		
        # Load Emails Language File
		$this->load->model('sent_m', 'sent_emails');    
    }
	
	 
	#--------------------[ Show / Search Sent Emails Controller ]--------------------#
	public function show()
	{
		# Load Emails Language File
		$this->lang->load('emails', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_emails');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{	
				$data['show_sent_emails'] = $this->sent_emails->show_search();	
				
								
				# Load SHOW USERS Template
				$this->load->view('admin/sent/show', $data);
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
	
	
	
	
	#--------------------[ Delete Sent Emails Controller ]--------------------#
	public function delete($id)
	{
		# Load Emails Language File
		$this->lang->load('emails', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('delete_email');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{	
				$this->form_validation->set_rules('submit', 'submit', 'required');
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{		
					$this->emails->delete_form($id);		
				}
				# Run If Data Sent By Form
				else
				{
					$this->emails->delete_data($id);
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
