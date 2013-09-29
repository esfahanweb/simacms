<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modules_m extends CI_Model {

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
		
		
		
		
		


		
    }
 	
	function install($name)
	{
		$data['name'] = $name;
		$data['status'] = 'active';
		$this->db->insert('modules', $data); 
		
		$this->config->load('discounts/setup');
		$sql = $this->config->item('install_query');
		$this->db->query($sql);
		
		# Show Success Page
		$this->admin_init->Show_Success_Page('install success', base_url().'admin/modules/summary/'.$name);
	}
	
	function uninstall($name)
	{

		$this->db->where('name', $name);
		$this->db->delete('modules'); 
		
		$this->config->load('discounts/setup');
		$sql = $this->config->item('uninstall_query');
		$this->db->query($sql);
		
		# Show Success Page
		$this->admin_init->Show_Success_Page('uninstall success', base_url().'admin/modules/summary/'.$name);
	}
	
	function activate($name)
	{
		$data['status'] = 'active';
		$this->db->where('name', $name);
		$this->db->update('modules', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('activate success', base_url().'admin/modules/summary/'.$name);
	}
	
	function deactivate($name)
	{
		$data['status'] = 'deactive';
		$this->db->where('name', $name);
		$this->db->update('modules', $data); 
		# Show Success Page
		$this->admin_init->Show_Success_Page('deactivate success', base_url().'admin/modules/summary/'.$name);
	}
	
	#--------------------[ Button ]--------------------#
	
	function button($button, $style)
	{
		$hidden = array('action' => $button);
		echo form_open(base_url().'admin/modules/summary/'.$this->Module_Name, '', $hidden);
		echo form_submit($style,$button, $button);
		echo form_close();
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
	
	function summary($name)
	{				
		//$query = $this->db->get_where('discounts', array('id' => $id));
		//if($query->num_rows() > 0)
		//{
			//$modules = $query->row_array();
			$this->load->helper('directory');
			$modules =  directory_map('./application/modules/', 1);
			if(in_array($name, $modules))
			{
			
				$modules['name'] = $name;
				//$modules['status'] = $this->check_status($name);
				$this->Module_Name = $name;					
				# Load Edit Categories Template
				$this->load->view('summary', $modules); 	
			}
			else
			{
				# Show Error
				$this->admin_init->Show_Access_Is_Denied();
			}
		//}
		//else
		//{
			# Show Error
			//$this->admin_init->Show_Access_Is_Denied();
		//}
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
		//$query = $this->db->get('discounts');
		//$discounts = $query->result_array();
		$this->load->helper('directory');
		$modules =  directory_map('./application/modules/', 1);
		//print_r($modules);
		
		$modules_output = NULL;				
		foreach ($modules as $item)
		{
			$modules_output .= 
				'<tr>
				<td>'.$item.'</td>
				<td>'.$item.'</td>
				<td>
				<a href="'.base_url().'admin/modules/summary/'.$item.'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/modules/delete/'.$item.'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		
		
		$data['show_modules'] = $modules_output;
				
		# Load SHOW USERS Template
		$this->load->view('show', $data);
	}
	
	
	
	function show_buttons($name, $style)
	{		
		$query = $this->db->get_where('modules', array('name' => $name));
		if($query->num_rows() > 0)
		{
			$modules = $query->row_array();		
			switch($modules['status'])
			{
				case 'active':
					$this->button('deactivate' ,$style);
					break;
				
				case 'deactive':
					$this->button('activate' ,$style);
					break;
			}
			
			$this->button('uninstall', $style);

		}
		else
		{
			// not installed yet
			$this->button('install', $style);
		}
		
		
	}	
}