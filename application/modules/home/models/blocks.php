<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class blocks extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
 	
 	function Category_Menu($id=0)
	{
		if($id==0)
		{
			$query = $this->db->get('categories');
		}
		else
		{
			$query = $this->db->get_where('categories', array('id'=>$id));
		}
		
		foreach ($query->result() as $row)
		{
			echo '<li><a href="'.base_url().'categories/'.$row->id.'/'.$row->seo_url.'" title="'.$row->name.'">'.$row->name.'</a></li> ';
		}
	}
	
	
	
	
	



}