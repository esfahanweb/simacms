<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discounts_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Discounts Module
	 *  Discounts_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		# Load Required Config Items
		$this->type_options = $this->config->item('type_options');
    }
 	
	#--------------------[ Show Add New Discount Form ]--------------------#
	
	function add_form()
	{				
		$discounts['type'] = form_dropdown('type', $this->type_options);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $discounts);
	}
	
	#--------------------[ Add New Discount By Posted Data ]--------------------#
	
	function add_data()
	{				
		$data = $_POST;
		$this->db->insert('discounts', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_discount_success'), base_url().'admin/discounts/show');
	}
	
	#--------------------[ Show Edit Discount Form ]--------------------#
	
	function edit_form($id)
	{				
		$query = $this->db->get_where('discounts', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$discounts = $query->row_array();
			$discounts['type'] = form_dropdown('type', $this->type_options, $discounts['type'] );
									
			# Load Edit Categories Template
			$this->load->view('admin/edit', $discounts); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Discount By Posted Data ]--------------------#
	
	function edit_data($id)
	{				
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->update('discounts', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_discount_success'), base_url().'admin/discounts/show');
	}
	
	#--------------------[ Show Delete Discount Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('discounts', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$discounts = $query->row_array();
									
			# Load Edit Categories Template
			$this->load->view('admin/delete', $discounts); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Discount By Posted Data ]--------------------#
	
	function delete_data($id)
	{				
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->delete('discounts'); 
							
		$data = array(
			 'discount_id' => '0',
		);
		$this->db->where('discount_id', $id);
		$query = $this->db->get('users');
		foreach ($query->result() as $row)
		{
			$this->db->update('users', $data); 
		}
	
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_admin_success'),base_url().'admin/discounts/show');	
	}

	#--------------------[ Show / Search Discounts ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('discounts');
		$discounts = $query->result_array();
		$discounts_output = NULL;				
		foreach ($discounts as $item)
		{
			$discounts_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['title'].'</td>
				<td>
				<a href="'.base_url().'admin/discounts/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/discounts/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_discounts'] = $discounts_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
}