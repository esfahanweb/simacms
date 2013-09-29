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
				$this->form_validation->set_rules('title','title', 'required');
				$this->form_validation->set_rules('merchant_id','merchant_id', 'required');
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					
					$query = $this->db->get_where('gateways', array('id' => $id));
					$gateways = $query->row();
					
					
					
					$this->load->helper('directory');
					$gateway_types =  directory_map('./application/modules/gateways/controllers/modules/', 1);
					
					
					$i = 0;
					foreach($gateway_types as $row)
					{
						$gateway_types[$i] = str_replace(".php", "", $row);
						$i++;
					}
					
					$type = $this->admin_init->get_select_from_array($gateway_types, $gateways->name);
					$data = array(
						'id' => $gateways->id,
						'name' => $type,
						'title' => $gateways->title,
						'merchant_id' => $gateways->merchant_id		  
					);	
				
				# Load Edit Categories Template
				$this->load->view('admin/edit', $data); 	
	
				}
				# Run If Data Sent By Form
				else
				{
					$name = $_POST['name'];
					$name = str_replace(".php", "", $name);

					$data = array(
					   'title' => $_POST['title'],
					   'name' => $name,
					   'merchant_id' => $_POST['merchant_id'], 
					);
					
					$this->db->where('id', $id);
					$this->db->update('gateways', $data); 
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('edit_category_success'), base_url().'admin/gateways/show');		
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
