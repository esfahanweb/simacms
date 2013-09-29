<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{


		
		# Load Admins Language File
		$this->lang->load('discounts', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('delete_admin');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission() )
			{
				# Load Edit Categories Template	
				if ($id==0)
				{	
					# Show Access Is Denied	
					$this->admin_init->Show_Access_Is_Denied('Global Discount Is Not Deletable !');	
				}
				else
				{	
					$query = $this->db->get_where('discounts', array('id' => $id));
					if ($query->num_rows() > 0)
					{
						
						# Form Validation Rules
						$this->form_validation->set_rules('submit','submit', 'required');
				
						# Run If No Data Sent By Form Yet
						if ($this->form_validation->run() == FALSE)
						{
							$data = array(
								'id' => $id,
							);	
							
							# Load Delete Admin Template
							$this->load->view('admin/delete', $data); 	
						}
						# Run If Data Sent By Form
						else
						{
							$this->db->where('id', $id);
							$this->db->delete('discounts'); 
							
							$data = array(
							   'discount_id' => '0',
							);
							$this->db->where('discount_id', $id);
							$query = $this->db->get('users');
							foreach ($query->result() as $row)
							{
								$this->db->update('users', $data); 
							}
	
							# Show Success Page
							$this->admin_init->Show_Success_Page($this->lang->line('delete_admin_success'),base_url().'admin/discounts/show');	
						}
					}
					else
					{	
						# Show Access Is Denied	
						$this->admin_init->Show_Access_Is_Denied();	
					}
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