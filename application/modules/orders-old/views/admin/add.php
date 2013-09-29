<script>
var i=2;
function add_row()
{

$('#products_append').append('<div class="widget"><div class="head"><h5 class="iAdd"><?=$this->lang->line('adding_new_order')?></h5></div><div class="rowElem"><label><?=$this->lang->line('product')?> :</label><div class="formRight"><select name="product_id" id="product_id" onchange="get_data()"><? echo $product_id; ?></select></div><div class="formLeft" id="product_price">price:</div><div class="fix"></div></div><div class="rowElem"><label><?=$this->lang->line('payment_type')?> :</label><div class="formRight"><?=$payment_type_free?><?=$payment_type_onetime?><?=$payment_type_recurring?></div><div class="fix"></div></div><div class="rowElem" id="billing_cycle-div"><label><?=$this->lang->line('billing_cycle')?> :</label><div class="formRight"><select name="billing_cycle" id="billing_cycle" onchange="get_data()"><? echo $billing_cycle; ?></select></div><div class="fix"></div></div><div class="rowElem"><label><?=$this->lang->line('sub_total')?> :</label><div class="formRight"><input type="text" name="sub_total" id="sub_total" /></div><div class="fix"></div></div><div class="fix"></div></div>');

i++;

}


function show_bcycle()
{	
	$('#billing_cycle-div').show('slow');
}

function hide_bcycle()
{	
	$('#billing_cycle-div').hide('slow');
}

function get_data()
{
	
	var id = $("#product_id option:selected").val();
	
	var bcycle = $("#billing_cycle option:selected").val();
	
	var radio = $("input[type='radio']:checked").val();
	
	var form = document.forms['valid'];

	$.post("<?php echo base_url().'orders/admin/add/get_product_price?id='?>"+id+'&bcycle='+bcycle+'&radio='+radio, 
		function(data) 
		{
			form.elements["sub_total"].value = data;
 		}
	);
	
}


function load1()
{
	var myObj = document.getElementById("product_id");
	var id = myObj.options[selectedIndex].id;
	$.post("<?php echo base_url().'orders/admin/add/get_product_price?id='?>"+id+'&bcycle='+bcycle, 
		function(data) 
		{
			$('#price').show();
			$('#price').append(data);
 		}
	);
	
}

function load()
{
	
	var id = $("#product_id option:selected").val();
	
	var bcycle = $("#billing_cycle option:selected").val();
	
	var radio = $("input[type='radio']:checked").val();



	
	var form = document.forms['valid'];
	
	$.post("<?php echo base_url().'orders/admin/add/get_product_price?id='?>"+id+'&bcycle='+bcycle+'&radio='+radio, 
		function(data) 
		{
			form.elements["sub_total"].value = data;
 		}
	);
	
}




</script>
<body onload="load()">
<!-- Form with validation -->
<form action="<? echo base_url().'admin/orders/add'; ?>" id="valid" class="mainForm" method="post">
<fieldset>
<div class="widget"> 
<div class="head"><h5 class="iAdd"><?=$this->lang->line('adding_new_order')?></h5></div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('username')?> :</label>
<div class="formRight">
<select name="user_id">
<? echo $user_id; ?>
</select>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('gateway')?> :</label>
<div class="formRight">
<select name="gateway_id">
<? echo $gateway_id; ?>
</select>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->

<div class="fix"></div>
</div>



<div class="widget"> 
<div class="head"><h5 class="iAdd"><?=$this->lang->line('adding_new_order')?></h5></div>

<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('product')?> :</label>
<div class="formRight">
<select name="product_id" id="product_id" onchange="get_data()">
<? echo $product_id; ?>
</select>
</div>
<div class="formLeft" id="product_price">price:</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('payment_type')?> :</label>
<div class="formRight">
<?=$payment_type_free?>
<?=$payment_type_onetime?>
<?=$payment_type_recurring?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem" id="billing_cycle-div">
<label><?=$this->lang->line('billing_cycle')?> :</label>
<div class="formRight">
<select name="billing_cycle" id="billing_cycle" onchange="get_data()">
<? echo $billing_cycle; ?>
</select>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('sub_total')?> :</label>
<div class="formRight">
<input type="text" name="sub_total" id="sub_total" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="fix"></div>
</div>



<div id="products_append">
</div>
<!------------------------------------------------------->
<input type="submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
<input type="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
<br />

</fieldset>
</form>   
<!-- Form -->

        
<a href="javascript:void(0);" onclick="add_row()" >Details</a>

</body>