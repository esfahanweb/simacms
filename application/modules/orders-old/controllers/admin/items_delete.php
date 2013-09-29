<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_delete extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		

		
		# Load Post Language File
		$this->lang->load('categories', $this->admin_init->Admin_Language);
		
		$page_title = $this->lang->line('delete_invoice_item');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{
				$query = $this->db->get_where('invoice_items', array('id' => $id));
				if ($query->num_rows() > 0)
				{
					$this->invoices->init($id);
	
					$this->form_validation->set_rules('submit','submit', 'required');
			
					if ($this->form_validation->run() == FALSE)
					{
						$data = array(
									'id' => $id,
									'invoice_id' => $this->invoices->invoices_id,
									);	
					
						$this->load->view('admin/items_delete', $data); 
					}
					else
					{
						
						$this->invoices->delete();
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
				# Show Error
				$this->admin_init->Show_Access_Is_Denied();
			}
	
		}
		else
		{
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}
	}
}
