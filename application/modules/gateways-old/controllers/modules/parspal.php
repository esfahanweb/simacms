<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parspal extends CI_Controller {

	/**
	 * Home module controller.
	 */
	 
	   public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			$this->load->model('admin_init');
			$this->load->library('nusoap_base');
			
			
			$query = $this->db->get_where('gateways', array('name' => 'zarinpal'));

			$row = $query->row();
			
			$this->merchantID = $row->merchant_id;

       }
	# Load Required Models

		 
	public function request($amount)
	{
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
		
			# Load Header Template
			$this->admin_init->show_header();	
		
	

			
			//$redirect = $_POST['redirect'];
			$callBackUrl = base_url().'admin/zarinpal/verify/'.$amount.'/';
					
			$User = new nusoap_user('http://www.zarinpal.com/WebserviceGateway/wsdl', 'wsdl');
			$res = $User->call('PaymentRequest', array($this->merchantID, $amount, $callBackUrl, urlencode('تراکنش تستی')));
					
			//Redirect to URL You can do it also by creating a form
			$this->admin_init->Show_Success_Page('enteghal be zarinpal','https://www.zarinpal.com/users/pay_invoice/'.$res);

			
	
		
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
	
	public function verify($amount)
	{	
		
		# Check Admin Already Logged In 
		if( $this->admin_init->Admin_Logged_In() )
		{
		
			# Load Header Template
			$this->admin_init->show_header();	
			
			
			
			
			$au = $_GET['au'];
		
			$User = new nusoap_user('http://www.zarinpal.com/WebserviceGateway/wsdl', 'wsdl');
			$res = $User->call("PaymentVerification", array($this->merchantID, $au, $amount));
			if($res==1)
			{
				$data = array(
				
					'amount' => $amount,
					'redirect' => $this->session->userdata('payment_success_redirect'),
				
				);
				# Load Add Categories Template
				$this->load->view('payment_success', $data); 
				//$this->admin_init->Show_Access_Is_Denied();

				
			}
			else
			{
				$this->admin_init->Show_Access_Is_Denied();
				//echo 'error';
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