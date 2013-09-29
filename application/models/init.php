<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Init extends CI_Model {
	
	public $User;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		# Debug
		$this->output->enable_profiler(TRUE);
		# Check For User Login Status
		$this->User['Logged_In'] = $this->session->userdata('user_logged_in');
		# get system config data
		$this->Config = $this->Fetch_Table_Fields('config');
		
		if($this->User['Logged_In'])
		{
			# Get user data
			$this->User['id'] = $this->session->userdata('user_id');
			$this->User = $this->Fetch_Table_Fields('users', $this->User['id']);
			$this->User['Logged_In'] = true;
			# Get user group data
			$this->Group = $this->Fetch_Table_Fields('groups', $this->User['group_id']);
			# check user is Admin
			if($this->Group['type'] == 'admin')
			{
				$this->User['Is_Admin'] = true;	
			}
			else
			{
				$this->User['Is_Admin'] = false;
			}
		}
		else
		{
			$this->User['Is_Admin'] = false;
			$this->User['firstname'] = 'Guest';
			$this->User['site_template'] = $this->Config['site_template'];
			$this->User['site_language'] = $this->Config['site_language'];
			$this->User['admin_template'] = $this->Config['admin_template'];
			$this->User['admin_language'] = $this->Config['admin_language'];
		}

		//$this->User['site_template'] = 'site/'.$this->User['site_template'];
		
		# Load Post Language File
		$this->lang->load('home', $this->User['site_language']);
		$this->lang->load('form_validation', $this->User['site_language']);
		
		# load home block	
		$this->load->model('home/blocks');
    }
    

	
	#----------[ Fetch_Table_Fields With Or Without ID ]----------#		
	function Fetch_Table_Fields($table, $id=0)
	{
		if($id == 0)
		{
			$query = $this->db->get($table);
			$result = $query->row_array();
		}
		else
		{
			$query = $this->db->get_where($table, array('id' => $id));
			$result = $query->row_array();	
		}
		return $result;		   	 
	}

#----------[ نمایش هدر سایت با قابلیت دریافت عنوان صفحه ]----------#

    function show_header($PageTitle='No Title !!')
	{

		# آماده سازی متغیرهای قابل استفاده در قالب
		$header = array(
               'TMPL' => base_url().'application/views/site/'.$this->User['site_template'],
			   
               'PageTitle' => $PageTitle,
			   'LOGGED_IN' => 0,
			   //'Profile' => $this->profile->get_profile_fields_by_email($this->session->userdata('email')),
			   
          );
		  
		$header['Config'] = $this->Config;
		$header['Config']['URL'] = base_url();
		
		$header['User'] = $this->User;

		# بارگذاری قالب با متغیرها  
		$this->load->view('site/'.$this->User['site_template'].'/header', $header);
	}
	
#----------[ نمایش فوتر سایت ]----------#	
	function show_footer()
	{
		# آماده سازی متغیرهای قابل استفاده در قالب
		
		$footer['copyright_text'] = $this->Config['copyright_text'];
		$this->load->view('site/'.$this->User['site_template'].'/footer', $footer);
	}
	
#----------[ نمایش تاریخ روز بر اساس زبان ]----------#	
	function show_date($Site_Or_Admin='Site')
	{
		if($Site_Or_Admin == 'Site')
		{
			if($this->init->Site_Language == 'persian')
			{
				echo $this->pdate->jdate('Y/n/j');
			}
			else
			{
				echo date('Y/n/j');
			}
		}
		if($Site_Or_Admin == 'Admin')
		{
			if($this->admin_init->Admin_Language == 'persian')
			{
				echo $this->pdate->jdate('Y/n/j');
			}
			else
			{
				echo date('Y/n/j');
			}
		}
	}
	

	
	
#----------[ دریافت تعداد مطالب داخل یک دسته بندی ]----------#	
	function Number_Of_Posts_Under_Category($cat_id)
	{
		$query = $this->db->get_where('tblposts', array('cat_id'=>$cat_id));
		return $query->num_rows();
	}
	
#----------[ دریافت تعداد مطالب داخل یک دسته بندی ]----------#	
	function Title_Of_Category_From_ID($id)
	{
		$query = $this->db->get_where('tblcategories', array('id'=>$id));
		$row = $query->row();
		return $row->name;
	}

	
#----------[ دریافت اطلاعات از جدول دسته بندی ها با قابلیت دریافت جدا کننده ]----------#	
	function Fetch_Categories($separator='<br />')
	{
		$query = $this->db->get('tblcategories');
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		   	  $count = $this->Number_Of_Posts_Under_Category($row->id);
			  echo '<a href="'.base_url().'categories/'.$row->id.'">'.$row->name.' ( '.$count.' ) </a>'.$separator;	
		   }
		} 
		else
		{
			echo 'no categories';
		}
		
	}
	
