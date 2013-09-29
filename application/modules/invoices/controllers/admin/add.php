<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	/**
	 *  SIMA Content Management System
	 *  Invoices Module
	 *  Admin Section
	 *  Add Controller
	 */
	 
	public function index()
	{
		$this->output->enable_profiler(TRUE);
		# Load Invoices Language File
		$this->lang->load('invoices', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_new_invoice');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					$this->invoices->add_form(); 	
				}
				# Run If Data Sent By Form
				else
				{
					$this->invoices->add_data();	
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
	
	public function get_currency_rate()
	{
		$currency_id = $this->input->get('id', TRUE);
		$query = $this->db->get_where('currencies', array('id' => $currency_id));
		$currencies = $query->row_array();
		echo $currencies['rate'];
		
	}
	
	public function get_product_price()
	{
		//if(isset($_REQUEST['id'])) echo $_REQUEST['id'];
		$id = $this->input->get('id', TRUE);
		$bcycle = $this->input->get('bcycle', TRUE);
		$payment_type = $this->input->get('radio', TRUE);
		$currency_id = $this->input->get('currency', TRUE);
		
		$query = $this->db->get_where('prices', array('type' => 'products', 'relid' => $id ));
		$prices = $query->row_array();
		

		
		if ($query->num_rows() > 0)
		{
			switch($payment_type)
			{
				case 'free':
					echo 0;
					break;
					
				case 'onetime':
					echo $prices['monthly'];
					break;
					
				case 'recurring':
					echo $prices["$bcycle"];
					break;

					
			}
			

			
		}
		else
		{
			echo 'this product has no price for this currency!';
		}
	}	
}
