<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_m extends CI_Model {

	/**
	 *  SIMA Content Management System
	 *  Settings Module
	 *  Settings_m Model
	 */
	 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		# Load Required Config Items
		$this->load->helper('directory');
		$tmp = directory_map('./application/language/', 1);
		$this->language_options = $this->admin_init->no_id_array($tmp);
		
		$tmp = directory_map('./application/views/admin/', 1);
		$this->admin_template_options = $this->admin_init->no_id_array($tmp);
		
		$tmp = directory_map('./application/views/site/', 1);
		$this->site_template_options = $this->admin_init->no_id_array($tmp);
    }
 	
	#--------------------[ Show Edit Setting Form ]--------------------#
	
	function add_form()
	{				


		$settings['site_language'] = form_dropdown('site_language', $this->language_options);
		$settings['site_template'] = form_dropdown('site_template', $this->site_template_options );
		$settings['admin_language'] = form_dropdown('admin_language', $this->language_options);
		$settings['admin_template'] = form_dropdown('admin_template',$this->admin_template_options);
									
		# Load Edit Categories Template
		$this->load->view('add', $settings); 	

	}
	
	#--------------------[ Show Edit Setting Form ]--------------------#
	
	function edit_form()
	{				
		$query = $this->db->get('tblsettings');
		if($query->num_rows() > 0)
		{
			$settings = $query->row_array();
			$settings['site_language'] = form_dropdown('site_language', $this->language_options, $settings['site_language'] );
			$settings['site_template'] = form_dropdown('site_template', $this->site_template_options, $settings['site_template'] );
			$settings['admin_language'] = form_dropdown('admin_language', $this->language_options, $settings['admin_language'] );
			$settings['admin_template'] = form_dropdown('admin_template',$this->admin_template_options, $settings['admin_template'] );
									
			# Load Edit Categories Template
			$this->load->view('edit', $settings); 	
		}
		else
		{
			# Show Add Form
			$this->add_form();
		}
	}
	
	#--------------------[ Update Setting By Posted Data ]--------------------#
	
	function edit_data()
	{				
		$data = $_POST;
		$query = $this->db->get('tblsettings');
		if($query->num_rows() > 0)
		{
			$this->db->update('tblsettings', $data); 
		}
		else
		{
			$this->db->insert('tblsettings', $data); 
		}
		
		# Show Success Page
		$this->admin_init->Show_Success_Page($this->lang->line('edit_settings_success'), base_url().'admin/settings');
	}
	
}