<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Products Module
	 *  Products_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		//$this->output->enable_profiler(TRUE);
		//$this->type_options = $this->config->item('type_options');

    }
 	
	#--------------------[ Check Exist Product Under Product ? ]--------------------#
	
	function check_exist_product_under_product($id)
	{
		$query = $this->db->get_where('products', array('product_id' => $id));
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	#--------------------[ Check Product Is Hidden ? ]--------------------#
	
	function product_is_hidden($id)
	{
		$query = $this->db->get_where('products', array('id' => $id));
		$products = $query->row_array();
		if($products['hidden'] == 'yes')
		{
			return true;
		}
		if($products['hidden'] == 'no')
		{
			return false;
		}
	}
	
	#--------------------[ Check Product Is Stock ? ]--------------------#
	
	function product_is_stock($id)
	{
		$query = $this->db->get_where('products', array('id' => $id));
		$products = $query->row_array();
		if($products['stockcontrol'] == 'yes')
		{
			return true;
		}
		if($products['stockcontrol'] == 'no')
		{
			return false;
		}
	}
	
	#--------------------[ Check Product Is Domain Options ? ]--------------------#
	
	function product_is_domain_options($id)
	{
		$query = $this->db->get_where('products', array('id' => $id));
		$products = $query->row_array();
		if($products['showdomainoptions'] == 'yes')
		{
			return true;
		}
		if($products['showdomainoptions'] == 'no')
		{
			return false;
		}
	}
	
	

	
	#--------------------[ Show Add New Product Form ]--------------------#
	
	function add_form()
	{				
		$products['type'] = form_dropdown('type', $this->type_options);
		$products['status'] = form_checkbox('status', 'active');
		$products['secure'] = form_checkbox('secure', 'yes');
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $products);
	}
	
	#--------------------[ Add New Product By Posted Data ]--------------------#
	
	function add_data()
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
		
		if(isset($_POST['secure']))
		{
			$data['secure'] = 'yes';
		}
		else
		{
			$data['secure'] = 'no';	
		}
		
		$this->db->insert('products', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_product_success'), base_url().'admin/products/show');
	}
	
	#--------------------[ Show Edit Product Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('products', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$products = $query->row_array();
			//$products['hidden'] = form_dropdown('type', $this->type_options, $products['hidden'] );
			$products['group_id'] = $this->admin_init->get_select_from_id('product_groups', $products['group_id']);
			$products['welcome_email_id'] = $this->admin_init->get_select_from_id('email_templates', $products['welcome_email_id']);
			
			
			
			$server_type = $this->admin_init->get_prop_from_id('servers', $products['server_id'], 'type');

			$this->load->model('servers/modules/'.$server_type , $server_type); 
			//print_r($this->$server_type->configoptions());
			
			$server_type_options = $this->$server_type->configoptions();
			$output = NULL;

			
			
			$i=1;
			
			foreach($server_type_options as $key => $values)
			{
			
				$values['name'] = "configoption$i";
				$values['value'] = $products["configoption$i"];
				
				if (isset($values['Description']))
				{
					$Description = $values['Description'];
				}
				else
				{
					$Description = '';
				}
				
			
				
				switch($values['Type'])
				{
					case 'text':
					
						//$output .= $key.form_input($values);
						$output .=  '<!------------------------------------------------------->
									<div class="rowElem">
									<label>'.$key.' :</label>
									<div class="formRight">'.
									form_input($values).$Description
									.'</div>
									<div class="fix"></div>
									</div>
									<!------------------------------------------------------->';
					break;
					
					case 'dropdown':
						$Options = explode(',', $values['Options']);
						$Options = $this->admin_init->no_id_array($Options);
						//$output .= $key.form_dropdown($values['name'], $Options, $values['value']);
						$output .=  '<!------------------------------------------------------->
									<div class="rowElem">
									<label>'.$key.' :</label>
									<div class="formRight">'.
									form_dropdown($values['name'], $Options, $values['value'])
									.'</div>
									<div class="fix"></div>
									</div>
									<!------------------------------------------------------->';
					break;
				}
				
			
				

				$i++;
			}

			
	
			
			$products['server_type_options'] = $output;
			
			
			$products['server_id'] = $this->admin_init->get_select_from_id('servers', $products['server_id']);
			
			$products['showdomainoptions'] = form_checkbox('showdomainoptions', 'yes', $this->product_is_domain_options($id));
			$products['hidden'] = form_checkbox('hidden', 'yes', $this->product_is_hidden($id));
			$products['stockcontrol'] = form_checkbox('stockcontrol', 'yes', $this->product_is_stock($id));
			
			
			$this->load->model('prices/prices_m','prices');
			$products['prices'] = $this->prices->prices_form('products', $id);					
			# Load Edit Categories Template
			$this->load->view('admin/edit', $products); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Product By Posted Data ]--------------------#
	
	function edit_data($id)
	{			
		$data = $_POST;
	/*	if(isset($_POST['status']))
		{
			$data['status'] = 'active';
		}
		else
		{
			$data['status'] = 'inactive';	
		}
		
		if(isset($_POST['secure']))
		{
			$data['secure'] = 'yes';
		}
		else
		{
			$data['secure'] = 'no';	
		}
		
		
		*/
		
		if(isset($_POST['form_submit'])) // if form sent by save button
		{
			unset($data['form_submit']);
			unset($data['update']);
			$this->db->where('id', $id);
			$this->db->update('products', $data); 
			
			$this->load->model('prices/prices_m','prices');
			$this->prices->prices_data($id);
			
			
		
			# Show Success Page
			$this->admin_init->Show_Success_Page($this->lang->line('edit_product_success'), base_url().'admin/products/edit/'.$id);
		}
		else
		{
		
			$data = array(
				'server_id' => $_POST['server_id'],
			);
			$this->db->where('id', $id);
			$this->db->update('products', $data);
			
			# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_product_success'), base_url().'admin/products/edit/'.$id.'/#module');
		

		}

		
		
		
	}
	
	
	
	#--------------------[ Show Delete Product Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('products', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$check = $this->check_exist_product_under_product($id);
						
			if(!$check)
			{
				$button = 'class="redBtn submitForm"';
				$desc = $this->lang->line('are_you_sure').' ?!';
			}
			else
			{
				$button = 'disabled="disabled" class="submitForm"';
				$desc = $this->lang->line('deleting_product_des');
			}
							
			$products = array(
				'id' => $id,
				'button' => $button,
				'desc' => $desc,
			);	
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $products); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Product By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('products'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_product_success'),base_url().'admin/products/show');	
	}

	#--------------------[ Show / Search Products ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('products');
		$products = $query->result_array();
		$products_output = NULL;				
		foreach ($products as $item)
		{
			$products_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['paytype'].'</td>
				<td>'.$this->admin_init->get_prop_from_id('servers', $item['server_id'], 'type').'</td>
				<td>
				<a href="'.base_url().'admin/products/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/products/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_products'] = $products_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
}