<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Discounts Module
	 *  Discounts_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Discount Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>گروه های تخفیف</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/discounts/show'.'" title="">show_search_discounts</a></li>
                    <li><a href="'.base_url().'admin/discounts/add'.'" title="">add_new_discounts</a></li>	
                </ul>
          	</li>';
	}
	
	
}