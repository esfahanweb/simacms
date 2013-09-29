<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prices_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Prices Module
	 *  Prices_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		# Load Required Config Items
		//$this->type_options = $this->config->item('type_options');
		
		//$this->output->enable_profiler(TRUE);
    }
 	
	#--------------------[ Show Add New Price Form ]--------------------#
	
	function add_form()
	{				
		$prices['type'] = form_dropdown('type', $this->type_options);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $prices);
	}
	
	#--------------------[ Add New Price By Posted Data ]--------------------#
	
	function add_data()
	{				
		$data = $_POST;
		$this->db->insert('prices', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_price_success'), base_url().'admin/prices/show');
	}
	
	#--------------------[ Show Edit Price Form ]--------------------#
	
	function prices_form($type, $relid)
	{				
		$query = $this->db->get_where('prices', array('type' => $type, 'relid' => $relid));
		if($query->num_rows() > 0)
		{
			$prices = $query->result_array();
		
				
			$prices['prices'] = $prices;
			$prices['relid'] = $relid;
			
					
			# Load Edit Categories Template
			//$this->load->view('admin/prices', $prices); 	
			
			return $prices;
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Price By Posted Data ]--------------------#
	
	function prices_data($relid)
	{	

		
		if(isset($_POST['update']))
		{ 
						
			foreach($_POST['update'] as $id => $vars)
			{
	
				$prices_id = $id;
				$prices_update = $vars;
					
							
							
				$this->db->where('id', $prices_id);
				$this->db->update('prices', $prices_update); 
			}
		}
		
		# Show Success Page
		//$this->admin_init->Show_Success_Page($this->lang->line('edit_price_success'), base_url().'admin/prices/products/'.$relid);
	}
	
	#--------------------[ Show Delete Price Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('prices', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$prices = $query->row_array();
									
			# Load Edit Categories Template
			$this->load->view('admin/delete', $prices); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Price By Posted Data ]--------------------#
	
	function delete_data($id)
	{				
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->delete('prices'); 
							
		$data = array(
			 'price_id' => '0',
		);
		$this->db->where('price_id', $id);
		$query = $this->db->get('users');
		foreach ($query->result() as $row)
		{
			$this->db->update('users', $data); 
		}
	
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_admin_success'),base_url().'admin/prices/show');	
	}

	#--------------------[ Show / Search Prices ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('prices');
		$prices = $query->result_array();
		$prices_output = NULL;				
		foreach ($prices as $item)
		{
			$prices_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['type'].'</td>
				<td>'.'<input style="direction:ltr" type="text" class="validate[required]" name="rate" id="rate" value="'.$item['currency'].'" />'.'</td>
				<td>'.$item['relid'].'</td>
				<td>
				<a href="'.base_url().'admin/prices/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/prices/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_prices'] = $prices_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
}