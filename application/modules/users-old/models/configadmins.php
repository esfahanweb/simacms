<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class configadmins extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->helper('directory');
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
	
	
	
	function Form_Select_Folder($dir)
	{
		$data = '';
		$Folder_Name = directory_map($dir, 1);
		
		foreach ($Folder_Name as $var)
		{
        	$data.= '<option value="'.$var.'">'.$var.'</option>';   
		}
		
		
		return $data;
	}
	
	
	
	
	
	



}