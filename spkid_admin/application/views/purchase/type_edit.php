<?php include(APPPATH.'views/common/header.php');?>
<script type="text/javascript" src="public/js/utils.js"></script>
<script type="text/javascript" src="public/js/validator.js"></script>
<script type="text/javascript" src="public/js/jui/core.min.js"></script>
<link rel="stylesheet" href="public/style/jui/theme.css" type="text/css" media="all" />
<script type="text/javascript">
	//<![CDATA[
	$(function(){
	});
	function check_form(){
		var validator = new Validator('mainForm');
			validator.required('purchase_type_name', '请填写采购类型名称');
			return validator.passed();
	}
	//]]>
</script>
<div class="main">
	<div class="main_title">编辑 <a href="purchase/type" class="back_list">返回列表</a></div>
	<div class="blank5"></div>
	<?php print form_open('purchase/proc_edit_type',array('name'=>'mainForm','onsubmit'=>'return check_form()'),array('purchase_type_id'=>$row->purchase_type_id));?>
		<table class="form" cellpadding=0 cellspacing=0>
			<tr>
				<td colspan=2 class="topTd"></td>
			</tr>
			<tr>
				<td class="item_title">采购类型名称:</td>
				<td class="item_input"><?php print form_input(array('name'=> 'purchase_type_name','class'=> 'textbox','value' => $row->purchase_type_name));?></td>
			</tr>

			<tr>
				<td class="item_title">状态:</td>
				<td class="item_input">
					<label>可用<?php print form_radio(array('name'=>'is_use','value'=>1,'checked'=>$row->is_use==1));?></label>
					<label>停用<?php print form_radio(array('name'=>'is_use','value'=>0,'checked'=>$row->is_use!=1));?></label>
				</td>
			</tr>
			<tr>
				<td class="item_title"></td>
				<td class="item_input">
					<?php print form_submit(array('name'=>'mysubmit','class'=>'button','value'=>'编辑'));?>
				</td>
			</tr>
			<tr>
				<td colspan=2 class="bottomTd"></td>
			</tr>
		</table>
	<?php print form_close();?>
</div>
<?php include(APPPATH.'views/common/footer.php');?>