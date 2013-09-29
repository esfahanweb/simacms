<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

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
 	
	#--------------------[ Show Add New Group Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('groups').'</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/groups/show'.'" title="">'.$this->lang->line('show_search_groups').'</a></li>
                    <li><a href="'.base_url().'admin/groups/add'.'" title="">'.$this->lang->line('add_new_group').'</a></li>	
                </ul>
          	</li>';
	}
	
	
}