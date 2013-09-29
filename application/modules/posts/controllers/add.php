<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
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
		
		
		
				$this->form_validation->set_rules('title','title', 'required');
				
				
				if ($this->form_validation->run() == FALSE)
				{
					
				
						
				$this->load->view($this->admin_init->Admin_Template.'/posts/add'); 	
		
					
				}
				else
				{
					$this->load->helper('date');
					$format = 'DATE_ATOM';
					$time = time();
					
					$data = array(
						'create_date' => standard_date($format, $time),
					   'title' => $_POST['title'],
					   'cat_id' => $_POST['cat_id'],
					   'story' => $_POST['story'],
					   'status' => $_POST['status'],
					  
					);
					
			
					$this->db->insert('tblposts', $data); 
					
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('add_post_success'),'admin/posts/show');
						
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
