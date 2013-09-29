<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	/**
	 * Home module controller.
	 */
	
	 
	 
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('init');
		$this->load->model('home/blocks');
		
		# Load Post Language File
		$this->lang->load('home', $this->init->Site_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('homepage');
		

		# Load Header Template
		$this->init->show_header($page_title);	
			
		$User_login_data = array(
				'email'  => '',
				'User_id'  => '',
				'User_logged_in' => ''
		);

		$this->session->unset_userdata($User_login_data);
				
		//$this->load->view($this->init->Site_Template.'/login'); 
		
					
		# Show Success Page
		$this->init->Show_Success_Page('<strong>تبریک </strong>شما با موفقیت از سیستم خارج شدید !','login');
			
		# Load Footer Template
		$this->init->show_footer();
		
			
	
	}
} 
