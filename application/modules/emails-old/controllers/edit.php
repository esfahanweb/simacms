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
			if( $this->admin_init->Have_Permission() )
			{
				# Load Edit Categories Template	
		
		
		
				$this->form_validation->set_rules('subject','subject', 'required');
				
				
				if ($this->form_validation->run() == FALSE)
				{
					
					$query = $this->db->get_where('email_templates', array('id' => $id));
					$row = $query->row();
					
			
					
					$data = array(
							   'id' => $row->id,
							   'from' => $row->from,
							   'copy_to' => $row->copy_to,
							   'subject' => $row->subject,
							   'email_text' => $row->email_text,
							   
							  
					);	
					
				$this->load->view($this->admin_init->Admin_Template.'/emails/edit', $data); 
		
					
				}
				else
				{
					$data = array(
					
					   'from' => $_POST['from'],
					   'copy_to' => $_POST['copy_to'],
					   'subject' => $_POST['subject'],
					  'email_text' => $_POST['email_text'],
					);
					
					$this->db->where('id', $id);
					$this->db->update('email_templates', $data); 
					
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('edit_post_success'), base_url().'admin/emails/show');
						
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
