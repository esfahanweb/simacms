<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summary extends CI_Controller {

	/**
	 *  SIMA Content Management System
	 *  Discounts Module
	 *  Admin Section
	 *  Edit Controller
	 */
	 
	public function index($name)
	{
		$this->output->enable_profiler(TRUE);
		# Load Discounts Language File
		$this->lang->load('modules', $this->admin_init->Admin_Language);
		
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
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{
					$this->modules->summary($name);
				}
				# Run If Data Sent By Form
				else
				{	
					if( isset($_POST['action']) )
					{
						switch($_POST['action'])
						{
							case 'activate':
								$this->modules->activate($name);
								break;
								
							case 'deactivate':
								$this->modules->deactivate($name);
								break;
							
							case 'install':
								$this->modules->install($name);
								break;
								
							case 'uninstall':
								$this->modules->uninstall($name);
								break;
						}
						
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
