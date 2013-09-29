<script>
function load()
{


$(document).ready(function(){

		//  Get the parameter value after the # symbol
    var url=document.URL.split('#')[1];
    if(url == undefined){
        url = '';
    }
	
	 if(url != ''){
       //Default Action
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li").removeClass("activeTab"); //DeActivate first tab
		$('li.'+url).addClass("activeTab"); //Activate module tab
		$('#'+url).show(); //Show first tab content
    }
 

		
		
	
		

});
}
</script>
 

<body onload="load()">

<!-- Form with validation -->
<form action="<? echo base_url().'admin/products/edit/'.$id; ?>" name="myForm" id="valid" class="mainForm" method="post">


<div class="widget">   
<ul class="tabs">
<li class="details"><a href="#details">Details</a></li>
<li class="module"><a href="#module">Module</a></li>
<li class="prices"><a href="#prices">Prices</a></li>
</ul>
<div class="tab_container">
<div id="details" class="tab_content">   
         

<fieldset>

<!------------------------------------------------------->
<div class="rowElem noborder">
<label><?=$this->lang->line('title')?> :</label>
<div class="formRight">
<input type="text" class="validate[required]" name="title" id="title" value="<?=$title?>" />
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('group_id')?> :</label>
<div class="formRight">
<select name="group_id">
<?=$group_id?>
</select>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('description')?> :</label>
<div class="formRight">
<textarea name="description" id="description"  />
<?=$description?>
</textarea>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('welcome_email_id')?> :</label>
<div class="formRight">
<select name="welcome_email_id" >
<?=$welcome_email_id?>
</select>
</div>
<div class="fix"></div>
</div>


<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('showdomainoptions')?> :</label>
<div class="formRight">
<?=$showdomainoptions?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('hidden')?> :</label>
<div class="formRight">
<?=$hidden?>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->
</fieldset>
</div>


<div id="module" class="tab_content">   
         
<fieldset>


<!------------------------------------------------------->
<div class="rowElem">
<label><?=$this->lang->line('server_id')?> :</label>
<div class="formRight">
<select name="server_id" onchange="this.form.submit()" >
<?=$server_id?>
</select>
</div>
<div class="fix"></div>
</div>
<!------------------------------------------------------->

<?=$server_type_options?>

<!------------------------------------------------------->








</div>	


<div id="prices" class="tab_content">   
<fieldset>


<?php foreach ($prices['prices'] as $item):?>

<!------------------------------------------------------->

<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
<tbody>
<!------------------------------------------------------->
<tr>
<td>
cycle
</td>
<td>
setup
</td>
<td>
price
</td>           
</tr>
<!------------------------------------------------------->
<tr>
<td>
monthly
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][msetupfee]" value="<?=$item['msetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][monthly]" value="<?=$item['monthly']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
quarterly
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][qsetupfee]" value="<?=$item['qsetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][quarterly]" value="<?=$item['quarterly']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
semiannually
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][ssetupfee]" value="<?=$item['ssetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][semiannually]" value="<?=$item['semiannually']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
annually
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][asetupfee]" value="<?=$item['asetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][annually]" value="<?=$item['annually']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
biennially
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][bsetupfee]" value="<?=$item['bsetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][biennially]" value="<?=$item['biennially']?>" />
</td>          
</tr>
<!------------------------------------------------------->
<tr>
<td>
triennially
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][tsetupfee]" value="<?=$item['tsetupfee']?>" />
</td>
<td>
<input style="direction:ltr" type="text" name="update[<?=$item['id']?>][triennially]" value="<?=$item['triennially']?>" />
</td>          
</tr>
</tbody>
</table>   

<!------------------------------------------------------->


<?php endforeach;?>

</fieldset>
</div>

<!------------------------------------------------------->
<input type="submit" name="form_submit" id="form_submit" value="<? echo $this->lang->line('save_form'); ?>" class="greenBtn submitForm" />
<input type="reset" id="reset" value="<? echo $this->lang->line('reset_form'); ?>" class="basicBtn submitForm" />
<br />
<!------------------------------------------------------->
<div class="fix"></div>
</div>
<!------------------------------------------------------->
</fieldset>
</form>   
<!-- Form -->

<div class="fix"></div>	 
</div>

</body>