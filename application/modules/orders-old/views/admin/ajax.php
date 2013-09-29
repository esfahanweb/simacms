<script type="text/javascript" language="javascript">

function get_data()
{

	$.post("<?php echo base_url().'orders/ajax/products/get_all_users';?>", function(data) {
	$('#result_table').append(data);
 	});
 
}
 
 
function post_data()
{
	$.post("<?php echo base_url().'orders/ajax/products/get_all_users';?>", { id: 1, time: "2pm" } );
	
	$.post("<?php echo base_url().'orders/ajax/products/get_all_users';?>", function(data) {
	$('#result_table').append(data);
 	});
}

</script>

<button type="button" name="getdata" id="getdata" onclick="get_data()">Get Data.</button>
 <button type="button" name="getdata" id="getdata" onclick="post_data()">Post Data.</button>
<div id="result_table"></div>