<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
/*<!--
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
 }*/
</script>
</head>
<body>
 <form name="adminForm" method="post" enctype="multipart/form-data" action="index.php?option=com_jobboard3i&view=postjobs">
  <fieldset class="adminform">
   <legend>
   <?php echo JText::_('THONGTINCONGTY')?>
   </legend>
   <table class="admintable table">
    <tr>
     <td class="key"><?php echo JText::_("CONGTY") ?></td>
     <td><input class="text_area k2TitleBox" type="text" name="name"
      id="name" value="<?php echo $this->row->name; ?>" size="50"
      maxlength="250" /></td>
    </tr>
    <tr>
     <td class="key"><?php// echo JText::_("NGAYTHANHLAP")?></td>
     <td>
         <?php //echo JHTML::_('calendar', $this->row->date_founding, 'date_founding', 'date_founding', $format = '%Y-%m-%d',array('class' => 'inputbox', 'size' => '20', 'maxlength' => '250')); ?>
     </td>
    </tr>
    <!--<tr>
     <td class="key"><?php echo JText::_("LOAIHINHCONGTY")?></td>
     <td><input class="text_area k2TitleBox" type="text"
      name="company_type" id="company_type"
      value="<?php echo $this->row->company_type; ?>" size="50"
      maxlength="250" /></td>
    </tr>
    <tr>
     <td class="key"><?php echo JText::_("SOLUONGNHANVIEN")?></td>
     <td><input class="text_area k2TitleBox" type="text"
      name="number_employees" id="number_employees"
      value="<?php echo $this->row->number_employees; ?>" size="50"
      maxlength="250" /></td>
    </tr>
    <tr>
     <td class="key"><?php echo JText::_("TRUSOCHINH")?></td>
     <td><input class="text_area k2TitleBox" type="text"
      name="headquarters_city" id="headquarters_city"
      value="<?php echo $this->row->headquarters_city; ?>" size="50"
      maxlength="250" /></td>
    </tr>
    <tr>
     <td class="key"><?php echo JText::_("DOANHTHUCONGTY")?></td>
     <td><input class="text_area k2TitleBox" type="text"
      name="revenue" id="revenue"
      value="<?php echo $this->row->revenue; ?>" size="50"
      maxlength="250" /></td>
    </tr>
   
    <tr>
     <td class="key"><?php echo JText::_("LIENHE")?></td>
     <td><input class="text_area k2TitleBox" type="text"
      name="contact" id="contact"
      value="<?php echo $this->row->contact; ?>" size="50"
      maxlength="250" /></td>
    </tr>
    <tr>
     <td class="key"><?php echo JText::_("ANHDAIDIEN")?></td>
     <td><input class="text_area k2TitleBox" type="text"
      name="logo" id="logo"
      value="<?php echo $this->row->logo; ?>" size="50"
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
     <td class="key"><?php echo JText::_("TRANGTHAI")?></td>
     <td><input class="text_area k2TitleBox" type="text"
      name="description" id="description"
      value="<?php echo $this->row->description; ?>" size="50"
      maxlength="250" /></td>
    </tr>
    <tr>
     <td class="key"><?php echo JText::_("NGAYTAO")?></td>
     <td><?php //echo JHTML::_('calendar', $this->row->create_date, 'create_date', 'create_date', $format = '%Y-%m-%d',array('class' => 'inputbox', 'size' => '20', 'maxlength' => '250')); ?>
     </td>
    </tr>
    <tr>
     <td colspan="2"> <?php echo $this->text; ?> </td>   
    </tr>-->
       <tr>
           <td><input type="submit" value="submit"/></td>
       </tr>
   </table>
  </fieldset>
  
  <input type="hidden" name="update_date" value="<?php echo JFactory::getDate()->toSql() ?>"></input>
  <input type="hidden" name="id" value="<?php echo $this->row->id; ?>" /> 
  <input type="hidden" name="option" value="com_jobboard3i" /> 
  <input type="hidden" name="view" value="postjobs" /> 
  <input type="hidden" name="task" value="postjobs.save" />
  <input type="hidden" name="boxchecked" value="0" />
  <?php echo JHTML::_('form.token'); 
  ?>
  
 </form>
</body>
</html>