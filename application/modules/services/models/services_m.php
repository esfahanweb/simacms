<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class services_m extends CI_Model {


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
	
# Show services In Table By ID Or All	
	function show_user_services($id)
	{

		$query = $this->db->get_where('services', array('user_id' => $id));

		
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
		
		$this->services_id = $invoice_items->invoiceid;
		$this->amount = $invoice_items->amount;
		$this->invoice_items_id = $id;
	}
	
	function delete()
	{
		
		$this->db->where('id', $this->invoice_items_id);
		$this->db->delete('invoice_items'); 
						
		$query = $this->db->get_where('services', array('id' => $this->services_id));
		$services = $query->row();
		
		$total = $services->total;
						
		$services_update = array(
			'total' => $total - $this->amount,
		);
								
		$this->db->where('id', $this->services_id);
		$this->db->update('services', $services_update); 
						
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_post_success'), base_url().'admin/services/summary/'.$this->services_id);	
			
		
		
		
				
		//return $data; 
	}
	
}