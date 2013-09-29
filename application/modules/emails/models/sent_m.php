<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sent_m extends CI_Model {

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
 	
	
	
	
	#--------------------[ Show Delete Email Form ]--------------------#
	
	function delete_form($id)
	{				
		$query = $this->db->get_where('email_templates', array('id' => $id));
		if($query->num_rows() > 0)
		{
			$email_templates = $query->row_array();
									
			# Load Edit Categories Template
			$this->load->view('admin/delete', $email_templates); 	
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
		$this->db->delete('email_templates'); 
							
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
		$this->admin_init->Show_Success_Page($this->lang->line('delete_admin_success'),base_url().'admin/email_templates/show');	
	}

	#--------------------[ Show / Search Emails ]--------------------#
	
	function show_search()
	{
		$query = $this->db->get('emails');
		$emails = $query->result_array();
		$emails_output = NULL;				
		foreach ($emails as $item)
		{
			//echo '<input type="button" value="Dialog with HTML support" class="basicBtn mr10 ml10 bHtml" />';
		 
			$emails_output .= 
				'<tr>
				<td>'.$item['id'].'</td>
				<td>'.$item['user_id'].'</td>
				<td>'.$item['subject'].'</td>
				<td>'.$item['date'].'</td>
				<td>';
				$emails_output .= "<a href='javascript:void(0);' class='mr10' onclick='show_mail(".$item['id'].")'><img src='".$this->admin_init->TMPL."/images/icons/dark/pencil.png' /></a>";
				
				
				$emails_output .= '</td>
				</tr>';
		}		
		return $emails_output;
				
		
	}	
}