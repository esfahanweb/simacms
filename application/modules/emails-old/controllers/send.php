<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send extends CI_Controller {

	/**
	 * Show module controller.
	 */
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		
		
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
				
				$this->load->library('email');
			

				# Load SHOW USERS Template
				//$this->load->view($this->admin_init->Admin_Template.'/emails/show'); 	
				
				$config['protocol'] = 'smtp';
				//$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['smtp_host'] = 'smtp.gmail.com';
				$config['smtp_user'] = 'noreply@esfahanweb.com';
				$config['smtp_pass'] = 'myesfahanweb26';
				$config['smtp_port'] = '465';
				
				$this->email->initialize($config);
				
				
				
				

				$this->email->from('noreply@esfahanweb.com', 'Your Name');
				$this->email->to('info@esfahanweb.com');
				$this->email->cc('info@esfahanweb.com');
				
				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');
				
				$this->email->send();
				
				echo $this->email->print_debugger();

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
