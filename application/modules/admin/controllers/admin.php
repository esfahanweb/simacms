<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Show module controller.
	 */
	public function index()
	{
		# Load Required Models
		$this->load->model('admin_init');
		$this->load->model('admin_main');
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('admin_home_page');
		
		# Check Admin Already Logged In 
		if( $this->init->User['Is_Admin'] )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			
			$data = array(
               	

				'Number_Of_All_users' => $this->admin_main->Table_Num_Rows('users'),
				'Number_Of_Active_users' => $this->admin_main->Table_Num_Rows('users','Active'),
				'Number_Of_InActive_users' => $this->admin_main->Table_Num_Rows('users','InActive'),

				'Number_Of_All_Posts' => $this->admin_main->Table_Num_Rows('posts'),
				'Number_Of_Active_Posts' => $this->admin_main->Table_Num_Rows('posts','Active'),
				'Number_Of_InActive_Posts' => $this->admin_main->Table_Num_Rows('posts','InActive'),

				'Number_Of_All_Admins' => $this->admin_main->Table_Num_Rows('users'),
				'Number_Of_Active_Admins' => $this->admin_main->Table_Num_Rows('users','Active'),
				'Number_Of_InActive_Admins' => $this->admin_main->Table_Num_Rows('users','InActive'),
			);
			
			# Load Admin Dashboard Template	
			$this->load->view($this->admin_init->Admin_Template.'/dashboard', $data); 
			
			
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