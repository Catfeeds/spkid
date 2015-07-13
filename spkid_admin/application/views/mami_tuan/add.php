<?php include(APPPATH.'views/common/header.php'); ?>
	<script type="text/javascript" src="public/js/listtable.js"></script>
	<script type="text/javascript" src="public/js/utils.js"></script>
	<script type="text/javascript" src="public/js/jui/core.min.js"></script>
	<script type="text/javascript" src="public/js/jui/datepicker.min.js"></script>
	<link rel="stylesheet" href="public/style/jui/theme.css" type="text/css" media="all" />
	<link rel="stylesheet" href="public/style/jui/datepicker.css" type="text/css" media="all" />
	<script type="text/javascript" src="public/js/validator.js"></script>
    <script type="text/javascript">
		$(function(){
			$('input[type=text][name=start_date]').datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true, nextText:'', prevText:''});
			$('input[type=text][name=end_date]').datepicker({dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true, nextText:'', prevText:''});
		});
		
		function check_search(){
			var product_sn = $.trim($('input[type=text][name=product_sn]').val());
	        if (product_sn == ''){
				return false;
			}
			return ture;
		}
		
		function check_add(){
			var validator = new Validator('mainForm');
			validator.required('tuan_name', '请填写团购名称');
			validator.selected('tuan_price', '请填写团购价格');
			validator.required('start_date', '请填写开始时间');
			validator.required('start_time', '请填写开始时间');
			validator.required('end_date', '请填写结束时间');
			validator.required('end_time', '请填写结束时间');
			return validator.passed();
		}
	</script>
	<div class="main">
		<div class="main_title"><span class="l">妈咪团管理 &gt;&gt; 新增妈咪团</span><span class="r">[ <a href="/mami_tuan">返回列表 </a>]</span></div>
		<div class="produce">
		<div class="pc base">
		<form name="goodsSearch" action="/mami_tuan/add" method="post" onsubmit="return check_search()">
			<div class="search_row">
				商品款号：<input type="text" class="tl" name="product_sn" value="<?php if($product) print $product->product_sn;?>" />
				<input type="submit" class="button" value="载入" />
			</div>
		</form>
		<div class="blank5"></div>
		<!-- 团购信息填写开始 -->
		<div id="listDiv">
			<?php if($product):?>
			<?php print form_open_multipart('mami_tuan/post_add',array('name'=>'mainForm','onsubmit'=>'return check_add()'));?>
				<input type="hidden" name="product_id" value="<?php print $product->product_id; ?>" />
				<table class="form" cellpadding=0 cellspacing=0>
					<tr>
						<td colspan=4 class="topTd"></td>
					</tr>
					<tr>
						<td class="item_title">商品名称：</td>
						<td class="item_input">
							<input name="product_name" type="text" class="textbox" disabled="disabled" value="<?php print $product->product_name; ?>"/>
						</td>
					</tr>
					<tr>
						<td class="item_title">团购名称：</td>
						<td class="item_input">
							<textarea rows="3" cols="50" name="tuan_name"></textarea>
							最多只能输入48个汉字。<span style="color:red">（温馨提示：1个汉字=2个字符，1个字母=1个字符）</span>
						</td>
					</tr>
					<tr>
					  <td class="item_title">团购价格：</td>
					  <td class="item_input">
						<input name="tuan_price" type="text" class="textbox require" value="<?php print $product->shop_price; ?>"/>
						输入价格。
					  </td>
					</tr>
					<tr>
						<td class="item_title">开始时间:</td>
						<td class="item_input">
							<input name="start_date" type="text" class="textbox require" />
							<input name="start_time" type="text" value="14:00:00" class="textbox require" />
						</td>
					</tr>
					<tr>
						<td class="item_title">结束时间:</td>
						<td class="item_input">
							<input name="end_date" type="text" class="textbox require" />
							<input name="end_time" type="text" value="23:59:59" class="textbox require" />
						</td>
					</tr>
					<tr>
						<td class="item_title">购买人数：</td>
						<td class="item_input">
							<input name="buy_num" type="text" class="textbox" />
							输入数字。
						</td>
					</tr>
					<tr>
						<td class="item_title">排序:</td>
						<td class="item_input">
							<input name="tuan_sort" type="text" class="textbox" size="3" value="0" />
							同一天开始的排序值高的在前
						</td>
					</tr>
					<tr>
						<td class="item_title">商品图：</td>
						<td class="item_input">
							<input name="img_315_207" type="file" class="textbox require" />请上传指定规格（315*207）图片
						</td>
					</tr>
					<tr>
						<td class="item_title">商品详情图:</td>
						<td class="item_input">
							<input name="img_500_450" type="file" class="textbox require" />请上传指定规格（500*450）图片
						</td>
					</tr>
					<tr>
						<td class="item_title">最近浏览图:</td>
						<td class="item_input">
							<input name="img_168_110" type="file" class="textbox require" />请上传指定规格（168*110）图片
						</td>
					</tr>
					<tr>
						<td class="item_title">购买需知：</td>
						<td class="item_input"><?php print $this->ckeditor->editor('tuan_desc',"",array('width'=>750,'height'=>180));?></td>
					</tr>
					<tr>
						<td class="item_title">头部描述：</td>
						<td class="item_input"><?php print $this->ckeditor->editor('userdefine1',"",array('width'=>750,'height'=>180));?></td>
					</tr>
					<tr>
						<td class="item_title">中部描述:</td>
						<td class="item_input"><?php print $this->ckeditor->editor('userdefine2',"",array('width'=>750,'height'=>180));?></td>
					</tr>
					<!--
					<tr>
						<td class="item_title">底部描述：</td>
						<td class="item_input"><?php //print $this->ckeditor->editor('userdefine3',"",array('width'=>750,'height'=>180));?></td>
					</tr>
					-->
					<tr>
						<td class="item_title">商品详情右上角描述:</td>
						<td class="item_input"><?php print $this->ckeditor->editor('userdefine4',"",array('width'=>750,'height'=>180));?></td>
					</tr>	  
					<tr>
						<td class="item_title"></td>
						<td class="item_input" colspan=3>
							<?php print form_submit(array('name'=>'mysubmit','class'=>'button','value'=>'提交'));?>
						</td>
					</tr>
					<tr>
						<td colspan=4 class="bottomTd"></td>
					</tr>
				</table>
			<?php print form_close();?>
			<?php endif;?>
		</div>
		</div></div>
	</div>
<?php include_once(APPPATH.'views/common/footer.php'); ?>