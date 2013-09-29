<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{

		# Load Categories Language File
		$this->lang->load('discounts', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('edit_discount');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{
				
				$query = $this->db->get_where('discounts', array('id' => $id));
				if ($query->num_rows() > 0)
				{
				
					
					
					# Run If No Data Sent By Form Yet
					if ($this->form_validation->run() == FALSE)
					{
						$data = $this->discounts->show($id);

						$data['results']->type = form_dropdown('type', $data['type_options'], $data['results']->type );
						
						$data = $data['results'];
					
						# Load Edit Categories Template
						$this->load->view('admin/edit', $data); 	
		
					}
					# Run If Data Sent By Form
					else
					{
						$data = $_POST;
						
						$this->discounts->update($id, $data);
						
						
						
								
					}
				}
				else
				{	
					# Show Access Is Denied	
					$this->admin_init->Show_Access_Is_Denied();	
				}
					
			}
			# If Admin Not Have Enough Permission
			else
			{
				# Show Error
				$this->admin_init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->admin_init->show_footer();
		}
		# If Admin Not Logged In
		else
		{
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}	
	}	
}
