<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class invoices_m extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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
	
# Show Invoices In Table By ID Or All	
	function show($id='')
	{
		if($id == '')
		{
			$query = $this->db->get('invoices');			
		}
		else
		{
			$query = $this->db->get_where('invoices', array('user_id' => $id));
		}
		
		$data = array(
			'results' => $query->result(),
			'id' => $id,
		);
				
		return $data; 
	}
	
	
	function init($id)
	{
		$query = $this->db->get_where('invoice_items', array('id' => $id));
		$invoice_items = $query->row();
		
		$this->invoices_id = $invoice_items->invoiceid;
		$this->amount = $invoice_items->amount;
		$this->invoice_items_id = $id;
	}
	
	function delete()
	{
		
		$this->db->where('id', $this->invoice_items_id);
		$this->db->delete('invoice_items'); 
						
		$query = $this->db->get_where('invoices', array('id' => $this->invoices_id));
		$invoices = $query->row();
		
		$total = $invoices->total;
						
		$invoices_update = array(
			'total' => $total - $this->amount,
		);
								
		$this->db->where('id', $this->invoices_id);
		$this->db->update('invoices', $invoices_update); 
						
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_post_success'), base_url().'admin/invoices/summary/'.$this->invoices_id);	
			
		
		
		
				
		//return $data; 
	}
	
}