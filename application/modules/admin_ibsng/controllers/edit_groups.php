<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_groups extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		# Load Required Libraries
		$this->load->library('form_validation');
		
		# Load Required Models
		$this->load->model('admin_init');
		$this->load->model('ibsng');
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
			if( $this->admin_init->Have_Permission('edit_categories') )
			{
				
				
		
				
				# Form Validation Rules
				$this->form_validation->set_rules('title','title', 'required');
				$this->form_validation->set_rules('ibsng_group_name','ibsng_group_name', 'required');
				$this->form_validation->set_rules('price','price', 'required');
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					$query = $this->db->get_where('tblibsng_groups', array('id' => $id));
					$row = $query->row();
					
					$array = $this->ibsng->listGroups($this->ibsng->params);
					$selected = $row->ibsng_group_name;
				
					$data = array(
						'id' => $row->id,
						'title' => $row->title,
						//'ibsng_group_name' => $row->ibsng_group_name,
						'ibsng_group_name' => $this->admin_init->Select_Array_Option($array, $selected),
						'price' => $row->price		  
					);	
				
				
				
				
				# Load Edit Categories Template
				$this->load->view($this->admin_init->Admin_Template.'/ibsng_edit_groups', $data); 	
	
				}
				# Run If Data Sent By Form
				else
				{
					$data = array(
					   'title' => $_POST['title'],
					   'ibsng_group_name' => $_POST['ibsng_group_name'],
					   'price' => $_POST['price'], 
					);
					
					$this->db->where('id', $id);
					$this->db->update('tblibsng_groups', $data); 
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('edit_category_success'),'admin/ibsng/show_groups');		
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
