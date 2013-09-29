<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Servers Module
	 *  Servers_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Server Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('servers').'</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/servers/show'.'" title="">'.$this->lang->line('show_search_servers').'</a></li>
                    <li><a href="'.base_url().'admin/servers/add'.'" title="">'.$this->lang->line('add_new_server').'</a></li>	
                </ul>
          	</li>';
	}
	
	
}