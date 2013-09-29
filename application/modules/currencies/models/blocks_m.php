<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Currencies Module
	 *  Discounts_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Currency Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>گروه های تخفیف</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/currencies/show'.'" title="">show_search_currencies</a></li>
                    <li><a href="'.base_url().'admin/currencies/add'.'" title="">add_new_currencies</a></li>	
                </ul>
          	</li>';
	}
	
	
}