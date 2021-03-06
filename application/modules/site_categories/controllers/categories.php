<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	/**
	 * Home module controller.
	 */
	
	 
	 
	public function index($id=0,$seo_url='')
	{
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('home/blocks');
		
		# Load Post Language File
		$this->lang->load('users', $this->init->Site_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('categories');
		

			# Load Header Template
			$this->init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->init->Have_Permission('categories') )
			{
				$this->db->order_by("create_date", "desc"); 
				$query = $this->db->get_where('tblposts', array('cat_id' => $id , 'status' => 'Active'));
				
				
				if($query->num_rows() == 0)
				{
					# Load SHOW USERS Template
					$this->load->view($this->init->Site_Template.'/not_found'); 
				}
					
				foreach ($query->result() as $row)
				{
					
					$query2 = $this->db->get_where('tblcategories', array('id' => $id));
					$row2 = $query2->row();
				
					$data = array(
					
					   'URL' => base_url().'posts/'.$row->id.'/'.$row->seo_url,
					   'Cat_URL' => base_url().'categories/'.$row2->id.'/'.$row2->seo_url,
					   'category' => $row2->name,
					   'title' => $row->title,
					   'seo_url' => $row->seo_url,
					   'create_date' => $row->create_date,
					   'story' => $row->story,
					);
					
				
				
					# Load SHOW USERS Template
					$this->load->view($this->init->Site_Template.'/categories', $data); 	
				
				}	

			}
			else
			{
				# Show Error
				$this->init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->init->show_footer();
		
			
	
	}
} 
