<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoices_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Invoices Module
	 *  Invoices_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->billing_cycle = array (
			'monthly'  => 'Monthly', 
			'quarterly'  => 'Quarterly', 
			'semiannually'  => 'Semiannually',
			'annually'  => 'Annually',
			'biennially'  => 'Biennially',
			'triennially'  => 'Triennially',
		);

    }

	
	function status($status)
	{
		switch($status)
		{
			case 'Active':
				return '<span style="color:#2a8827;">[ '. 'Active' .' ]</span>';
			case 'Pending':
				return '<span style="color:#B55D5C;">[ '. 'Pending' .' ]</span>';
			case 'Cancelled':
				return '<span style="color:#2a8827;">[ '. 'Cancelled' .' ]</span>';

		}
	}
	
	
	
	
	
	function button($button)
	{
		$hidden = array('action' => $button);
		echo form_open(base_url().'admin/invoices/summary/'.$this->Invoice_ID, '', $hidden);
		echo form_submit('submit', $button);
		echo form_close();
	}
	
	function accept($id)
	{
		$data['status'] = 'Active';
		$this->db->where('id', $id);
		$this->db->update('invoices', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('accept success', base_url().'admin/invoices/summary/'.$id);
	}
	
	function cancel($id)
	{
		$data['status'] = 'Cancelled';
		$this->db->where('id', $id);
		$this->db->update('invoices', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('cancel success', base_url().'admin/invoices/summary/'.$id);
	}
	
	function pending($id)
	{
		$data['status'] = 'Pending';
		$this->db->where('id', $id);
		$this->db->update('invoices', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('pending success', base_url().'admin/invoices/summary/'.$id);
	}
	
	
	
	#--------------------[ Check Invoice Is Active ? ]--------------------#
	
	function check_invoice_status($id)
	{
		$query = $this->db->get_where('invoices', array('id' => $id));
		$invoices = $query->row_array();
		if($invoices['status'] == 'active')
		{
			return true;
		}
		if($invoices['status'] == 'inactive')
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New Invoice Form ]--------------------#
	
	function add_form()
	{				
		$invoices['user_id'] = $this->admin_init->get_select_from_id('users', 'username');
		$invoices['currency_id'] = $this->admin_init->get_select_from_id('currencies', 'title');
		$invoices['product_id'] = $this->admin_init->get_select_from_id('products', 'title');
		$invoices['gateway_id'] = $this->admin_init->get_select_from_id('gateways', 'title');
		$invoices['billing_cycle'] = $this->admin_init->get_select_from_array($this->billing_cycle);
		
		$js_hide = 'onchange="get_data()" onclick="hide_bcycle()"';
		$js_show = 'onchange="get_data()" onclick="show_bcycle()"';
		
		$invoices['payment_type_free'] = 'payment_type_free'.form_radio('payment_type', 'free', FALSE, $js_hide);
		$invoices['payment_type_onetime'] = 'payment_type_onetime'.form_radio('payment_type', 'onetime', FALSE, $js_hide);
		$invoices['payment_type_recurring'] = 'payment_type_recurring'.form_radio('payment_type', 'recurring', TRUE, $js_show);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $invoices);
	}
	
	#--------------------[ Add New Invoice By Posted Data ]--------------------#
	
	function add_data()
	{				
		$this->load->helper('date');
		
		$query = $this->db->get_where('products', array('id' => $_POST['product_id']));
		$products = $query->row_array();
		
		$invoices = array(
			'user_id' => $_POST['user_id'],
			'subtotal' => $_POST['sub_total'],
			'total' => $_POST['sub_total'],
			//'date' => now(),
		);
		$this->db->insert('invoices', $invoices);
		$invoice_id = $this->db->insert_id(); 
		
		$invoice_items = array(
			'invoiceid' => $invoice_id,
			'desc' => $products['title'],
			'amount' => $_POST['sub_total'],
			//'date' => now(),
		);
		$this->db->insert('invoice_items', $invoice_items);
				
		$invoices = array(
			'user_id' => $_POST['user_id'],
			'invoice_id' => $invoice_id,
			'total' => $_POST['sub_total'],
			'payment_method' => $_POST['gateway_id'],
			'date' => now(),
		);
		$this->db->insert('invoices', $invoices); 
		$invoice_id = $this->db->insert_id();
		
		
		
		$services = array(
			'user_id' => $_POST['user_id'],
			'invoice_id' => $invoice_id,
			'product_id' => $_POST['product_id'],
			'server_id' => $products['server_id'],
			'paymentmethod' => $_POST['gateway_id'],
			'amount' => $_POST['sub_total'],
			'billingcycle' => $_POST['billing_cycle'],
			//'date' => now(),
		);
		$this->db->insert('services', $services); 
		
		
		
		
		# Show Success Page
		//$this->admin_init->Show_Success_Page($this->lang->line('add_discount_success'), base_url().'admin/discounts/show');
	}
	
	#--------------------[ Show Invoice Summary ]--------------------#

	function summary_form($id)
	{	
		
		$query = $this->db->get_where('invoices', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$data['invoices'] = $query->row_array();
			$this->Invoice_ID = $data['invoices']['id'];
			$data['invoices']['status'] = $this->status($data['invoices']['status']);
			
			$this->db->order_by("id", "asc"); 
			$query = $this->db->get_where('invoice_items', array('invoice_id' => $this->Invoice_ID));
			$invoice_items = $query->result_array();
			
			//$this->load->model('invoices/invoices_m', 'invoices');
			//$query = $this->db->get_where('invoices', array('id' => $data['invoices']['invoice_id']));
			//$invoices = $query->row_array();
			
			$services_output = NULL;
			$total = 0;
            foreach ($invoice_items as $item) 
			{

                
				//$query = $this->db->get_where('products', array('id' => $item['product_id']));
				//$products = $query->row_array();
				
				
				
             	$services_output .= '<tr>
               	 <td>
             <input type="text" class="validate[required]" name="update['.$item['id'].'][desc]" value="'.$item['desc'].'" />
            	</td>
                <td>
             <input type="text" class="validate[required]" name="update['.$item['id'].'][Amount]" value="'.$item['amount'].'" />
              <input type="hidden" name="update['.$item['id'].'][id]" value="'.$item['id'].'" />
             </td>
             <td>
             <a href="'.base_url().'admin/invoices/items_delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
            </td>
                </tr>';
				
				$total += $item['amount'];
       	 	}
			
			
			 	
		
		
			$data['id'] = $id;
			$data['total'] = $total;
			$data['show_services'] = $services_output;
			$data['invoice_items'] = $invoice_items;
			
			

			//$invoices['discount'] = $this->admin_init->get_prop_from_id('discounts', $invoices['discount_id'], 'title');
			//$invoices['status'] = $this->check_invoice_status($id);
			$data['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(3));	
			
							
			# Load Admin Edit Template
			$this->load->view('admin/summary', $data); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Invoice By Posted Data ]--------------------#
	
	function summary_data($id)
	{	
	
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
					'invoice_id' => $id,
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
	
	#--------------------[ Show Edit Invoice Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('invoices', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$invoices = $query->row_array();
			$invoices['site_language'] = form_dropdown('site_language', $this->language_options, $invoices['site_language'] );
			$invoices['site_template'] = form_dropdown('site_template', $this->site_template_options, $invoices['site_template'] );
			
			if($this->admin_init->group_is_admin($invoices['group_id']))
			{
				$invoices['admin_language'] = form_dropdown('admin_language', $this->language_options, $invoices['admin_language'] );
				$invoices['admin_template'] = form_dropdown('admin_template',$this->admin_template_options, $invoices['admin_template'] );
			}
			else
			{
				unset($invoices['admin_language']);
				unset($invoices['admin_template']);
			}
			
			$invoices['group_id'] = $this->admin_init->get_select_from_id('groups', $invoices['group_id']);
			$invoices['discount_id'] = $this->admin_init->get_select_from_id('discounts', $invoices['discount_id']);
			$invoices['status'] = form_checkbox('status', 'active', $this->check_invoice_status($id));
			$invoices['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(3));	
							
			# Load Admin Edit Template
			$this->load->view('admin/edit', $invoices); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Invoice By Posted Data ]--------------------#
	
	function edit_data($id)
	{			
		$data = $_POST;
		if(isset($_POST['status']))
		{
			$data['status'] = 'active';
		}
		else
		{
			$data['status'] = 'inactive';	
		}
		
		if($_POST['password'] == '')		
		{
			unset($data['password']);								
		}
		else
		{
			$this->load->library('encrypt');
			$data['password'] = $this->encrypt->sha1( $_POST['password'] );
		}


		$this->db->where('id', $id);
		$this->db->update('invoices', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_invoice_success'), base_url().'admin/invoices/show');
	}
	
	
	
	#--------------------[ Show Delete Invoice Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('invoices', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$check = $this->check_exist_product_under_invoice($id);
						
			if(!$check)
			{
				$button = 'class="redBtn submitForm"';
				$desc = $this->lang->line('are_you_sure').' ?!';
			}
			else
			{
				$button = 'disabled="disabled" class="submitForm"';
				$desc = $this->lang->line('deleting_invoice_des');
			}
							
			$invoices = array(
				'id' => $id,
				'button' => $button,
				'desc' => $desc,
			);	
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $invoices); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Invoice By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('invoices'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_invoice_success'),base_url().'admin/invoices/show');	
	}

	#--------------------[ Show / Search Invoices ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('invoices');
		$invoices = $query->result_array();
		
		
		
		$invoices_output = NULL;				
		foreach ($invoices as $item)
		{
			$invoices = $this->admin_init->get_all_from_id('invoices', $item['invoice_id']);
			
			$invoices_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['invoice_number'].'</td>
				<td>'.$item['date'].'</td>
				<td>'.$item['user_id'].'</td>
				<td>'.$item['payment_method'].'</td>
				<td>'.$item['total'].'</td>
				<td>'.$invoices['status'].'</td>
				<td>'.$item['status'].'</td>
				<td>
				<a href="'.base_url().'admin/invoices/summary/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/invoices/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_invoices'] = $invoices_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
	
	#--------------------[ Show / Search Invoice Invices ]--------------------#
	
	function invoices($id)
	{
		$this->load->model('invoices/invoices_m', 'invoices');
		$query = $this->db->get_where('invoices', array('invoice_id' => $id));
		$invoices = $query->result_array();
		$invoices_output = NULL;				
		foreach ($invoices as $item)
		{
			$invoices_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['invoice_number'].'</td>
				<td>'.$item['date'].'</td>
				<td>'.$item['username'].'</td>
				<td>'.$item['payment_method'].'</td>
				<td>'.$item['total'].'</td>
				<td>'.$item['payment_status'].'</td>
				<td>'.$this->invoices->status($item['status']).'</td>
				<td>
				<a href="'.base_url().'admin/invoices/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/invoices/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}	
			
		$invoices['show_invoices'] = $invoices_output;
		$invoices['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(3));		
		# Load SHOW USERS Template
		$this->load->view('admin/invoices', $invoices);
	}	
}