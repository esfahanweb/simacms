<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class admin_forms extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
 	
 
	function Form_Select($id, $table)
	{
		$data = '';
		$query = $this->db->get($table);
		foreach ($query->result() as $row)
		{
			
			
			if($row->id == $id)
			{
				 $data .= '<option selected="selected" value="'.$row->id.'">'.$row->name.'</option>';
				
			}
			else
			{
				$data .= '<option value="'.$row->id.'">'.$row->name.'</option>';
			}
 
		}
		
		return $data;
	}
	
	
	function Title_Of_Role_From_ID($id)
	{
		$query = $this->db->get_where('tbladminroles', array('id'=>$id));
		$row = $query->row();
		return $row->name;
	}
	
	
	function Check_Is_Set($post)
	{
		if (isset($_POST["$post"]))
		{
			$out = 1;
		}
		else
		{
			$out = 0;
		}
			
		return $out;
	}	
	
	
	



}