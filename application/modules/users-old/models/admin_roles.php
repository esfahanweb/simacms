<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class admin_roles extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
 	
 	function Check_Exist_user_Under_Role($id)
	{
		$query = $this->db->get_where('users', array('group_id'=>$id));
		
		if ($query->num_rows() > 0)
		{
		   return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#-----------------------------------------
	function User_Perms_Check_Box($id=0, $permission)
	{
	
		if($id==0)
		{
			return '<input type="checkbox" id="'.$permission.'" name="'.$permission.'" />';
		}
		else
		{
			$query = $this->db->get_where('groups', array('id'=>$id));
			
			foreach ($query->result() as $row)
			{
				if($row->$permission == 1)
				{
					 return '<input type="checkbox" id="'.$permission.'" name="'.$permission.'" checked="checked" />';
				}
				if($row->$permission == 0)
				{
					 return '<input type="checkbox" id="'.$permission.'" name="'.$permission.'" />';			
				}
			}
		}
	}
	
	
	
	



}