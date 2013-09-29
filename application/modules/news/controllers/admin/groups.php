<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class groups extends CI_Controller {

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
		$this->load->model('groups_m', 'groups');    
    }
	 
	#--------------------[ Show / Search Controller ]--------------------#
	public function show()
	{
		# Load groups Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_groups');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{	
				$data['show_groups'] = $this->groups->show_search();
					
				# Load SHOW groupS Template
				$this->load->view('admin/groups/show', $data);
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
	
	#--------------------[ Add Controller ]--------------------#
	public function add()
	{
		# Load groups Language File
		$this->lang->load('groups', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_new_group');
		
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
					$this->groups->add_form(); 		
				}
				# Run If Data Sent By Form
				else
				{
					$this->groups->create($_POST);
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('add_group_success'), base_url().'admin/groups/groups/show'); 					
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
	
	#--------------------[ Edit Controller ]--------------------#
	public function edit($id)
	{
		# Load groups Language File
		$this->lang->load('groups', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('edit_group');
		
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
					$this->groups->edit_form($id);
				}
				# Run If Data Sent By Form
				else
				{	
					$this->groups->update($id, $_POST);
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('edit_group_success'), base_url().'admin/users/groups/show');
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
	
	#--------------------[ Summary Controller ]--------------------#
	public function summary($id)
	{
		# Load groups Language File
		$this->lang->load('groups', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('group_summary');
		
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
					$this->groups->summary_form($id);
				}
				# Run If Data Sent By Form
				else
				{	
					$this->groups->summary_data($id);
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
	
	#--------------------[ Delete Controller ]--------------------#
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
	
	#--------------------[ Invoices Controller ]--------------------#
	public function invoices($id)
	{
		# Load groups Language File
		$this->lang->load('groups', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_groups');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{	
				$this->groups->invoices($id);	
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
