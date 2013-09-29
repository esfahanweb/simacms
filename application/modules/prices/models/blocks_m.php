<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Prices Module
	 *  Prices_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Price Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>گروه های تخفیف</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/prices/show'.'" title="">show_search_prices</a></li>
                    <li><a href="'.base_url().'admin/prices/add'.'" title="">add_new_prices</a></li>	
                </ul>
          	</li>';
	}
	
	
}