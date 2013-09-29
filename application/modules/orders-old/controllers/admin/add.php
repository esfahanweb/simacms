<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		
		$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->library('form_validation');
		
		# Load Post Language File
		$this->lang->load('orders', $this->admin_init->Admin_Language);
		
		$page_title = $this->lang->line('add_new_order');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('add_posts') )
			{
				# Load Edit Categories Template	
		
		
		$this->form_validation->set_rules('domain', 'domain', 'max_length[12]');
				
				if ($this->form_validation->run() == FALSE)
				{
					
				
						
				$this->orders->add_form(); 	
		
					
				}
				else
				{
					
					$this->orders->add_data();
					
					# Show Success Page
					//$this->admin_init->Show_Success_Page($this->lang->line('add_post_success'),'admin/posts/show');
						
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
	
	
	public function get_product_price()
	{
		//if(isset($_REQUEST['id'])) echo $_REQUEST['id'];
		$id = $this->input->get('id', TRUE);
		$bcycle = $this->input->get('bcycle', TRUE);
		$payment_type = $this->input->get('radio', TRUE);
		
		$query = $this->db->get_where('prices', array('type' => 'products', 'relid' => $id));
		
		
		$row = $query->row_array();
		
		switch($payment_type)
		{
			case 'free':
				echo 0;
				break;
				
			case 'onetime':
				echo $row['monthly'];
				break;
				
			case 'recurring':
				echo $row["$bcycle"];
				break;
				
		}

		
	/*	if($_REQUEST['bcycle'] == 'free')
		{
			echo 0;
		}
		else
		{
			echo $row['monthly'];
		}  */
		
	}
	
	
	
}
