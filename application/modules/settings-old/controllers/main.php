<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index()
	{
		# Load Required Libraries
		$this->load->library('form_validation');
		
		# Load Required Models
		$this->load->model('admin_init');

		# Load Settings Language File
		$this->lang->load('settings', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('main_settings');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('edit_categories') )
			{
				# Set Form Validation Rules
				$this->form_validation->set_rules('companyname','companyname', 'required');
				$this->form_validation->set_rules('Email','Email', 'required');
				$this->form_validation->set_rules('Domain','Domain', 'required');
				$this->form_validation->set_rules('copyright_text','copyright_text', 'required');
				$this->form_validation->set_rules('companyname','companyname', 'required');
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					$data = array(
						'companyname' => $this->init->Fetch_Default_Settings('companyname'),
						'Email' => $this->init->Fetch_Default_Settings('Email'),
						'Domain' => $this->init->Fetch_Default_Settings('Domain'),
						'copyright_text' => $this->init->Fetch_Default_Settings('copyright_text'),
						'Site_Select_Template_Option' => $this->admin_init->Select_Default_Template_Option('site'),
						'Site_Select_Language_Option' => $this->admin_init->Select_Default_Language_Option('site'),
						'Admin_Select_Template_Option' => $this->admin_init->Select_Default_Template_Option('admin'),
						'Admin_Select_Language_Option' => $this->admin_init->Select_Default_Language_Option('admin'),	
			 	   	);
				
					# Load Main Settings Template	
					$this->load->view($this->admin_init->Admin_Template.'/settings_main', $data); 	
				}
				# Run If Data Sent By Form
				else
				{
					$data = array(
					   'companyname' => $_POST['companyname'],
					   'Email' => $_POST['Email'],
					   'Domain' => $_POST['Domain'],
					   'copyright_text' => $_POST['copyright_text'],
					   'site_template' => $_POST['site_template'],
					   'site_language' => $_POST['site_language'],
					   'admin_template' => $_POST['admin_template'],
					   'admin_language' => $_POST['admin_language'],
					);
					
					# Update Settings Table From Database
					$this->db->update('tblsettings', $data); 
					
					# Show Success Page And Redirect
					$this->admin_init->Show_Success_Page($this->lang->line('edit_settings_success'),'admin/settings/main');		
				}
			}
			# If Admin Not Have Enough Permission
			else
			{
				# Show Access Is Denied
				$this->admin_init->Show_Access_Is_Denied();
			}
			
			# Load Footer Template
			$this->admin_init->show_footer();
		}
		# If Admin Not Logged In
		else
		{
			# Show Access Is Denied
			$this->admin_init->Show_Access_Is_Denied();
			
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}	
	}	
}