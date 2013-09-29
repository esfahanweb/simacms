<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class orders_m extends CI_Model {


    function __construct()
    {
		//$this->output->enable_profiler(TRUE);
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
			case 'Paid':
				return '<span style="color:#2a8827;">[ '. 'Paid' .' ]</span>';
			case 'Unpaid':
				return '<span style="color:#B55D5C;">[ '. 'Unpaid' .' ]</span>';
			case 'Canceled':
				return '<span style="color:#2a8827;">[ '. 'Canceled' .' ]</span>';
			case 'Fraud':
				return '<span style="color:#2a8827;">[ '. 'Fraud' .' ]</span>';
		}
	}
	
	
	
	
	
	function button($button)
	{
		$hidden = array('action' => $button);
		echo form_open(base_url().'admin/orders/summary/'.$this->Order_ID, '', $hidden);
		echo form_submit($button.'_submit', $button);
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

	
# Show orders In Table By ID Or All	
	function show($id='')
	{
		if($id == '')
		{
			$query = $this->db->get('orders');	
			$data['orders'] = $query->result_array();		
		}
		else
		{
			$query = $this->db->get_where('orders', array('id' => $id));
			$data['orders'] = $query->row_array();
			
			$query = $this->db->get_where('services', array('order_id' => $data['orders']['id']));
			$services = $query->result_array();
			
			$services_output = NULL;
            foreach ($services as $item) 
			{
				$services_output .= '<tr>
						<td>
						<a href="'.base_url().'admin/services/edit/'.$item['id'].'" class="mr10">'.$item['id'].'</a>
            			</td>';
                
				$query = $this->db->get_where('products', array('id' => $item['product_id']));
				$products = $query->row_array();
				
				$query = $this->db->get_where('invoices', array('id' => $data['orders']['invoice_id']));
				$invoices = $query->row_array();
				
             	$services_output .= '<td>'.$products['title'].'</td>
             			<td>'.$item['billingcycle'].'</td>
            			<td>'.$item['amount'].'</td>
             			<td>'.$item['domainstatus'].'</td>
						<td>'.$invoices['status'].'</td>
             			</tr>';
       	 	}
			
			$services_output .= '<tr>
						<td>total : </td>
						<td></td>
             			<td></td>
            			<td>'.$data['orders']['amount'].'</td>
             			<td></td>
						<td></td>
             			</tr>';
			 	
		}
		
		$data['id'] = $id;
		$data['show_services'] = $services_output;
				
		return $data; 
	}
	
	
	function init($id)
	{
		$query = $this->db->get_where('invoice_items', array('id' => $id));
		$invoice_items = $query->row();
		
		$this->orders_id = $invoice_items->invoiceid;
		$this->amount = $invoice_items->amount;
		$this->invoice_items_id = $id;
	}
	
	function delete()
	{
		
		$this->db->where('id', $this->invoice_items_id);
		$this->db->delete('invoice_items'); 
						
		$query = $this->db->get_where('orders', array('id' => $this->orders_id));
		$orders = $query->row();
		
		$total = $orders->total;
						
		$orders_update = array(
			'total' => $total - $this->amount,
		);
								
		$this->db->where('id', $this->orders_id);
		$this->db->update('orders', $orders_update); 
						
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_post_success'), base_url().'admin/orders/summary/'.$this->orders_id);	
			
		
		
		
				
		//return $data; 
	}
	
	
	#--------------------[ Show Add New Discount Form ]--------------------#
	
	function add_form()
	{				
		$orders['user_id'] = $this->admin_init->get_select_from_id('users', 'username');
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
	
	#--------------------[ Add New Discount By Posted Data ]--------------------#
	
	function add_data()
	{		
		$this->load->helper('date');		
		$orders = array(
			'user_id' => $_POST['user_id'],
			'amount' => $_POST['sub_total'],
			'payment_method' => $_POST['gateway_id'],
			'date' => now(),
		);
		$this->db->insert('orders', $orders); 
		
		# Show Success Page
		//$this->admin_init->Show_Success_Page($this->lang->line('add_discount_success'), base_url().'admin/discounts/show');
	}
	
	
}