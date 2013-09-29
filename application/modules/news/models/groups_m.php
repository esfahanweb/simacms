<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  groups Module
	 *  groups_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();


    }

	#--------------------[ Check group Is Active ? ]--------------------#
	
	function check_group_status($id)
	{
		$query = $this->db->get_where('groups', array('id' => $id));
		$groups = $query->row_array();
		if($groups['status'] == 'active')
		{
			return true;
		}
		if($groups['status'] == 'inactive')
		{
			return false;
		}
	}
	
	#--------------------[ Show Add New group Form ]--------------------#
	
	function add_form()
	{				
		
		
		$groups['group_id'] = $this->admin_init->get_select_from_id('groups', 'title');
		$groups['discount_id'] = $this->admin_init->get_select_from_id('discounts', 'title');
		$groups['status'] = form_checkbox('status', 'active');
		$groups['site_template'] = $this->init->Fetch_Default_Settings('tblsettings', 'site_template');
		$groups['site_language'] = $this->init->Fetch_Default_Settings('tblsettings', 'site_language');
		$groups['admin_template'] = $this->init->Fetch_Default_Settings('tblsettings', 'admin_template');
		$groups['admin_language'] = $this->init->Fetch_Default_Settings('tblsettings', 'admin_language');

									
		# Load Edit Categories Template
		$this->load->view('admin/profiles/add', $groups);
	}
	
	#--------------------[ Add New group By Posted Data ]--------------------#
	
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
		
		
		$this->db->insert('groups', $data); 
		
		
	}
	
	
	
	

	
	#--------------------[ Show Edit group Form ]--------------------#

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
			$query = $this->db->get('roles');
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
						$output .= $this->admin_init->get_prop_from_id('roles' ,$arr, 'title').' '.form_checkbox('perms['.$arr.']', ','.$arr, TRUE).'<br />';	 
				}
				else
				{
						$output .= $this->admin_init->get_prop_from_id('roles' ,$arr, 'title').' '.form_checkbox('perms['.$arr.']', ','.$arr, FALSE).'<br />';
				}
			}
			
			$groups['perms'] = $output;

			$groups['type'] = form_checkbox('type', 'admin', $this->admin_init->group_is_admin($id));
								
			# Load Edit Categories Template
			$this->load->view('admin/groups/edit', $groups); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update group By Posted Data ]--------------------#
	
	function update($id, $data)
	{			
		$output = NULL;
		if(isset($data['perms']))
		{
			$post = $data['perms'];
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
					
		if(isset($data['type']))
		{
			$type = 'admin';
		}
		else
		{
			$type = 'user';	
		}
					
		$data = array(
					  'title' => $data['title'],
					   'descriptions' => $data['descriptions'],
					   'type' => $type,
					   'perms' => $output,
					);
					
		$this->db->where('id', $id);
		$this->db->update('groups', $data); 

	}
	
	
	
	#--------------------[ Show Delete group Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('groups', array('id' => $id));
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
	
	#--------------------[ Delete group By Posted Data ]--------------------#
	
	function delete_data($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('groups'); 

		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_group_success'),base_url().'admin/groups/show');	
	}

	#--------------------[ Show / Search groups ]--------------------#
	
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
				<a href="'.base_url().'admin/users/groups/edit/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/pencil.png" /></a>
				<a href="'.base_url().'admin/users/groups/delete/'.$item['id'].'" class="mr10"><img src="'.$this->admin_init->TMPL.'/images/icons/dark/close.png" /></a>
				</td>
				</tr>';
		}		
		return $groups_output;
				
		
	}	
	
	
}