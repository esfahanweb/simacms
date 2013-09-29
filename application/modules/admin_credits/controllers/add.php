<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index()
	{
		# Load Required Libraries
		$this->load->library('form_validation');

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
				if(isset($_POST['Amount']))
				{
					
					$data = array(
				
							'payment_success_redirect' => '',
						
					);
						
					$this->session->unset_userdata($data);
					
					$amount = $_POST['Amount'];
				
					echo 'your charge credit : '.$amount ;
					
					//$this->db->insert('tblcategories', $data); 
					
					# Show Success Page
					//$this->admin_init->Show_Success_Page($this->lang->line('add_category_success'),'admin/categories/show');		
				
				}
				else
				{
				
					# Form Validation Rules
					$this->form_validation->set_rules('Amount','Amount', 'required');
				
					
					# Run If No Data Sent By Form Yet
					if ($this->form_validation->run() == FALSE)
					{	
						$data = array(
				
							'payment_success_redirect' => 'admin/credits/add',
						
						);
						
						$this->session->set_userdata($data);
						
						$query = $this->db->get('gateways');


						$array = $query->result_array();
						$output = NULL;
						foreach ($array as $var)
						{
							$output .= '<option value="'.$var['id'].'">'.$var['title'].'</option>'; 
												
						}
					
						$data['gateway_id'] = $output;
					
						
						
						# Load Add Categories Template
						$this->load->view($this->admin_init->Admin_Template.'/credits_add', $data); 
						
						
						
					}
					
				
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