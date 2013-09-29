<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gateways_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Gateways Module
	 *  Gateways_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->helper('directory');
		$types = directory_map('./application/modules/gateways/libraries/', 1);
		
		$i = 0;
		foreach($types as $item)
		{
			if(strpos($item, '.php'))
			{
				$item = str_replace(".php", "", $item);
				unset($types[$i]);
				$types[$item] = $item;
			}
			else
			{
				unset($types[$i]);
			}
			$i++;
		}
					
		$this->type_options = $types;
		

    }
 	
	#--------------------[ Check Exist Product Under Gateway ? ]--------------------#
	
	function check_exist_product_under_gateway($id)
	{
		$query = $this->db->get_where('products', array('gateway_id' => $id));
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New Gateway Form ]--------------------#
	
	function add_form()
	{				
		$gateways['type'] = form_dropdown('type', $this->type_options);
							
		# Load Edit Categories Template
		$this->load->view('admin/add', $gateways);
	}
	
	#--------------------[ Add New Gateway By Posted Data ]--------------------#
	
	function add_data()
	{				
		$data = $_POST;
		$this->db->insert('gateways', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_gateway_success'), base_url().'admin/gateways/show');
	}
	
	#--------------------[ Show Edit Gateway Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('gateways', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$gateways = $query->row_array();
			$gateways['type'] = form_dropdown('type', $this->type_options, $gateways['type'] );
					
			# Load Edit Categories Template
			$this->load->view('admin/edit', $gateways); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Gateway By Posted Data ]--------------------#
	
	function edit_data($id)
	{			
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->update('gateways', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_gateway_success'), base_url().'admin/gateways/show');
	}
	
	
	
	#--------------------[ Show Delete Gateway Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('gateways', array('id' => $id));
		if($query->num_rows() > 0)
		{	
			$gateways = $query->row_array();
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $gateways); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Gateway By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('gateways'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_gateway_success'),base_url().'admin/gateways/show');	
	}

	#--------------------[ Show / Search Gateways ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('gateways');
		$gateways = $query->result_array();
		$gateways_output = NULL;				
		foreach ($gateways as $item)
		{
			$gateways_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['type'].'</td>
				<td>
				<a href="'.base_url().'admin/gateways/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/gateways/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_gateways'] = $gateways_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
}