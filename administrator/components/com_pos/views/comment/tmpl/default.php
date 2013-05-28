<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>
<body>
<form name="adminForm" method="post" enctype="multipart/form-data" action="index.php">	
    <fieldset class="adminform">
    	<legend> Thông tin Bình Luận </legend>
        <table class="admintable table"> 
        	
				<tr>
					<td class="key"><?php echo "Tên Bình Luận:" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="name" id="name" value="<?php echo $this->row->name; ?>" size="50" maxlength="250" /></td>
				</tr>
				<tr>
					<td class="key"><?php echo "Nội Dung:" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="description" id="description" value="<?php echo $this->row->description; ?>" size="50" maxlength="250" /></td>
					
				</tr>
					<td class="key"><?php echo "Ngày bắt đầu:" ?></td>
					<td><?php echo JHTML::_('calendar', $this->row->create_time, 'create_time', 'create_time', $format = '%Y-%m-%d',array('class' => 'inputbox', 'size' => '<KÃƒÂ­ch thu?c khung>', 'maxlength' => '<S? kÃƒÂ½ t? t?i da>')); ?></td>
				<tr>
				</tr>
					<td class="key"><?php echo "Ngày cập nhật:" ?></td>
					<td><?php echo JHTML::_('calendar', $this->row->create_time, 'create_time', 'create_time', $format = '%Y-%m-%d',array('class' => 'inputbox', 'size' => '<KÃƒÂ­ch thu?c khung>', 'maxlength' => '<S? kÃƒÂ½ t? t?i da>')); ?></td>
				<tr>
						
				</tr>
				
				<tr>
					<td> Flag:</td>
					<td>  <select name='abcd'>
								<option value='1'> 0</option>
								<option value='2'></option>
							</select></td>
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
