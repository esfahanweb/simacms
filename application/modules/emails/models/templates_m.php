<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Emails Module
	 *  Emails_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		# Load Required Config Items
		$this->type_options = $this->config->item('type_options');
    }
 	
	#--------------------[ Show Add New Email Form ]--------------------#
	
	function add_form()
	{				
		$emails['type'] = form_dropdown('type', $this->type_options);
									
		# Load Edit Categories Template
		$this->load->view('admin/add', $emails);
	}
	
	#--------------------[ Add New Email By Posted Data ]--------------------#
	
	function add_data()
	{				
		$data = $_POST;
		$this->db->insert('emails', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('add_email_success'), base_url().'admin/emails/show');
	}
	
	#--------------------[ Show Edit Email Form ]--------------------#
	
	function edit_form($id)
	{				
		$query = $this->db->get_where('emails', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$emails = $query->row_array();
			$emails['type'] = form_dropdown('type', $this->type_options, $emails['type'] );
									
			# Load Edit Categories Template
			$this->load->view('admin/edit', $emails); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Update Email By Posted Data ]--------------------#
	
	function edit_data($id)
	{				
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->update('emails', $data); 
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_email_success'), base_url().'admin/emails/show');
	}
	
	#--------------------[ Show Delete Email Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('emails', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$emails = $query->row_array();
									
			# Load Edit Categories Template
			$this->load->view('admin/delete', $emails); 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied();
		}
	}
	
	#--------------------[ Delete Email By Posted Data ]--------------------#
	
	function delete_data($id)
	{				
		$data = $_POST;
		$this->db->where('id', $id);
		$this->db->delete('emails'); 
							
		$data = array(
			 'email_id' => '0',
		);
		$this->db->where('email_id', $id);
		$query = $this->db->get('users');
		foreach ($query->result() as $row)
		{
			$this->db->update('users', $data); 
		}
	
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('delete_admin_success'),base_url().'admin/emails/show');	
	}

	#--------------------[ Show / Search Emails ]--------------------#
	
	
	
	function show_search()
	{
		$query = $this->db->get('email_templates');
		$email_templates = $query->result_array();
		$email_templates_output = NULL;				
		foreach ($email_templates as $item)
		{
			//echo '<input type="button" value="Dialog with HTML support" class="basicBtn mr10 ml10 bHtml" />';
		 
			$email_templates_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['type'].'</td>
				<td>'.$item['title'].'</td>
				<td>'.$item['subject'].'</td>
				<td>';
				$email_templates_output .= "<a href='javascript:void(0);' class='mr10' onclick='show_mail(".$item['id'].")'><img src='".$this->admin_init->TMPL."/images/icons/dark/pencil.png' /></a>";
				
				
				$email_templates_output .= '</td>
				</tr>';
		}		
		return $email_templates_output;
	}
	
	#--------------------[ Show Edit Email Form ]--------------------#
	
	function send($user_id, $template_id)
	{				
		$query = $this->db->get_where('email_templates', array('id' => $template_id));
		if($query->num_rows() > 0)
		{
			$email_templates = $query->row_array();
			
			$query = $this->db->get_where('users', array('id' => $user_id));
			if($query->num_rows() > 0)
			{
				$users = $query->row_array(); 
				
				$query = $this->db->get_where('services', array('user_id' => $user_id));
				if($query->num_rows() > 0)
				{
					$services = $query->row_array();	
				}
				
				 $config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'noreply@esfahanweb.com',
				'smtp_pass' => 'myesfahanweb26',
				'mailtype'  => 'html', 
				);
				
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				
				$this->email->from('your@example.com', 'Your Name');
				$this->email->to('info@esfahanweb.com');
				
				$this->load->library('parser');
				$data = array(
					'username' => $users['username'],
					'firstname' => $users['firstname'],
					'lastname' => $users['lastname'],
					'product_id' => $services['product_id'],
           		);
				
				//$this->parser->parse('dwoo_test', array('message' => 'OH HAI!'));

//$this->parser->parse('dwoo_test', array('message' => 'OH HAI!'));
				$parsed = $this->parser->parse('admin/templates/test', $data, TRUE);
				
				
				//$email_templates['message'] = $this->load->view('admin/templates/test', $data, true);
					
				$this->email->subject($email_templates['subject']);
				$this->email->message($email_templates['message']);
						
				//$result = $this->email->send();  
				
				echo $parsed;
			
				
			

				
				
				
				//echo $this->email->print_debugger();
			}
			else
			{
				# Show Error
				$this->admin_init->Show_Access_Is_Denied('user not found');
			}
 	
		}
		else
		{
			# Show Error
			$this->admin_init->Show_Access_Is_Denied('email template not found');
		}
	}
}