<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		# Load Required Libraries
		$this->load->library('form_validation');
		
		# Load Required Models
		$this->load->model('admin_init');
		$this->load->model('admin/admin_forms');
		
		# Load Categories Language File
		$this->lang->load('categories', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('delete_category');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('delete_categories') )
			{
				# Load Edit Categories Template	
				if ($id==0)
				{	
					# Show Access Is Denied	
					$this->admin_init->Show_Access_Is_Denied();
				}
				else
				{
					# Form Validation Rules
					$this->form_validation->set_rules('submit','submit', 'required');
			
					# Run If No Data Sent By Form Yet
					if ($this->form_validation->run() == FALSE)
					{
						$data = array(
							'id' => $id,
						);
						
						# Load Delete Categories Template
						$this->load->view('admin/delete', $data); 	
					}
					# Run If Data Sent By Form
					else
					{
						$this->db->where('id', $id);
						$this->db->delete('tblcategories'); 
						
						$this->db->where('cat_id', $id);
						$this->db->delete('tblposts');
					
						# Show Success Page
						$this->admin_init->Show_Success_Page($this->lang->line('delete_category_success'),'admin/categories/show');	
					}
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