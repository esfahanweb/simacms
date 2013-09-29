<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Orders Module
	 *  Orders_m Model
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
		echo form_open(base_url().'admin/orders/summary/'.$this->Order_ID, '', $hidden);
		echo form_submit('submit', $button);
		echo form_close();
	}
	
	function accept($id)
	{
		$data['status'] = 'Active';
		$this->db->where('id', $id);
		$this->db->update('orders', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('accept success', base_url().'admin/orders/summary/'.$id);
	}
	
	function cancel($id)
	{
		$data['status'] = 'Cancelled';
		$this->db->where('id', $id);
		$this->db->update('orders', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('cancel success', base_url().'admin/orders/summary/'.$id);
	}
	
	function pending($id)
	{
		$data['status'] = 'Pending';
		$this->db->where('id', $id);
		$this->db->update('orders', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('pending success', base_url().'admin/orders/summary/'.$id);
	}
	
	
	
	#--------------------[ Check Order Is Active ? ]--------------------#
	
	function check_order_status($id)
	{
		$query = $this->db->get_where('orders', array('id' => $id));
		$orders = $query->row_array();
		if($orders['status'] == 'active')
		{
			return true;
		}
		if($orders['status'] == 'inactive')
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New Order Form ]--------------------#
	
	function add_form()
	{				
		$orders['user_id'] = $this->admin_init->get_select_from_id('users', 'username');
		$orders['currency_id'] = $this->admin_init->get_select_from_id('currencies', 'title');
		$orders['product_id'] = $this->admin_init->get_select_from_id('products', 'title');
		$orders['gateway_id'] = $this->admin_init->get_select_from_id('gateways', 'title');
		$orders['billing_cycle'] = $this->admin_init->get_select_from_array($this->billing_cycle);
		
		$js_hide = 'onchange="get_data()" onclick="hide_bcycle()"';
		$js_show = 'onchange="get_data()" onclick="show_bcycle()"';
		
		$orders['payment_type_free'] = 'payment_type_free'.form_radio('payment_type', 'free', FALSE, $js_hide);
		$orders['payment_type_onetime'] = 'payment_type_onetime'.form_radio('payment_type', 'onetime', FALSE, $js_hide);
		$orders['payment_type_recurring'] = 'payment_type_recurring'.form_radio('payment_type', 'recurring', TRUE, $js_show);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $orders);
	}
	
	#--------------------[ Add New Order By Posted Data ]--------------------#
	
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
				
		$orders = array(
			'user_id' => $_POST['user_id'],
			'invoice_id' => $invoice_id,
			'total' => $_POST['sub_total'],
			'payment_method' => $_POST['gateway_id'],
			'date' => now(),
		);
		$this->db->insert('orders', $orders); 
		$order_id = $this->db->insert_id();
		
		
		
		$services = array(
			'user_id' => $_POST['user_id'],
			'order_id' => $order_id,
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
	
	#--------------------[ Show Order Summary ]--------------------#

	function summary_form($id)
	{	
		
		$query = $this->db->get_where('orders', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$data['orders'] = $query->row_array();
			$this->Order_ID = $data['orders']['id'];
			$data['orders']['status'] = $this->status($data['orders']['status']);
			
			$query = $this->db->get_where('services', array('order_id' => $this->Order_ID));
			$services = $query->result_array();
			
			$this->load->model('invoices/invoices_m', 'invoices');
			$query = $this->db->get_where('invoices', array('id' => $data['orders']['invoice_id']));
			$invoices = $query->row_array();
			
			$services_output = NULL;
            foreach ($services as $item) 
			{
				$services_output .= '<tr>
						<td>
						<a href="'.base_url().'admin/services/edit/'.$item['id'].'" class="mr10">'.$item['id'].'</a>
            			</td>';
                
				$query = $this->db->get_where('products', array('id' => $item['product_id']));
				$products = $query->row_array();
				
				
				
             	$services_output .= '<td>'.$products['title'].'</td>
             			<td>'.$item['billingcycle'].'</td>
            			<td>'.$item['amount'].'</td>
             			<td>'.$item['status'].'</td>
						<td>'.$this->invoices->status($invoices['status']).'</td>
             			</tr>';
       	 	}
			
			$services_output .= '<tr>
						<td>total : </td>
						<td></td>
             			<td></td>
            			<td>'.$data['orders']['total'].'</td>
             			<td></td>
						<td></td>
             			</tr>';
			 	
		
		
			$data['id'] = $id;
			$data['show_services'] = $services_output;
			
			
			

			//$orders['discount'] = $this->admin_init->get_prop_from_id('discounts', $orders['discount_id'], 'title');
			//$orders['status'] = $this->check_order_status($id);
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
	
	#--------------------[ Update Order By Posted Data ]--------------------#
	
	function summary_data($id)
	{	
	
		if( isset($_POST['action']) )
		{
			switch($_POST['action'])
			{
				case 'cancel':
				$this->cancel($id);
				break;
								
				case 'accept':
				$this->accept($id);
				break;
							
				case 'pending':
				$this->pending($id);
				break;
			}
						
		}
							
		//$data = $_POST;
		


		//$this->db->where('id', $id);
		//$this->db->update('orders', $data); 
		
		# Show Success Page
		//$this->admin_init->Show_Success_Page($this->lang->line('edit_order_success'), base_url().'admin/orders/show');
	}
	
	#--------------------[ Show Edit Order Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('orders', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$orders = $query->row_array();
			$orders['site_language'] = form_dropdown('site_language', $this->language_options, $orders['site_language'] );
			$orders['site_template'] = form_dropdown('site_template', $this->site_template_options, $orders['site_template'] );
			
			if($this->admin_init->group_is_admin($orders['group_id']))
			{
				$orders['admin_language'] = form_dropdown('admin_language', $this->language_options, $orders['admin_language'] );
				$orders['admin_template'] = form_dropdown('admin_template',$this->admin_template_options, $orders['admin_template'] );
			}
			else
			{
				unset($orders['admin_language']);
				unset($orders['admin_template']);
			}
			
			$orders['group_id'] = $this->admin_init->get_select_from_id('groups', $orders['group_id']);
			$orders['discount_id'] = $this->admin_init->get_select_from_id('discounts', $orders['discount_id']);
			$orders['status'] = form_checkbox('status', 'active', $this->check_order_status($id));
			$orders['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(3));	
							
			# Load Admin Edit Template
			$this->load->view('admin/edit', $orders); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Order By Posted Data ]--------------------#
	
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
		$this->db->update('orders', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_order_success'), base_url().'admin/orders/show');
	}
	
	
	
	#--------------------[ Show Delete Order Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('orders', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$check = $this->check_exist_product_under_order($id);
						
			if(!$check)
			{
				$button = 'class="redBtn submitForm"';
				$desc = $this->lang->line('are_you_sure').' ?!';
			}
			else
			{
				$button = 'disabled="disabled" class="submitForm"';
				$desc = $this->lang->line('deleting_order_des');
			}
							
			$orders = array(
				'id' => $id,
				'button' => $button,
				'desc' => $desc,
			);	
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $orders); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Order By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('orders'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_order_success'),base_url().'admin/orders/show');	
	}

	#--------------------[ Show / Search Orders ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('orders');
		$orders = $query->result_array();
		
		
		
		$orders_output = NULL;				
		foreach ($orders as $item)
		{
			$invoices = $this->admin_init->get_all_from_id('invoices', $item['invoice_id']);
			
			$orders_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['order_number'].'</td>
				<td>'.$item['date'].'</td>
				<td>'.$item['user_id'].'</td>
				<td>'.$item['payment_method'].'</td>
				<td>'.$item['total'].'</td>
				<td>'.$invoices['status'].'</td>
				<td>'.$item['status'].'</td>
				<td>
				<a href="'.base_url().'admin/orders/summary/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/orders/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_orders'] = $orders_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
	
	#--------------------[ Show / Search Order Invices ]--------------------#
	
	function invoices($id)
	{
		$this->load->model('invoices/invoices_m', 'invoices');
		$query = $this->db->get_where('invoices', array('order_id' => $id));
		$invoices = $query->result_array();
		$invoices_output = NULL;				
		foreach ($invoices as $item)
		{
			$invoices_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['order_number'].'</td>
				<td>'.$item['date'].'</td>
				<td>'.$item['username'].'</td>
				<td>'.$item['payment_method'].'</td>
				<td>'.$item['total'].'</td>
				<td>'.$item['payment_status'].'</td>
				<td>'.$this->invoices->status($item['status']).'</td>
				<td>
				<a href="'.base_url().'admin/orders/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/invoices/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}	
			
		$orders['show_invoices'] = $invoices_output;
		$orders['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(3));		
		# Load SHOW USERS Template
		$this->load->view('admin/invoices', $orders);
	}	
}