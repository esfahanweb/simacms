<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_init extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

		
			//echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		
			$this->Admin_Template = 'admin/'.$this->init->User['admin_template'];
		
			$this->TMPL = base_url().'application/views/'.$this->Admin_Template;
		
		
			$this->Admin_Language = $this->init->User['admin_language'];
		
		

		$this->lang->load('admin', $this->Admin_Language);
		


    }
	
	
	
	// تابع برای نمایش قالب های جاری و تغییر آنها بصورت Select Option
	
	function Select_Default_Template_Option($Site_Or_Admin)
	{
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/views/'.$Site_Or_Admin.'/',1);
						
		if($Site_Or_Admin == 'site')
		{
			$Template = $this->init->Fetch_Default_Settings('site_template');
		}
						
		if($Site_Or_Admin == 'admin')
		{
			$Template = $this->init->Fetch_Default_Settings('admin_template');
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
	
	
	
	//////////
	
	
		function Select_Admin_Template_Option($id=0)
	{
		if($id == 0) 
		{
			$id = $this->session->userdata('id');
		}
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/views/admin/',1);
						

		$Template = $this->init->Fetch_Admin_Settings('admin_template', $id);
						
		
		$output = NULL;
		
		foreach ($tmp_array as $var)
		{
			
								   
				$output .= '<option ';
				
				if($var == $Template) $output .= 'selected="selected"';
				
				
				$output .= 'value="'.$var.'">'.$var.'</option>';   
								
		}
						
		return $output;
	}
	
	
	function user_template_option($id, $type)
	{		
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/views/'.$type.'/',1);
		$temp = $this->init->Fetch_user_Settings($type.'_template', $id);
		$output = NULL;
		foreach ($tmp_array as $var)
		{					   
			$output .= '<option ';	
			if($var == $temp) $output .= 'selected="selected"';
			$output .= 'value="'.$var.'">'.$var.'</option>';						
		}				
		return $output;
	}
	
	
	function user_language_option($id, $type)
	{		
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/language/',1);
		$temp = $this->init->Fetch_user_Settings($type.'_language', $id);
		$output = NULL;
		foreach ($tmp_array as $var)
		{					   
			$output .= '<option ';	
			if($var == $temp) $output .= 'selected="selected"';
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
			$Language = $this->init->Fetch_Default_Settings('site_language');
		}
						
		if($Site_Or_Admin == 'admin')
		{
			$Language = $this->init->Fetch_Default_Settings('admin_language');
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
	
	
	///////////////////////
	
	function Select_Array_Option($array, $selected)
	{
		$output = NULL;
		foreach ($array as $var)
		{
			$output .= '<option ';	
			if($var == $selected) $output .= 'selected="selected"';	
			$output .= 'value="'.$var.'">'.$var.'</option>'; 						
		}				
		return $output;
	}
	
	
	function Select_Admin_Language_Option($id=0)
	{
		if($id == 0) 
		{
			$id = $this->session->userdata('id');
		}
		$this->load->helper('directory');
		$tmp_array = directory_map('./application/language/',1);
	

		$Language = $this->init->Fetch_Admin_Settings('admin_language', $id);
		
						
		
		$output = NULL;
		
		
		
		foreach ($tmp_array as $var)
		{
			$output .= '<option ';
				
			if($var == $Language) $output .= 'selected="selected"';
				
				
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
	

		$Language = $this->init->Fetch_user_Settings('site_language', $id);
		
						
		
		$output = NULL;
		
		
		
		foreach ($tmp_array as $var)
		{
			$output .= '<option ';
				
			if($var == $Language) $output .= 'selected="selected"';
				
				
			$output .= 'value="'.$var.'">'.$var.'</option>'; 
								
		}
						
		return $output;
	}
	
	// تابع برای نمایش دسته های جاری و تغییر آنها بصورت Select Option
	
	function Selected_Category_Option($id=0)
	{
			
		
		if($id != 0) 
		{
			$query = $this->db->get_where('tblposts', array('id' => $id));
			$row = $query->row();
			$cat_id = $row->cat_id;
		}
		
				   	 
		
		//$this->load->helper('directory');
		//$tmp_array = directory_map('./application/language/',1);
		
		$query = $this->db->get('tblcategories');

		
	

		//$Language = $this->init->Fetch_Admin_Settings('language', $id);
		
						
		
		$output = NULL;
		foreach ($query->result() as $var)
		{
			if($var->id == $cat_id)
			{
				$output .= '<option SELECTED value="'.$var->id.'">'.$this->Show_Category_Title($var->id).'</option>'; 
			}
			else
			{
								   
				$output .= '<option value="'.$var->id.'">'.$this->Show_Category_Title($var->id).'</option>';   
			}
								
		}
						
		return $output;
	}
	
	function Show_Category_Title($id)
	{
		$query = $this->db->get_where('tblcategories', array('id' => $id));
		$row = $query->row();
		return $row->name;
	}
	
	// Show Success Page
	
	function Show_Success_Page($Message, $Redirect_Url)
	{
	
		$data['success'] = $Message.'<meta http-equiv="refresh" content="1; URL='.$Redirect_Url.'">';
		
		if(isset($this->Admin_Template))
		{
			$this->load->view($this->Admin_Template.'/success_page', $data);
		}
		else
		{
			$this->load->view('admin/'.$this->init->Fetch_Default_Settings('admin_template').'/success_page', $data);
		}		
		
	
	}
	
	
	
	// Show UnSuccess Page
	
	function Show_UnSuccess_Page($Message, $Redirect_Url)
	{
	
		$data['error'] = $Message.'<meta http-equiv="refresh" content="3; URL='.$Redirect_Url.'">';
		
		if(isset($this->Admin_Template))
		{
			$this->load->view($this->Admin_Template.'/error_page', $data);
		}
		else
		{
			$this->load->view('admin/'.$this->init->Fetch_Default_Settings('admin_template').'/error_page', $data);
		}		
		
	
	}
	///////////////////////////////////
	
	function Admin_Logged_In()
	{

		
		
		if ($this->session->userdata('user_logged_in')) 
		{
			
			
			$this->Is_Admin = $this->group_is_admin($this->init->logged_in_user['group_id']);
			
			if($this->Is_Admin == TRUE)
			{
				return true;
			}
			
			
		}
		
		return false;

		
		
	}
	//////////////////////////
	function Redirect($Url, $message='')
	{
		if($message=='')
		{
			$data['message'] = $this->lang->line('access_is_denied');
		}
		else
		{
			$data['message'] = $message;
		}
		
		$data['TMPL'] = $this->TMPL;
		$data['meta'] = '<meta http-equiv="refresh" content="5; URL='.base_url().$Url.'">';
		$this->load->view($this->Admin_Template.'/redirect', $data);

	}
	//////////////////////////////
	
	function admin_roles_id_from_controller($controller)
	{
	
		$query = $this->db->get_where('roles', array('url' => $controller));
		$roles = $query->row();
		return $roles->id;
	
	}
	
	function check_controller_role($controller)
	{
	
		$query = $this->db->get_where('roles', array('url' => $controller));
		if ($query->num_rows() > 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function Have_Permission()
	{
	/* disable permissions for test system *//*
		$query = $this->db->get_where('groups', array('id' => $this->init->logged_in_user['group_id']));
		$groups = $query->row();
		$string = $groups->perms;
		$string = reduce_multiples($string,",",TRUE);
		$admin_perms_array = explode(',', $string);
		#get url string
		$url = $this->uri->uri_string();
		# remove number from url string
		$url = preg_replace('#[^\\/\-a-z\s]#i', '', $url);	
		# remove end "/" from url string	
		$url = rtrim($url, "/");
		
		if($this->check_controller_role($url))
		{			
			$role_id = $this->admin_roles_id_from_controller($url);
						
			if(  in_array($role_id, $admin_perms_array))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			$this->Show_Access_Is_Denied('please define a role for this controller');
			return false;				
		}
		
		*/
		return true;
		
		
	}
	
	
	function Show_Access_Is_Denied($error = '')
	{
		if($error)
		{
			$data['error'] = $error;
		}
		else
		{
			$data['error'] = $this->lang->line('access_is_denied');
		}	

		if(isset($this->Admin_Template))
		{
			$this->load->view($this->Admin_Template.'/error_page', $data);
		}
		else
		{
			$this->load->view('admin/'.$this->init->Fetch_Default_Settings('admin_template').'/error_page', $data);
		}	
	}
	

    
#----------[ نمایش هدر سایت با قابلیت دریافت عنوان صفحه ]----------#

    function show_header($PageTitle='No Title !!')
	{
		# آماده سازی متغیرهای قابل استفاده در قالب
		$header = array(
               'TMPL' => $this->TMPL,
			   'LANG' => $this->init->User['admin_language'],
			   'companyname' => $this->init->User['companyname'],
               'PageTitle' => $PageTitle,
               'URL' => base_url(),
			   //'Profile' => $this->profile->get_profile_fields_by_email($this->session->userdata('email')),
			   'LOGGED_IN' => $this->session->userdata('user_logged_in'),
			   
			   'User_ID' => $this->init->User['id'],
			   'FirstName' => $this->init->User['firstname'],
			   'LastName' => $this->init->User['lastname'],
			   'Group_ID' => $this->init->User['group_id'],
			   
			   //Lang
			   'main_settings' => $this->lang->line('main_settings'),
			   'settings' => $this->lang->line('settings'),
			   'my_profile' => $this->lang->line('my_profile'),
			   'logout' => $this->lang->line('logout'),
			   
          );
		# بارگذاری قالب با متغیرها  
		$this->load->view($this->Admin_Template.'/header', $header);
	}
	
#----------[ نمایش فوتر سایت ]----------#	
	function show_footer()
	{
		# آماده سازی متغیرهای قابل استفاده در قالب
		
		$footer['copyright_text'] = $this->init->Config['copyright_text'];
		$footer['Admin_IP_Address'] = $this->session->userdata('ip_address');
		
		$this->load->view($this->Admin_Template.'/footer', $footer);
	}
	
#----------[ نمایش تاریخ روز به هجری شمسی ]----------#	
	function show_date()
	{
		echo $this->pdate->jdate('Y/n/j');
	}
	
# Check status
	function Check_Status($table, $id)
	{
		$query = $this->db->get_where($table, array('id' => $id));
		$row = $query->row();
		return $row->status;
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
	
#----------[ دریافت اطلاعات از جدول پیکربندی با قابلیت دریافت مورد خاص ]----------#		
	//function Fetch_Settings($setting)
	//{
	//	$query = $this->db->get('tblsettings');
	//	$row = $query->row();
//return $row->$setting;			   	 
//	}
	
	
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
	
	/////////////////////////////////
	
	function get_prop_from_id($table, $id, $prop)
	{
	
		$query = $this->db->get_where($table, array('id' => $id));
		$admin_roles = $query->row();
		return $admin_roles->$prop;
	
	}
	
	
	function get_all_from_id($table, $id)
	{
	
		$query = $this->db->get_where($table, array('id' => $id));
		$data = $query->row_array();
		return $data;
	
	}
	
	
	////////////
	
	
	function get_select_from_id($table, $prop , $id='')
	{
		$data = '';
		$query = $this->db->get($table);
		
		foreach ($query->result() as $row)
		{
			
			
			if($row->id == $id)
			{		
				$data .= '<option id="'.$row->id.'" selected="selected" value="'.$row->id.'">'.$row->$prop.'</option>';		 		
			}
			else
			{
				$data .= '<option id="'.$row->id.'" value="'.$row->id.'">'.$row->$prop.'</option>';
			}
 
		}
		
		return $data;
	}
	
	
	
	
	function get_select_from_array($array, $selected='')
	{
		$data = '';
		
		foreach ($array as $key => $row)
		{
			
			
			if($row == $selected)
			{		
				$data .= '<option id="'.$key.'" selected="selected" value="'.$key.'">'.$row.'</option>';		 		
			}
			else
			{
				$data .= '<option id="'.$key.'" value="'.$key.'">'.$row.'</option>';
			}
 
		}
		
		return $data;
	}
	
	
	////
	
	
	function group_is_admin($id)
	{
	
		$query = $this->db->get_where('groups', array('id' => $id));
		$groups = $query->row();
		if($groups->type == 'admin')
		{
			return true;
		}
		if($groups->type == 'user')
		{
			return false;
		}
	
	}
	
	
	function show_admin_blocks()
	{
	
		$query = $this->db->get_where('modules', array('status' => 'active'));
		$modules = $query->result_array();
	

		foreach($modules as $item)
		{
			$this->load->model($item['name'].'/'.$item['name'].'_blocks_m');
			//$this->$item['name'] = $this->$item['name'].'_blocks_m';
			$this->lang->load($item['name'].'/'.$item['name'].'_admin_block', $this->Admin_Language);
			$blocks_m = $item['name'].'_blocks_m';
			$this->$blocks_m->show_admin_blocks();
		}

	}
	
	function no_id_array($array)
	{
		$i = 0;
		foreach($array as $item)
		{
			unset($array[$i]);
			$array[$item] = $item;
			$i++;
		}
		return $array;
	}
	
	


}