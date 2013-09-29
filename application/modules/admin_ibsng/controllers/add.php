<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		
		//$this->load->library('ibsngadapter');
		# Load Required Libraries
		$this->load->library('form_validation');
		$this->load->model('ibsng');
		
		
		
		# Load Required Models
		$this->load->model('admin_init');
		
		# Load Categories Language File
		$this->lang->load('categories', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_new_category');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('add_categories') )
			{
				# Form Validation Rules
				$this->form_validation->set_rules('Name','Name', 'required');
				$this->form_validation->set_rules('seo_url','seo_url', 'required');
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{	
					# Load Add Categories Template
					//$this->load->view($this->admin_init->Admin_Template.'/ibsng_add'); 
					
					//$params = array(

					//'owner' => 'Abolfazl',
				
					//);
					
					$this->load->helper('number');
					//$CreateAccount = $this->ibsng->params + $params;
					$data['array'] = $this->ibsng->ibsng_getOnlineUsers($this->ibsng->params);
					//print_r($data['array'][0][0]);
				$this->load->view($this->admin_init->Admin_Template.'/ibsng_show', $data); 
					
					
					
					
				}
				# Run If Data Sent By Form
				else
				{
					$data = array(
						'name' => $_POST['Name'],
					   	'seo_url' => $_POST['seo_url'],
					  	'description' => $_POST['Description'],  
					);

					$this->db->insert('tblcategories', $data); 
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('add_category_success'),'admin/categories/show');		
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