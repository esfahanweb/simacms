<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Set_abs extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		
		//$this->load->library('ibsngadapter');
		# Load Required Libraries
		$this->load->library('form_validation');
		$this->load->model('ibsng');
		
		
		
		# Load Required Models
		$this->load->model('admin_init');
		
		# Load Categories Language File
		$this->lang->load('categories', $this->admin_init->Admin_Language);
		
		# Load Page Title From Language File
		$page_title = $this->lang->line('add_new_category');
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
			# Load Header Template
			$this->admin_init->show_header($page_title);	
			
			# Check Admin Have Enough Permission
			if( $this->admin_init->Have_Permission('add_categories') )
			{
				//$this->load->helper('file');

					


$attrs['has_abs_exp'] = 't';
$attrs['abs_exp_date_unit']='gregorian';

$row = 1;
if (($handle = fopen("https.txt", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        
			//print_r( $this->ibsng->ibsng_editUserAttr($this->ibsng->params) );
            $username = $data[0];
			$attrs['abs_exp_date'] = $data[1];
        	print_r( $this->ibsng->ibsng_editUserAttr($this->ibsng->params, $username, $attrs));

    }
    fclose($handle);
}
/*
$username = 'pj';
$attrs['has_abs_exp'] = 't';
$attrs['abs_exp_date']='2020-01-19 00:00';
$attrs['abs_exp_date_unit']='gregorian';

print_r( $this->ibsng->ibsng_editUserAttr($this->ibsng->params, $username, $attrs));
*/

					//$this->load->view('set_abs', $data); 
					
					
			
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