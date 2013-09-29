<?php
class Products extends CI_Controller{
     
    function __construct()
	{
        parent::__construct();
    }
     
    public function get_all_users(){
 
       // $query = $this->db->get('products');
       // if($query->num_rows > 0){
       
            //$output_string = "There are no results";
       // }
          
        //echo $output_string;
		
		if(isset($_POST['id']))
		{
		$this->db->where('id', $_POST['id']);
		$this->db->delete('discounts'); 
		
			
		}
		else
		{
		
		echo 'success';
		echo $this->db->affected_rows();
		}
    }
 }
?>