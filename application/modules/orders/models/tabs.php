<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class tabs extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->helper('directory');
    }
 
 	
 
	function tab_menu($id, $active)
	{
		$array = array(
			
			'0' => array('title' => 'summary' , 'lang' => 'Summary'),
			'1' => array('title' => 'edit' , 'lang' => 'Edit'),
			'2' => array('title' => 'invoices' , 'lang' => 'Invoices'),
			'3' => array('title' => 'services' , 'lang' => 'Services'),
		
		);
		
		$output = NULL;
		foreach($array as $row)
		{
			if($row['title'] == $active)
			{
				$output .= '<li style="background-color: #fafafa;"><a href="'.base_url().'admin/orders/'.$row['title'].'/'.$id.'">'.$row['lang'].'</a></li>';
			}
			else
			{
				$output .= '<li ><a href="'.base_url().'admin/orders/'.$row['title'].'/'.$id.'">'.$row['lang'].'</a></li>';
			}
		}
		return $output;
	}
	
	
	
	
	



}