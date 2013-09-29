<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Groups Module
	 *  Groups_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		
		

    }
 	
	#--------------------[ Check Exist User Under Group ? ]--------------------#
	
	function check_exist_user_under_group($id)
	{
		$query = $this->db->get_where('users', array('group_id' => $id));
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New Group Form ]--------------------#
	
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
						
			$output .= $this->admin_init->get_prop_from_id('admin_roles' ,$arr, 'title').' '.form_checkbox('perms['.$arr.']', ','.$arr, FALSE).'<br />';	 
		}

		$groups['perms'] = $output;
		$groups['type'] = form_checkbox('type', 'admin', false);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $groups);
	}
	
	#--------------------[ Add New Group By Posted Data ]--------------------#
	
	function add_data()
	{				
		$output = NULL;
		if(isset($_POST['perms']))
		{
			$post = $_POST['perms'];
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
					   'perms' => $output,
					   'type' => $type,
					);
					
		$this->db->insert('groups', $data);
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_group_success'), base_url().'admin/groups/show');
	}
	
	#--------------------[ Show Edit Group Form ]--------------------#

	function edit_form($id)
	{				
		$query = $this->db->get_where('groups', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$groups = $query->row_array();
			$string = $groups['perms'];
			$string = reduce_multiples($string,",",TRUE);
			$admin_perms_array = explode(',', $string);
					
			$this->db->order_by("id", "asc"); 
			$this->db->select('id');
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
				if(  in_array($arr, $admin_perms_array))
				{
						$output .= $this->admin_init->get_prop_from_id('admin_roles' ,$arr, 'title').' '.form_checkbox('perms['.$arr.']', ','.$arr, TRUE).'<br />';	 
				}
				else
				{
						$output .= $this->admin_init->get_prop_from_id('admin_roles' ,$arr, 'title').' '.form_checkbox('perms['.$arr.']', ','.$arr, FALSE).'<br />';
				}
			}
			
			$groups['perms'] = $output;

			$groups['type'] = form_checkbox('type', 'admin', $this->admin_init->group_is_admin($id));
								
			# Load Edit Categories Template
			$this->load->view('admin/edit', $groups); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Group By Posted Data ]--------------------#
	
	function edit_data($id)
	{			
		$output = NULL;
		if(isset($_POST['perms']))
		{
			$post = $_POST['perms'];
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
					   'type' => $type,
					   'perms' => $output,
					);
					
		$this->db->where('id', $id);
		$this->db->update('groups', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_group_success'), base_url().'admin/groups/show');
	}
	
	
	
	#--------------------[ Show Delete Group Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('groups', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$check = $this->check_exist_user_under_group($id);
						
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
							
			$groups = array(
				'id' => $id,
				'button' => $button,
				'desc' => $desc,
			);	
						
			# Load Admin Delete Template
			$this->load->view('admin/delete', $groups); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Group By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('groups'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_group_success'),base_url().'admin/groups/show');	
	}

	#--------------------[ Show / Search Groups ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('groups');
		$groups = $query->result_array();
		$groups_output = NULL;				
		foreach ($groups as $item)
		{
			$groups_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['type'].'</td>
				<td>
				<a href="'.base_url().'admin/groups/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/groups/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		$data['show_groups'] = $groups_output;
				
		# Load SHOW USERS Template
		$this->load->view('admin/show', $data);
	}	
}