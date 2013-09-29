<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	/**
	 * Home module controller.
	 */
	 
	   public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			$this->load->model('admin_init');
			
			

       }
	# Load Required Models

		 
	public function index()
	{
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
		
			# Load Header Template
			$this->admin_init->show_header();	
		
			$amount = $_POST['Amount']; //Amount will be based on Toman

			$gateway_id = $_POST['gateway_id'];
			
			$query = $this->db->get_where('gateways', array('id' => $gateway_id));
			$gateways = $query->row();
			
				print_r($_POST);	
				
			$gateway = $gateways->name;
			//Redirect to URL You can do it also by creating a form
			//$this->admin_init->Show_Success_Page('enteghal be gateway',base_url().'admin/gateways/'.$gateway.'/request/'.$amount);
			$this->load->library($gateway);
			
			
			
			$this->$gateway->load($gateways);
					
			$request = array(
				'amount' => $amount,
				'desc' => 'testy',
				'call_back_url' => base_url().'admin/zarinpal/verify/'.$amount.'/',
			);
					
			$this->$gateway->request($request);
		
			# Load Footer Template
			$this->admin_init->show_footer();
		
		}
		

		else
		{
			# Redirect To Login Page
			$this->admin_init->Redirect('admin/login');
		}
	
	}
	/////////////

}