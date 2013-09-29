<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Home module controller.
	 */
	
	 
	 
	public function index()
	{

		

				
		$User_login_data = array(
					'email'  => '',
					'User_id'  => '',
					'password'     => '',
					'User_logged_in' => ''
					);

					$this->session->unset_userdata($User_login_data);
		# Load Admin Initialization Model
		$this->load->model('init');
		$this->load->model('home/blocks');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		
	
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('homepage');
		

		# Load Header Template
		$this->init->show_header($page_title);	
			
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password','password', 'required');	
				
				if ($this->form_validation->run() == FALSE)
				{
				
				
				
				$this->load->view($this->init->Site_Template.'/login'); 
		
					
				}
				else
				{
					$data = array(
					
					   'email' => $_POST['email'],
					   'password' => $_POST['password'],
					   
					  
					);
					
					
				
					$query = $this->db->get_where('users', array('email' => $data['email']));
					$row = $query->row();
					
				if(isset($row->email))
				{
					//echo 'run';
					if($row->password == $this->encrypt->sha1($data['password']) && $row->status == 'Active')
					
						{
							
							
							$User_login_data = array(
						   'email'  => $data['email'],
						   'User_id'     => $row->id,
						   'User_logged_in' => TRUE
					  	 );

							$this->session->set_userdata($User_login_data);
							
								$this->load->helper('date');
								$format = 'DATE_ATOM';
								$time = time();
								
								
							$data = array(
						  	 'lastlogin' => standard_date($format, $time),
							);
			
							$this->db->where('id', $row->id);
							$this->db->update('users', $data); 
							
							# Show Success Page
							$this->init->Show_Success_Page('<strong>تبریک </strong>شما با موفقیت به سیستم وارد شدید !','');
					
						}
					
						else
						{
							
							
							//echo 'password incorrect';
							
							$this->init->Show_Access_Is_Denied('<a href="'.base_url().'login'.'" title="" ><span>return</span></a>');
							
							# Redirect To Login Page
							//$this->init->Redirect('login');
							
						}
				}
				else
				{
					$this->init->Show_Access_Is_Denied('<a href="'.base_url().'login'.'" title="" ><span>return</span></a>');
					# Redirect To Login Page
					//$this->init->Redirect('login');
				}
					
					
					//echo $row->name;	
						
						
						
						
						
						
					
					
					
						
				}
					
			
			
		# Load Footer Template
		$this->init->show_footer();
		
			
	
	}
} 
