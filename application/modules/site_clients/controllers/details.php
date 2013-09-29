<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Details extends CI_Controller {

	/**
	 * Home module controller.
	 */
	
	 
	 
	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('home/blocks');
		$this->load->model('admin_users/configadmins');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		
		# Load Post Language File
		$this->lang->load('users', $this->init->Site_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('details');
		

			# Load Header Template
			$this->init->show_header($page_title);	
			
			# Check Admin Already Logged In 
			if( $this->init->User_Logged_In() )
			{
			
				# Check Admin Have Enough Permission
				if( $this->init->Have_Permission('details') )
				{
				
					$this->form_validation->set_rules('firstname','firstname', 'required');
					$this->form_validation->set_rules('lastname','lastname', 'required');
					//$this->form_validation->set_rules('password','password', 'required');
					$this->form_validation->set_rules('address','address', 'required');
					$this->form_validation->set_rules('state','state', 'required');
					$this->form_validation->set_rules('city','city', 'required');
					
					$id = $this->init->User_ID;
				
					if ($this->form_validation->run() == FALSE)
					{
					
					
						
					
						$query = $this->db->get_where('users', array('id' => $id));
						$row = $query->row();
						
						$select_user_group = $this->configadmins->Form_Select($row->group_id, 'groups');
						$select_user_template = $this->init->Select_user_Template_Option($id);
						$Form_Select_user_Languages = $this->init->Select_user_Language_Option($id);
						
						$data = array(
								   'id' => $id,
								   'select_user_group' => $select_user_group,
								   'select_user_template' => $select_user_template,
								   'Form_Select_user_Languages' => $Form_Select_user_Languages,
								   'firstname' => $row->firstname,
								   'lastname' => $row->lastname,
								   'companyname' => $row->companyname,
								   'email' => $row->email,
								   'address' => $row->address,
								   'state' => $row->state,
								   'city' => $row->city,
								   'postcode' => $row->postcode,
								   'phonenumber' => $row->phonenumber,
								   'password' => $row->password,
								   'Status_Option' => $this->init->Status_Option('users',$id),
						);	
					
						# Load SHOW USERS Template
						$this->load->view($this->init->Site_Template.'/Userarea_details', $data);
		
					
					}
					else
					{
					


					
						$data = array(
						
						   'firstname' => $_POST['firstname'],
						   'lastname' => $_POST['lastname'],
						   'companyname' => $_POST['companyname'],
						   'address' => $_POST['address'],
						   'state' => $_POST['state'],
						   'city' => $_POST['city'],
						   'postcode' => $_POST['postcode'],
						   'phonenumber' => $_POST['phonenumber'],
						   'site_template' => $_POST['site_template'],
						   'site_language' => $_POST['site_language'],
						  
						);
					
						if(!$_POST['password']) 
						{
							
								
						}
						else
						{
							$data['password'] = $this->encrypt->sha1( $_POST['password'] );
						}
					
					
						$this->db->where('id', $id);
						$this->db->update('users', $data); 
						
						
						# Show Success Page
						$this->init->Show_Success_Page($this->lang->line('edit_details_success'),'Userarea/details');
						
					}
		
						
				
				
						 	
					
					
				}
				else
				{
					# Show Error
					$this->init->Show_Access_Is_Denied();
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
