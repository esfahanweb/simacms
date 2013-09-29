<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_groups_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Product Groups Module
	 *  Product Groups_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		
		

    }
 	
	#--------------------[ Check Exist Product Under Product Group ? ]--------------------#
	
	function check_exist_product_under_group($id)
	{
		$query = $this->db->get_where('products', array('group_id' => $id));
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	#--------------------[ Check Group Is Hidden ? ]--------------------#
	
	function group_is_hidden($id)
	{
		$query = $this->db->get_where('product_groups', array('id' => $id));
		$product_groups = $query->row_array();
		if($product_groups['hidden'] == 'yes')
		{
			return true;
		}
		if($product_groups['hidden'] == 'no')
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New Product Group Form ]--------------------#
	
	function add_form()
	{				
		$this->db->select('id');
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('admin_roles');
		$output = NULL;
		foreach ($query->result_array() as $arr)
		{
			$output .= ','.$arr['id'];
		}
		$string = $output;
		$string = reduce_multiples($string,",",TRUE);
		$admin_roles_array = explode(',', $string);
					
		$admin_roles = $query->result_array();
					
		$output = NULL;
		foreach ($admin_roles_array as $arr)
		{
						
			$output .= $this->admin_init->get_prop_from_id('admin_roles' ,$arr, 'title').' '.form_checkbox('gateways['.$arr.']', ','.$arr, FALSE).'<br />';	 
		}

		$product_groups['gateways'] = $output;
		$product_groups['type'] = form_checkbox('type', 'admin', false);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $product_groups);
	}
	
	#--------------------[ Add New Product Group By Posted Data ]--------------------#
	
	function add_data()
	{				
		$output = NULL;
		if(isset($_POST['gateways']))
		{
			$post = $_POST['gateways'];
			ksort($post);
					
			foreach ($post as $arr)
			{
				$output .= $arr;
			}
		}
		else
		{
			$output = '';
		}
		
		if(isset($_POST['type']))
		{
			$type = 'admin';
		}
		else
		{
			$type = 'user';	
		}
					
					
		$data = array(
					   'title' => $_POST['title'],
					   'descriptions' => $_POST['descriptions'],
					   'gateways' => $output,
					   'type' => $type,
					);
					
		$this->db->insert('product_groups', $data);
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_group_success'), base_url().'admin/product_groups/show');
	}
	
	#--------------------[ Show Edit Product Group Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('product_groups', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$product_groups = $query->row_array();
			$string = $product_groups['gateways'];
			$string = reduce_multiples($string,",",TRUE);
			$admin_group_gateways_array = explode(',', $string);
					
			$this->db->order_by("id", "asc"); 
			$this->db->select('id');
			$query = $this->db->get('gateways');
			$output = NULL;
			foreach ($query->result_array() as $arr)
			{
				$output .= ','.$arr['id'];
			}
			$string = $output;
			$string = reduce_multiples($string,",",TRUE);
			$admin_gatways_array = explode(',', $string);
					
			$admin_gatways = $query->result_array();
					
			$output = NULL;
			foreach ($admin_gatways_array as $arr)
			{
				if(  in_array($arr, $admin_group_gateways_array))
				{
						$output .= $this->admin_init->get_prop_from_id('gateways' ,$arr, 'title').' '.form_checkbox('gateways['.$arr.']', ','.$arr, TRUE).'<br />';	 
				}
				else
				{
						$output .= $this->admin_init->get_prop_from_id('gateways' ,$arr, 'title').' '.form_checkbox('gateways['.$arr.']', ','.$arr, FALSE).'<br />';
				}
			}
			
			$product_groups['gateways'] = $output;

			$product_groups['hidden'] = form_checkbox('type', 'yes', $this->group_is_hidden($id));
								
			# Load Edit Categories Template
			$this->load->view('admin/edit', $product_groups); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Product Group By Posted Data ]--------------------#
	
	function edit_data($id)
	{			
		$output = NULL;
		if(isset($_POST['gateways']))
		{
			$post = $_POST['gateways'];
			ksort($post);
					
			foreach ($post as $arr)
			{
				$output .= $arr;
			}
		}
		else
		{
			$output = '';
		}
					
		if(isset($_POST['hidden']))
		{
			$hidden = 'yes';
		}
		else
		{
			$hidden = 'no';	
		}
					
		$data = array(
					  'title' => $_POST['title'],
					   'hidden' => $hidden,
					   'gateways' => $output,
					);
					
		$this->db->where('id', $id);
		$this->db->update('product_groups', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_group_success'), base_url().'admin/product_groups/show');
	}
	
	
	
	#--------------------[ Show Delete Product Group Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('product_groups', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$check = $this->check_exist_product_under_group($id);
						
			if(!$check)
			{
				$button = 'class="redBtn submitForm"';
				$desc = $this->lang->line('are_you_sure').' ?!';
			}
			else
			{
				$button = 'disabled="disabled" class="submitForm"';
				$desc = $this->lang->line('deleting_group_des');
			}
							
			$product_groups = array(
				'id' => $id,
				'button' => $button,
				'desc' => $desc,
			);	
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $product_groups); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Product Group By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('product_groups'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_group_success'),base_url().'admin/product_groups/show');	
	}

	#--------------------[ Show / Search Product Groups ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('product_groups');
		$product_groups = $query->result_array();
		$product_groups_output = NULL;				
		foreach ($product_groups as $item)
		{
			$product_groups_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['hidden'].'</td>
				<td>
				<a href="'.base_url().'admin/product_groups/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/product_groups/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_product_groups'] = $product_groups_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
}