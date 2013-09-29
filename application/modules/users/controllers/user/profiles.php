<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller {

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
		$this->load->model('profiles_m', 'users');    
    }
	
	#--------------------[ Add Controller ]--------------------#
	public function add()
	{
		# Load Users Language File
		$this->lang->load('users', $this->init->User['admin_language']);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_user');
		
		# Load Header Template
		$this->init->show_header($page_title);
			
		# Check User Already Logged In 
		if( $this->init->User['Logged_In'] )
		{
			# Show Error
			$this->init->Show_Access_Is_Denied();	
		}
		else
		{
			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			# Run If No Data Sent By Form Yet
			if ($this->form_validation->run() == FALSE)
			{
				$data = $this->users->register();
				# show add form
				$this->load->view('user/profiles/add', $data);
			}
			# Run If Data Sent By Form
			else
			{	
				# update user with posted data
				$this->users->add();
					
				# show success page
				$message = $this->lang->line('add_user_success');
				$redirect_url = base_url().'user/profiles/show';
				$this->init->Show_Success_Page($message, $redirect_url);
			}	
		}
		# Load Footer Template
		$this->init->show_footer();		
	}
	 
	#--------------------[ Show / Search Controller ]--------------------#
	public function show()
	{
		# Load Users Language File
		$this->lang->load('users', $this->init->User['site_language']);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_users');
		
		# Load Header Template
		$this->init->show_header($page_title);
			
		# Check Admin Already Logged In 
		if( $this->init->User['Logged_In'] )
		{
			# Check Admin Have Enough Permission
			if( $this->init->Have_Permission('profiles/show') )
			{		
				$this->form_validation->set_rules('status', 'status', 'required');
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					$users = $this->users->edit();
					$this->load->view('user/profiles/show', $users); 
				}
				# Run If Data Sent By Form
				else
				{	
					$id = $this->init->User['id'];
					$this->users->edit($id);
					
					$message = $this->lang->line('edit_user_success');
					$redirect_url = base_url().'user/profiles/show';
					$this->admin_init->Show_Success_Page($message, $redirect_url);	
				}	
			}
			else
			{
				# Show Error
				$this->init->Show_Access_Is_Denied();
			}
		}
		else
		{
			# Redirect To Login Page
			$this->init->Show_Access_Is_Denied();
		}	
		
		# Load Footer Template
		$this->init->show_footer();
	}	
	
	
	
	#--------------------[ Edit Controller ]--------------------#
	public function edit()
	{
		# Load Users Language File
		$this->lang->load('users', $this->init->User['admin_language']);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('edit_user');
		
		# Check User Already Logged In 
		if( $this->init->User['Logged_In'] )
		{
			# Load Header Template
			$this->init->show_header($page_title);	
			
			# Check User Have Enough Permission
			if( $this->init->Have_Permission('edit') )
			{	
				$this->form_validation->set_rules('firstname', 'firstname', 'required');
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					# show edit form
					$users = $this->users->edit();
					$this->load->view('user/profiles/edit', $users);
				}
				# Run If Data Sent By Form
				else
				{	
					# update user with posted data
					$this->users->update();
					
					# show success page
					$message = $this->lang->line('edit_user_success');
					$redirect_url = base_url().'user/profiles/show';
					$this->init->Show_Success_Page($message, $redirect_url);
				}		
			}
			# If Admin Not Have Enough Permission
			else
			{
				# Show Error
				$this->init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->init->show_footer();
		}
		# If Admin Not Logged In
		else
		{
			# Show Error
			$this->init->Show_Access_Is_Denied();
		}	
	}	
	
	#--------------------[ Summary Controller ]--------------------#
	public function summary($id)
	{
		# Load Users Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('user_summary');
		
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
					$this->users->summary_form($id);
				}
				# Run If Data Sent By Form
				else
				{	
					$this->users->summary_data($id);
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
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('delete_user');
		
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
					$this->users->delete_form($id);		
				}
				# Run If Data Sent By Form
				else
				{
					$this->users->delete_data($id);
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
		# Load Users Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_users');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{	
				$this->users->invoices($id);	
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
