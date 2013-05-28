<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
<!--
	function _add_more() {
		var txt = "<br><input type=\"file\" name=\"item_file[]\">";
		document.getElementById("dvFile").innerHTML += txt;
	}
	function validate(f){
		var chkFlg = false;
		for(var i=0; i < f.length; i++) {
			if(f.elements[i].type=="file" && f.elements[i].value != "") {
				chkFlg = true;
			}
		}
		if(!chkFlg) {
			alert('Please browse/choose at least one file');
			return false;
		}
		f.pgaction.value='upload';
		return true;
	}
</script>
</head>
<body>
<form name="adminForm" method="post" enctype="multipart/form-data" action="index.php">	
    <fieldset class="adminform">
    	<legend> Thông tin loại món ăn </legend>
        <table class="admintable table"> 
        	
				<tr>
					<td class="key"><?php echo "Tên loại món ăn" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="name" id="name" value="<?php echo $this->row->name; ?>" size="50" maxlength="250" /></td>
				</tr>
				<tr>
					<td class="key"><?php echo "MÃ´ :" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="description" id="description" value="<?php echo $this->row->description; ?>" size="50" maxlength="250" /></td>
					
				</tr>
					<td class="key"><?php echo "VÃ­ dá»¥:" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="category" id="category"  size="50" maxlength="250" /></td>
				
				<tr>
					
				
				</tr>
				
				<tr>
					<td>NgÃ y báº¯t Ä‘áº§u: </td>
					<td><?php echo JHTML::_('calendar', $this->row->create_time, 'create_time', 'create_time', $format = '%Y-%m-%d',array('class' => 'inputbox', 'size' => '<KÃƒÂ­ch thu?c khung>', 'maxlength' => '<S? kÃƒÂ½ t? t?i da>')); ?></td>

				</tr>
				
				<tr>
					<td> Flag:</td>
					<td>  <select name='abcd'>
								<option value='1'> 0</option>
								<option value='2'></option>
							</select></td>
				</tr>	
		</table>
		<input type="hidden" name="pgaction">
		<?php if ($GLOBALS['msg']) { echo '<center><span class="err">'.$GLOBALS['msg'].'</span></center>'; }?>
		<table align="left" cellpadding="4" cellspacing="0" bgcolor="#EDEDED">	
				<tr class="tblSubHead">
					<td colspan="2">Upload any number of file </td>
				
				</tr>
				<tr class="txt">
					<td valign="top"><div id="dvFile"><input type="file" name="item_file[]"></div></td>
					<td ><a href="javascript:_add_more();" title="Add more">ThÃƒÂªm<img src="plus_icon.gif" border="0"></a></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="submit" value="Upload File"></td>
				</tr>
		</table>
	    </fieldset>
	
		<?php /*  <input type="hidden" name="task" /> */ ?>
				<input type="hidden" name="category_id" value="<?php echo $this->row->category_id; ?>" />
				<input type="hidden" name="option" value="com_pos" />
				<input type="hidden" name="view" value="category" />
				<input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />
		<?php echo JHTML::_('form.token'); 
		?>
</form>
</body>
</html>