#----------[ دریافت اطلاعات از جدول نظرات با قابلیت دریافت جدا کننده ]----------#		
	function Fetch_Comments($separator='<br />')
	{
		$query = $this->db->get('tblcomments');
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
			  echo '<a href="'.base_url().'post/'.$row->post_id.'">'.$row->author_name.' گفته است : '.$row->comment.'</a>'.$separator;	
		   }
		} 
		else
		{
			echo 'no comments';
		}
		
	}
	
	
	// Show Success Page
	
	function Show_Success_Page($Message, $Redirect_Url)
	{
	
		$data['success'] = $Message.'<meta http-equiv="refresh" content="1; URL='.$Redirect_Url.'">';
		
		
		
		$this->load->view('site/'.$this->User['site_template'].'/success_page', $data);
		
	
	}
	
	//////////////////////////
	function Redirect($Url)
	{
		echo '<meta http-equiv="refresh" content="2; URL='.base_url().$Url.'">';
	}
	
	//////////////////////////////
	function Have_Permission($permission)
	{
	/*	if($this->User_Logged_In())
		{
			$query = $this->db->get_where('groups', array('id' => $this->logged_in_user['group_id']));
		}
		else
		{
			# Unregistered Group
			$query = $this->db->get_where('groups', array('id' => 1));
		}
		
		$row = $query->row();
		
		if($row->$permission == 1)
		{
			return true;
		}
		if($row->$permission == 0)
		{
			return false;
		}
		
		*/
		return true;
	}
	
	function Show_Access_Is_Denied($back='')
	{
		$data['error'] = $this->lang->line('access_is_denied');
		$data['back'] = $back;
				
		$this->load->view('site/'.$this->User['site_template'].'/error_page', $data);
	}
	

	
	
	function Select_user_Template_Option($id, $type )
	{
		
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/views/'.$type.'/',1);
						

		$Template = $this->init->Fetch_user_Config($type.'_template', $id);
						
		
		$output = NULL;
		
		foreach ($tmp_array as $var)
		{
			
								   
				$output .= '<option ';
				
				if($var == $Template) $output .= 'selected="selected"';
				
				
				$output .= 'value="'.$var.'">'.$var.'</option>';   
								
		}
						
		return $output;
	}
	
	
	
	
	
	
	function Select_user_Language_Option($id=0)
	{
		if($id == 0) 
		{
			$id = $this->session->userdata('id');
		}
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/language/',1);
	

		$Language = $this->init->Fetch_user_Config('site_language', $id);
		
						
		
		$output = NULL;
		
		
		
		foreach ($tmp_array as $var)
		{
			$output .= '<option ';
				
			if($var == $Language) $output .= 'selected="selected"';
				
				
			$output .= 'value="'.$var.'">'.$var.'</option>'; 
								
		}
						
		return $output;
	}
	
	
	
	
	
	# نمایش وضعیت نمایش بصورت select box
	function Status_Option($table, $id=0)
	{
		if($id==0)
		{
			$var = 'Active';
		}
		else
		{	
			$var = $this->Check_Status($table, $id);
		}
		
		if($var == 'Active')
		{
			return '<option selected="selected" value="Active">Active</option><option value="InActive">InActive</option>';
		}
		
		if($var == 'Inactive')
		{
			return '<option value="Active">Active</option><option selected="selected" value="Inactive">Inactive</option>';
		}		
	}
	
	
	# Check status
	function Check_Status($table, $id)
	{
		$query = $this->db->get_where($table, array('id' => $id));
		$row = $query->row();
		return $row->status;
	}
	
	
	// تابع برای نمایش قالب های جاری و تغییر آنها بصورت Select Option
	
	function Select_Default_Template_Option($Site_Or_Admin)
	{
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/views/'.$Site_Or_Admin.'/',1);
						
		if($Site_Or_Admin == 'site')
		{
			$Template = $this->init->Fetch_Default_Config('site_template');
		}
						
		if($Site_Or_Admin == 'admin')
		{
			$Template = $this->init->Fetch_Default_Config('admin_template');
		}
		$output = NULL;
		foreach ($tmp_array as $var)
		{
			$output .= '<option ';
				
			if($var == $Template)
			$output .= 'selected="selected"';
				
				
			$output .= 'value="'.$var.'">'.$var.'</option>'; 
								
		}
						
		return $output;
	}
	
	
	
	
	
	// تابع برای نمایش زبان های جاری و تغییر آنها بصورت Select Option
	
	function Select_Default_Language_Option($Site_Or_Admin)
	{
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/language/',1);
	
		if($Site_Or_Admin == 'site')
		{
			$Language = $this->init->Fetch_Default_Config('site_language');
		}
						
		if($Site_Or_Admin == 'admin')
		{
			$Language = $this->init->Fetch_Default_Config('admin_language');
		}
		$output = NULL;
		foreach ($tmp_array as $var)
		{
			
			
			$output .= '<option ';
				
			if($var == $Language)
			$output .= 'selected="selected"';
				
				
			$output .= 'value="'.$var.'">'.$var.'</option>'; 
								
		}
						
		return $output;
	}

}