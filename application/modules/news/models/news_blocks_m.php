<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news_blocks_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Users Module
	 *  Users_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		//$this->lang->load('users_admin_block', $this->admin_init->Admin_Language);
		
    }
 	
	#--------------------[ Show Add New User Form ]--------------------#
	
	function show_admin_blocks()
	{				
		echo '
            
		
		
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('categories').'</span></a>
            <ul class="sub">
            <li><a href="'.base_url().'admin/news/categories/show'.'" title="">'.$this->lang->line('show_search_categories').'</a></li>
            <li><a href="'.base_url().'admin/news/categories/add'.'" title="">'.$this->lang->line('add_new_category').'</a></li>	
            </ul>
          	</li>
			
			<li class="tables"><a href="#" title="" class="exp"><span>'.$this->lang->line('posts').'</span></a>
            <ul class="sub">
            <li><a href="'.base_url().'admin/news/posts/show'.'" title="">'.$this->lang->line('show_search_users').'</a></li>
            <li><a href="'.base_url().'admin/news/posts/add'.'" title="">'.$this->lang->line('add_new_user').'</a></li>	
            </ul>
          	</li>

			';
	}
	
	
}