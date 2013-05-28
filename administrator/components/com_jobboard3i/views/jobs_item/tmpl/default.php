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
<?php 
defined('_JEXEC') or die('Restricted access');
require_once (JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'adminui.php');

AdminLGUIHelper::startAdminArea (); 
JToolBarHelper::title(JText::_('COMPONENT')." ".JText::_('JOBBOARD3I'), 'head vm_tax_48');
?>
	<form name="adminForm" method="post" enctype="multipart/form-data" action="index.php">
		<fieldset class="adminform">
			<legend>
			<?php echo JText::_('THONGTINCONGVIEC')?>
			</legend>
			<table class="admintable table">
				<tr>
					<td class="key"><?php echo JText::_("TENCONGVIEC") ?></td>
					<td><input class="text_area k2TitleBox" type="text" name="name"
						id="name" value="<?php echo $this->row->name; ?>" size="50"
						maxlength="250" /></td>
				</tr>
				<tr>
					<td class="key"><?php echo JText::_("DIACHI")?></td>
					<td><input class="text_area k2TitleBox" type="text"
						name="address" id="address"
						value="<?php echo $this->row->address; ?>" size="50"
						maxlength="250" /></td>
				</tr>
				<tr>
					<td class="key"><?php echo JText::_("MOTA")?></td>
					<td><input class="text_area k2TitleBox" type="text"
						name="description" id="description"
						value="<?php echo $this->row->description; ?>" size="50"
						maxlength="250" /></td>
				</tr>
				<tr> <td class="key"><?php echo JText::_("CONGTY")?></td>
					 <td class="key"></td>
				</tr>
				<tr>
					<td class="key"><?php echo JText::_("NGONNGU")?></td>
					<td><select name="ngonngu">
								<option value='-1'>
								<?php echo JText::_('NGONNGU')?>
								</option>
								<option value="1">
								<?php echo JText::_('VIETNAM')?>
								</option>
								<option value="2">
								<?php echo JText::_('Englist')?>
								</option>
						</select></td>
				</tr>
				<tr>
					<td><?php echo JText::_('NGAYTAO')?>
					</td>
					<td><?php echo JHTML::_('calendar', $this->row->create_date, 'create_date', 'create_date', $format = '%Y-%m-%d',array('class' => 'inputbox', 'size' => '20', 'maxlength' => '250')); ?>
					</td>
				</tr>
				<tr>
					<td class="key"><?php echo JText::_("TRANGTHAI")?></td>
					<td><input class="text_area k2TitleBox" type="text" name="flag"
						id="flag" value="<?php echo $this->row->flag; ?>" size="50"
						maxlength="250" /></td>

				</tr>
				
				<?php if($this->rows){?>
					<?php foreach ($this->rows as $key => $image): ?>
					<tr class="image<?php echo ($key%2); ?>">
						<td class="center hidden-phone"><img src="<?php echo JURI::root(true).'/media/pos/items/'.$image->name ?>" width="50px" height="50px" ></img> </td>
						<td class="center hidden-phone"><?php $row->checked_out = 0; echo JHTML::_('grid.checkedout', $image,$key,"media_id" ); ?></td>
					</tr>
					
					<?php endforeach; 
				 }?>
			</table>
		</fieldset>
		
		<input type="hidden" name="update_time" value="<?php echo JFactory::getDate()->toSql() ?>"></input>
		<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" /> 
		<input type="hidden" name="option" value="com_jobboard3i" /> 
		<input type="hidden" name="view" value="jobs_item" /> 
		<input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_('form.token'); 
		?>
	</form>
</body>
</html>
