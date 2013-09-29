<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servers_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Servers Module
	 *  Servers_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->helper('directory');
		$types = directory_map('./application/modules/servers/models/modules/', 1);
		
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
 	
	#--------------------[ Check Exist Product Under Server ? ]--------------------#
	
	function check_exist_product_under_server($id)
	{
		$query = $this->db->get_where('products', array('server_id' => $id));
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	#--------------------[ Check Server Is Secure ? ]--------------------#
	
	function check_server_secure($id)
	{
		$query = $this->db->get_where('servers', array('id' => $id));
		$servers = $query->row_array();
		if($servers['secure'] == 'yes')
		{
			return true;
		}
		if($servers['secure'] == 'no')
		{
			return false;
		}
	}
	
	#--------------------[ Check Server Is Active ? ]--------------------#
	
	function check_server_status($id)
	{
		$query = $this->db->get_where('servers', array('id' => $id));
		$servers = $query->row_array();
		if($servers['status'] == 'active')
		{
			return true;
		}
		if($servers['status'] == 'inactive')
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New Server Form ]--------------------#
	
	function add_form()
	{				
		$servers['type'] = form_dropdown('type', $this->type_options);
		$servers['status'] = form_checkbox('status', 'active');
		$servers['secure'] = form_checkbox('secure', 'yes');
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $servers);
	}
	
	#--------------------[ Add New Server By Posted Data ]--------------------#
	
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
		
		$this->db->insert('servers', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_server_success'), base_url().'admin/servers/show');
	}
	
	#--------------------[ Show Edit Server Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('servers', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$servers = $query->row_array();
			$servers['type'] = form_dropdown('type', $this->type_options, $servers['type'] );
			
			$servers['status'] = form_checkbox('status', 'active', $this->check_server_status($id));
			$servers['secure'] = form_checkbox('secure', 'yes', $this->check_server_secure($id));
								
			# Load Edit Categories Template
			$this->load->view('admin/edit', $servers); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Server By Posted Data ]--------------------#
	
	function edit_data($id)
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
		
		
		if($_POST['password'] == '')		
		{
			unset($data['password']);								
		}
		else
		{
			$this->load->library('encrypt');
			$data['password'] = $this->encrypt->sha1( $_POST['password'] );
		}


		$this->db->where('id', $id);
		$this->db->update('servers', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_server_success'), base_url().'admin/servers/show');
	}
	
	
	
	#--------------------[ Show Delete Server Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('servers', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$check = $this->check_exist_product_under_server($id);
						
			if(!$check)
			{
				$button = 'class="redBtn submitForm"';
				$desc = $this->lang->line('are_you_sure').' ?!';
			}
			else
			{
				$button = 'disabled="disabled" class="submitForm"';
				$desc = $this->lang->line('deleting_server_des');
			}
							
			$servers = array(
				'id' => $id,
				'button' => $button,
				'desc' => $desc,
			);	
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $servers); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Server By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('servers'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_server_success'),base_url().'admin/servers/show');	
	}

	#--------------------[ Show / Search Servers ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('servers');
		$servers = $query->result_array();
		$servers_output = NULL;				
		foreach ($servers as $item)
		{
			$servers_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['type'].'</td>
				<td>
				<a href="'.base_url().'admin/servers/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/servers/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_servers'] = $servers_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
}