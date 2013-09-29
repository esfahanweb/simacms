<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Gateways Module
	 *  Gateways_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Gateway Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('gateways').'</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/gateways/show'.'" title="">'.$this->lang->line('show_search_gateways').'</a></li>
                    <li><a href="'.base_url().'admin/gateways/add'.'" title="">'.$this->lang->line('add_new_gateway').'</a></li>	
                </ul>
          	</li>';
	}
	
	
}