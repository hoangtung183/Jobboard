<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="adminForm" method="post" action="?option=com_pos&view=itable">
	
    <fieldset class="adminform">
    	<legend> Thông tin Item </legend>
        <table class="admintable table"> 
				<tr>
					<td class="key"><?php echo "Ten Item" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="name" id="name" value="<?php echo $this->row->name; ?>" size="50" maxlength="250" /></td>
				</tr>
				<?php  /*<tr>
				 <td class="key"><?php echo "The loai" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="name" id="name" value="<?php echo $this->row->name; ?>" size="50" maxlength="250" /></td>
				</tr> */ ?>
					<tr>
					<td class="key"><?php echo "email" ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="email" id="name" value="<?php echo $this->row->email; ?>" size="50" maxlength="250" /></td>
				</tr>
				
				
		</table>
    </fieldset>
    <?php /*  <input type="hidden" name="task" /> */ ?>
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<input type="hidden" name="option" value="com_pos" />
	<input type="hidden" name="view" value="itable" />
	<input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>
          
</body>
</html>
