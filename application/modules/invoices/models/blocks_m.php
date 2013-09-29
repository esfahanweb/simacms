<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Invoices Module
	 *  Invoices_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
 	
	#--------------------[ Show Add New Invoice Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo'
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('invoices').'</span></a>
            	<ul class="sub">
               		<li><a href="'.base_url().'admin/invoices/show'.'" title="">'.$this->lang->line('show_search_invoices').'</a></li>
                    <li><a href="'.base_url().'admin/invoices/add'.'" title="">'.$this->lang->line('add_new_invoice').'</a></li>	
                </ul>
          	</li>';
	}
	
	
}