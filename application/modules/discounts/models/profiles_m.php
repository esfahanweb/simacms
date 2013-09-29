<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profiles_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Users Module
	 *  Users_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->helper('directory');
		$tmp = directory_map('./application/language/', 1);
		$this->language_options = $this->admin_init->no_id_array($tmp);
		
		$tmp = directory_map('./application/views/admin/', 1);
		$this->admin_template_options = $this->admin_init->no_id_array($tmp);
		
		$tmp = directory_map('./application/views/site/', 1);
		$this->site_template_options = $this->admin_init->no_id_array($tmp);


    }

	#--------------------[ Check User Is Active ? ]--------------------#
	
	function check_user_status($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		$users = $query->row_array();
		if($users['status'] == 'active')
		{
			return true;
		}
		if($users['status'] == 'inactive')
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New User Form ]--------------------#
	
	function add_form()
	{				
		
		
		$users['group_id'] = $this->admin_init->get_select_from_id('groups', 'title');
		$users['discount_id'] = $this->admin_init->get_select_from_id('discounts', 'title');
		$users['status'] = form_checkbox('status', 'active');
		$users['site_template'] = $this->init->Fetch_Default_Settings('tblsettings', 'site_template');
		$users['site_language'] = $this->init->Fetch_Default_Settings('tblsettings', 'site_language');
		$users['admin_template'] = $this->init->Fetch_Default_Settings('tblsettings', 'admin_template');
		$users['admin_language'] = $this->init->Fetch_Default_Settings('tblsettings', 'admin_language');

									
		# Load Edit Categories Template
		$this->load->view('admin/profiles/add', $users);
	}
	
	#--------------------[ Add New User By Posted Data ]--------------------#
	
	function create($data)
	{	

		if(isset($data['status']))
		{
			$data['status'] = 'active';
		}
		else
		{
			$data['status'] = 'inactive';	
		}
		
		
		$this->db->insert('users', $data); 
		
		
	}
	
	
	#--------------------[ Add New User By Posted Data ]--------------------#
	
	function update($id, $data)
	{	

		if(isset($data['status']))
		{
			$data['status'] = 'active';
		}
		else
		{
			$data['status'] = 'inactive';	
		}
		
		if($data['password'] == '')		
		{
			unset($data['password']);								
		}
		else
		{
			$this->load->library('encrypt');
			$data['password'] = $this->encrypt->sha1( $data['password'] );
		}


		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		
		
	}
	
	#--------------------[ Show User Summary ]--------------------#

	function summary_form($id)
	{				
		$query = $this->db->get_where('users', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$users = $query->row_array();
			
			if(!$this->admin_init->group_is_admin($users['group_id']))
			{
				unset($users['admin_language']);
				unset($users['admin_template']);
			}
			
			$users['group'] = $this->admin_init->get_prop_from_id('groups', $users['group_id'], 'title');
			$users['discount'] = $this->admin_init->get_prop_from_id('discounts', $users['discount_id'], 'title');
			$users['status'] = $this->check_user_status($id);
			$users['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(3));	
							
			# Load Admin Edit Template
			$this->load->view('admin/summary', $users); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update User By Posted Data ]--------------------#
	
	function summary_data($id)
	{			
		$data = $_POST;
		


		$this->db->where('id', $id);
		$this->db->update('users', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_user_success'), base_url().'admin/users/show');
	}
	
	#--------------------[ Show Edit User Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('users', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$users = $query->row_array();
			$users['site_language'] = form_dropdown('site_language', $this->language_options, $users['site_language'] );
			$users['site_template'] = form_dropdown('site_template', $this->site_template_options, $users['site_template'] );
			
			if($this->admin_init->group_is_admin($users['group_id']))
			{
				$users['admin_language'] = form_dropdown('admin_language', $this->language_options, $users['admin_language'] );
				$users['admin_template'] = form_dropdown('admin_template',$this->admin_template_options, $users['admin_template'] );
			}
			else
			{
				unset($users['admin_language']);
				unset($users['admin_template']);
			}
			
			$users['group_id'] = $this->admin_init->get_select_from_id('groups', 'title', $users['group_id']);
			$users['discount_id'] = $this->admin_init->get_select_from_id('discounts', 'title', $users['discount_id']);
			$users['status'] = form_checkbox('status', 'active', $this->check_user_status($id));
			$users['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(4));	
							
			# Load Admin Edit Template
			$this->load->view('admin/profiles/edit', $users); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update User By Posted Data ]--------------------#
	
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
		$this->db->update('users', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_user_success'), base_url().'admin/users/show');
	}
	
	
	
	#--------------------[ Show Delete User Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('users', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$check = $this->check_exist_product_under_user($id);
						
			if(!$check)
			{
				$button = 'class="redBtn submitForm"';
				$desc = $this->lang->line('are_you_sure').' ?!';
			}
			else
			{
				$button = 'disabled="disabled" class="submitForm"';
				$desc = $this->lang->line('deleting_user_des');
			}
							
			$users = array(
				'id' => $id,
				'button' => $button,
				'desc' => $desc,
			);	
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $users); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete User By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('users'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_user_success'),base_url().'admin/users/show');	
	}

	#--------------------[ Show / Search Users ]--------------------#
	
	function show_search($group_id='')
	{
		if($group_id == '')
		{
			$query = $this->db->get('users');
			$users = $query->result_array();
		}
		else
		{
			$query = $this->db->get_where('users', array('group_id' => $group_id));
			$users = $query->result_array();
		}
		
		$users_output = NULL;				
		foreach ($users as $item)
		{
			$users_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['firstname'].' '.$item['lastname'].'</td>
				<td>'.$item['email'].'</td>
				<td>'.$this->admin_init->get_prop_from_id('groups',$item['group_id'], 'title').'</td>
				<td>'.$item['status'].'</td>
				<td>
				<a href="'.base_url().'admin/users/profiles/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/users/profiles/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		return $users_output;
				
		
	}	
	
	#--------------------[ Show / Search User Invices ]--------------------#
	
	function invoices($id)
	{
		$this->load->model('invoices/invoices_m', 'invoices');
		$query = $this->db->get_where('invoices', array('user_id' => $id));
		$invoices = $query->result_array();
		$invoices_output = NULL;				
		foreach ($invoices as $item)
		{
			$invoices_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['date'].'</td>
				<td>'.$item['duedate'].'</td>
				<td>'.$item['total'].'</td>
				<td>'.$item['gateway'].'</td>
				<td>'.$this->invoices->status($item['status']).'</td>
				<td>
				<a href="'.base_url().'admin/invoices/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/invoices/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}	
			
		$users['show_invoices'] = $invoices_output;
		$users['tabs'] = $this->tabs->tab_menu($id, $this->uri->segment(3));		
		# Load SHOW USERS Template
		$this->load->view('admin/invoices', $users);
	}	
}