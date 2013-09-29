<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		# Load Required Libraries
		$this->load->library('form_validation');
		
		# Load Required Models
		$this->load->model('admin_init');
		
		# Load Categories Language File
		$this->lang->load('categories', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('edit_category');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{
				# Form Validation Rules
				$this->form_validation->set_rules('Name','Name', 'required');
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					$query = $this->db->get_where('tblcategories', array('id' => $id));
					$row = $query->row();
				
					$data = array(
						'id' => $row->id,
						'Name' => $row->name,
						'seo_url' => $row->seo_url,
						'Description' => $row->description		  
					);	
				
				# Load Edit Categories Template
				$this->load->view($this->admin_init->Admin_Template.'/categories_edit', $data); 	
	
				}
				# Run If Data Sent By Form
				else
				{
					$data = array(
					   'name' => $_POST['Name'],
					   'seo_url' => $_POST['seo_url'],
					   'description' => $_POST['Description'], 
					);
					
					$this->db->where('id', $id);
					$this->db->update('tblcategories', $data); 
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('edit_category_success'), base_url().'admin/categories/show');		
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
