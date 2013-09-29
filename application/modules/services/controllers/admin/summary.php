<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summary extends CI_Controller {

	/**
	 * Show module controller.
	 */
	public function index($id=0)
	{
		
		
		$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->model('tabs');
		$this->load->model('invoices_m' , 'invoices');
		
		# Load Admin Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('show_search_users');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('show_users') )
			{
				$query = $this->db->get_where('invoices', array('id' => $id));
				$invoice = $query->row();
				
				$data = $invoice;
				
				$this->form_validation->set_rules('desc','desc', '');
				
				
				if ($this->form_validation->run() == FALSE)
				{
				
					$query = $this->db->get_where('invoice_items', array('invoiceid' => $id));
					$invoice_items = $query->result_array();
					
					$data->invoice_items = $invoice_items;
					
					# Load SHOW USERS Template
					$this->load->view('admin/summary', $data); 
				}
				else
				{
					//$data = array(
					
					  // 'desc' => $_POST['desc'],
					 //  'amount' => $_POST['Amount'],
					  
					//);
					$total = 0;
					
					if(isset($_POST['update']))
					{ 
						
						foreach($_POST['update'] as $vars)
						{
	
							$invoice_items_id = $vars['id'];
							$invoice_items_update = array(
								'amount' => $vars['Amount'],
								'desc' => $vars['desc'],
							);
							
							$total += $vars['Amount'];
							
							$this->db->where('id', $invoice_items_id);
							$this->db->update('invoice_items', $invoice_items_update); 
						}
					}
					
					
					
					
					if( $_POST['add']['desc'] && $_POST['add']['Amount'] )
					{
						$invoice_items_add = array(
								'desc' => $_POST['add']['desc'],
								'amount' => $_POST['add']['Amount'],
								'invoiceid' => $invoice->id,
						);
						
						$total += $_POST['add']['Amount'];
							
						$this->db->insert('invoice_items', $invoice_items_add); 
					}
					
					
					$invoices_update = array(
							'total' => $total,
					);
						
					$this->db->where('id', $id);
					$this->db->update('invoices', $invoices_update); 
			
				
					
					
					
					# Show Success Page
					$this->admin_init->Show_Success_Page($this->lang->line('edit_post_success'), base_url().'admin/invoices/summary/'.$id);
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
