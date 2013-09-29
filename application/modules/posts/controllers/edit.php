<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->model('posts');
		$this->load->library('form_validation');
		
		# Load Post Language File
		$this->lang->load('posts', $this->admin_init->Admin_Language);
		
		$page_title = $this->lang->line('edit_post');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('edit_posts') )
			{
				# Load Edit Categories Template	
		
		
		
				$this->form_validation->set_rules('title','title', 'required');
				
				
				if ($this->form_validation->run() == FALSE)
				{
					
					$query = $this->db->get_where('tblposts', array('id' => $id));
					$row = $query->row();
					
			
					
					$data = array(
							   'id' => $row->id,
							   'cat_id' => $row->cat_id,
							   'title' => $row->title,
							   'story' => $row->story,
							   'Status_Option' => $this->admin_init->Status_Option('tblposts', $row->id),
							   'Post_Select_Category_Option' => $this->admin_init->Selected_Category_Option($row->id),
							  
					);	
					
				$this->load->view($this->admin_init->Admin_Template.'/posts/edit', $data); 
		
					
				}
				else
				{
					$data = array(
					
					   'cat_id' => $_POST['cat_id'],
					   'title' => $_POST['title'],
					   'story' => $_POST['story'],
					   'status' => $_POST['status'],
					  
					);
					
					$this->db->where('id', $id);
					$this->db->update('tblposts', $data); 
					
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('edit_post_success'),'admin/posts/show');
						
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
