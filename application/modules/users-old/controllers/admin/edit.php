<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		
		//$this->output->enable_profiler(TRUE);
		
		# Load Admin Initialization Model
		$this->load->model('admin_init');
		$this->load->model('configadmins');
		$this->load->model('admin/admin_forms');
		$this->load->model('tabs');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		
		# Load Post Language File
		$this->lang->load('users', $this->admin_init->Admin_Language);
		
		$page_title = $this->lang->line('edit_user');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('edit_users') )
			{
				# Load Edit Categories Template	
		
		
		
				$this->form_validation->set_rules('email','email', 'required');
				
				
				if ($this->form_validation->run() == FALSE)
				{
					
					
					
					
					$query = $this->db->get_where('users', array('id' => $id));
					$row = $query->row();
					
					$select_user_group = $this->admin_init->get_select_from_id('groups', $row->group_id);
					$select_user_discount = $this->admin_init->get_select_from_id('discounts', $row->discount_id);
					$select_user_site_language = $this->admin_init->user_language_option($id ,'site');
					$select_user_admin_language = $this->admin_init->user_language_option($id ,'admin');
					$select_user_site_template = $this->admin_init->user_template_option($id ,'site');
					$select_user_admin_template = $this->admin_init->user_template_option($id ,'admin');
					
					$user_is_admin = $this->admin_init->group_is_admin($row->group_id);
					
					$data = array(
							   'id' => $id,
							   'select_user_group' => $select_user_group,
							   'select_user_discount' => $select_user_discount,
							   'select_user_site_language' => $select_user_site_language,
							   'select_user_admin_language' => $select_user_admin_language,
							   'select_user_site_template' => $select_user_site_template,
							   'select_user_admin_template' => $select_user_admin_template,
							   'firstname' => $row->firstname,
							   'lastname' => $row->lastname,
							   'email' => $row->email,
							   //'site_template' => $row->site_template,
							   //'site_language' => $row->site_language,
							   'password' => $row->password,
							   'Status_Option' => $this->admin_init->Status_Option('users',$id),
							   
							   'user_is_admin' => $user_is_admin,
					);	
					
				$this->load->view('admin/edit', $data); 
		
					
				}
				else
				{
					

					if(isset($_POST['admin_template']) && isset($_POST['admin_language']))
					{
						$admin_template = $_POST['admin_template'];
					    $admin_language = $_POST['admin_language'];
					}
					else
					{
						$admin_template = NULL;
					    $admin_language = NULL;
					}
					
					$data = array(
					
					   'group_id' => $_POST['group_id'],
					   'discount_id' => $_POST['discount_id'],
					   'firstname' => $_POST['firstname'],
					   'lastname' => $_POST['lastname'],
					   'email' => $_POST['email'],
					   'site_template' => $_POST['site_template'],
					   'site_language' => $_POST['site_language'],
					   'admin_template' => $admin_template,
					   'admin_language' => $admin_language,
  					   'status' => $_POST['status'],
					  
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
					$this->admin_init->Show_Success_Page($this->lang->line('edit_user_success'), base_url().'admin/users/show');
						
				}
		
			}
			else
			{
				# Show Error
				$this->admin_init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->admin_init->show_footer();
		}
		else
		{
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}
		
		
		
	}
	
	
	
}
