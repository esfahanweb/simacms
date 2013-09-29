<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class admin_main extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
// Calculate Users 	
	function Table_Num_Rows($table, $var='')
	{	
		if($var == 'Active')
				$query = $this->db->get_where($table, array('status' => 'Active'));
		if($var == 'InActive')
				$query = $this->db->get_where($table, array('status' => 'Inactive'));
		if($var == '')
				$query = $this->db->get_where($table);
		
		return $query->num_rows();
	}
	
	function Number_Of_All_users()
	{
		$query = $this->db->get_where('users');
		return $query->num_rows();
	}
	
	function Number_Of_Active_users()
	{
		$query = $this->db->get_where('users', array('status' => 'Active'));
		return $query->num_rows();
	}
	
	function Number_Of_InActive_users()
	{
		$query = $this->db->get_where('users', array('status' => 'Inactive'));
		return $query->num_rows();
	}


// Calculate Posts 	
 
	function Number_Of_All_Posts()
	{
		$query = $this->db->get_where('tblposts');
		return $query->num_rows();
	}
	
	function Number_Of_Active_Posts()
	{
		$query = $this->db->get_where('tblposts', array('status' => 'Published'));
		return $query->num_rows();
	}
	
	function Number_Of_InActive_Posts()
	{
		$query = $this->db->get_where('tblposts', array('status' => 'UnPublished'));
		return $query->num_rows();
	}

// Calculate Admins 	
 
	function Number_Of_All_Admins()
	{
		$query = $this->db->get_where('users');
		return $query->num_rows();
	}
	
	function Number_Of_Active_Admins()
	{
		$query = $this->db->get_where('users', array('status' => 'Active'));
		return $query->num_rows();
	}
	
	function Number_Of_InActive_Admins()
	{
		$query = $this->db->get_where('users', array('status' => 'InActive'));
		return $query->num_rows();
	}

	
}