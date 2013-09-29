<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class products_m extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		//$this->type_options = $this->config->item('type_options');
    }
 	

	
# Show Discounts In Table By ID Or All	
	function show($id='', $group_id='')
	{
		if($id == '')
		{
			if($group_id == '')
			{
			
				$query = $this->db->get('products');
				$data['results'] = $query->result();
			}
			else
			{
				$query = $this->db->get_where('products', array('group_id' => $group_id));
				$data['results'] = $query->result();
			}

		}
		else
		{
			
			$query = $this->db->get_where('products', array('id' => $id));
			$data = $query->row();
		}

	
				
		return $data; 
	}
	
	///
	
	function update($id, $data)
	{				
		$this->db->where('id', $id);
		$this->db->update('discounts', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_discount_success'), base_url().'admin/discounts/show');
	}
	
	
	///
	
	function add($data)
	{				
		$this->db->insert('discounts', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_discount_success'), base_url().'admin/discounts/show');
	}
	
}