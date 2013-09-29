<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Products Module
	 *  Products_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Product Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('products').'</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/products/show'.'" title="">'.$this->lang->line('show_search_products').'</a></li>
                    <li><a href="'.base_url().'admin/products/add'.'" title="">'.$this->lang->line('add_new_product').'</a></li>	
                </ul>
          	</li>';
	}
	
	
}