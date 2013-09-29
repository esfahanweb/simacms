<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_account extends CI_Controller {

	/**
	 * Home module controller.
	 */
	public function index($id=0)
	{
		# Load Required Libraries
		$this->load->library('form_validation');
		
		# Load Required Models
		$this->load->model('admin_init');
		$this->load->model('ibsng');
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
				# Form Validation Rules
			
				$this->form_validation->set_rules('ibsng_group_name','ibsng_group_name', 'required');
			
				
				# Run If No Data Sent By Form Yet
				if ($this->form_validation->run() == FALSE)
				{	
					$query = $this->db->get('tblibsng_groups');
				
					
					$array = $query->result_array();
					$output = NULL;
					foreach ($array as $var)
					{
						$output .= '<option value="'.$var['ibsng_group_name'].'">'.$var['title'].' | price : '.$var['price'].'</option>'; 
											
					}
					
					$ibsng_group_name = $output;
					
					

					
					$data = array(
						//'id' => $row->id,
						//'title' => $row->title,
						//'ibsng_group_name' => $row->ibsng_group_name,
						'ibsng_group_name' => $ibsng_group_name,
						//'price' => $row->price		  
					);
					
					# Load Add Categories Template
					$this->load->view($this->admin_init->Admin_Template.'/ibsng_add_account', $data); 
				}
				# Run If Data Sent By Form
				else
				{
					$query = $this->db->get_where('tblibsng_groups', array('ibsng_group_name' => $_POST['ibsng_group_name']));
					$row = $query->row();
					
					$product_data = array(
						'group' => $_POST['ibsng_group_name'],
					   //'seo_url' => $_POST['seo_url'],
					   'title' => $row->title,
					   'price' => $row->price,
					);
					
					
					$query = $this->db->get_where('users', array('id' => $this->admin_init->User_ID));
					$row = $query->row();
					
					$admin_data = array(
						'credit' =>  $row->credit,

					);
					
					
					
					$params = array(
						'group' => $_POST['ibsng_group_name'],
					   //'seo_url' => $_POST['seo_url'],
					   //'title' => $row->title,
					  // 'price' => $row->price,
					);
					
					
					
					$discount = $this->admin_init->get_prop_from_id('groups',$this->admin_init->Group_ID,'discount');
					
					$product_data['price'] = $product_data['price'] - ($product_data['price'] * ($discount/100));

					echo $product_data['price'];
					$ballance = $admin_data['credit'];
					$amount = $ballance - $product_data['price'];
					if($amount < 0)
					{
						# Show UnSuccess Page
						$this->admin_init->Show_UnSuccess_Page('mojoodi kaafi nist', base_url().'admin/ibsng/add_account');
					}
					else
					{
						echo 'mablaghe morede nazar az hesab shoma kam shod';
						$ballance = $amount;
						$data = array(
					  	 'credit' =>  $ballance,
						);
		
						$this->db->where('id', $this->admin_init->User_ID);
						$this->db->update('users', $data); 
	
						$array = $this->ibsng->params + $params ;
						//$this->ibsng->CreateAccount($array);
	
						
						
						# Show Success Page
						$this->admin_init->Show_Success_Page('mablaghe morede nazar az hesab shoma kam shod', base_url().'admin/ibsng/add_account');	
					}
					

					
						
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