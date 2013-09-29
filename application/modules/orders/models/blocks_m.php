<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Orders Module
	 *  Orders_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Order Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('orders').'</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/orders/show'.'" title="">'.$this->lang->line('show_search_orders').'</a></li>
                    <li><a href="'.base_url().'admin/orders/add'.'" title="">'.$this->lang->line('add_new_order').'</a></li>	
                </ul>
          	</li>';
	}
	
	
}