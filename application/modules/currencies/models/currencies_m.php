<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currencies_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Currencies Module
	 *  Discounts_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		# Load Required Config Items
		
    }
 	
	#--------------------[ Show Add New Currency Form ]--------------------#
	
	function add_form()
	{				
		$currencies['type'] = form_dropdown('type', $this->type_options);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $currencies);
	}
	
	#--------------------[ Add New Currency By Posted Data ]--------------------#
	
	function add_data()
	{				
		$data = $_POST;
		$this->db->insert('currencies', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_discount_success'), base_url().'admin/currencies/show');
	}
	
	#--------------------[ Show Edit Currency Form ]--------------------#
	
	function edit_form($id)
	{				
		$query = $this->db->get_where('currencies', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$currencies = $query->row_array();
			if($id == 0)
			{
				$currencies['rate'] = '<input style="direction:ltr" disabled="disabled" type="text" class="validate[required]" name="rate" id="rate" value="'.$currencies['rate'].'" />';
				$this->admin_init->Show_Access_Is_Denied('there is no way to edit Rate of default currency!');
				

			}
			else
			{
				$currencies['rate'] = '<input style="direction:ltr" type="text" class="validate[required]" name="rate" id="rate" value="'.$currencies['rate'].'" />';
			}
					
					
							
			# Load Edit Categories Template
			$this->load->view('admin/edit', $currencies); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Currency By Posted Data ]--------------------#
	
	function edit_data($id)
	{				
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->update('currencies', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_discount_success'), base_url().'admin/currencies/show');
	}
	
	#--------------------[ Show Delete Currency Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('currencies', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$currencies = $query->row_array();
									
			# Load Edit Categories Template
			$this->load->view('admin/delete', $currencies); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Currency By Posted Data ]--------------------#
	
	function delete_data($id)
	{				
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->delete('currencies'); 
							
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
		$this->admin_init->Show_Success_Page($this->lang->line('delete_admin_success'),base_url().'admin/currencies/show');	
	}

	#--------------------[ Show / Search Currencies ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('currencies');
		$currencies = $query->result_array();
		$currencies_output = NULL;				
		foreach ($currencies as $item)
		{
			$currencies_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['rate'].'</td>
				<td>
				<a href="'.base_url().'admin/currencies/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/currencies/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_currencies'] = $currencies_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
		
						$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );

echo anchor_popup('admin/currencies/show', 'Click Me!', $atts);
	}	
}