<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
		
</head>
<body>	
	
	<form name="adminForm" method="post" action="index.php">	
			<div >
				 <table >
					    <tr>
					      <td style="width:90%;">
							<?php echo JText::_('Tìm kiếm:'); ?>
							<input type="text" name="search" value="<?php echo $this->lists['search'] ?>" class="text_area" title="<?php echo JText::_('K2_FILTER_BY_NAME'); ?>"/>
							<button ><?php echo JText::_('Tìm'); ?></button>
							<button ><?php echo JText::_('Làm lại'); ?></button>
					      </td>
					      <td >
					      	<?php echo $this->lists['state']; ?>
					      </td>
					    </tr>
					  </table>
					  <table class="adminlist table table-striped">
					    <thead>
					      <tr>
					        <th class="center hidden-phone">#</th>
					        <th class="center"><input id="jToggler" type="checkbox" name="toggle" value="" /></th>
					        <th><?php echo JHTML::_('grid.sort', 'Tên', 'name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?></th>
					        <th class="center hidden-phone"><?php echo JText::_('Mô tả'); ?></th>
					 <!--       <th class="center"><?php echo JHTML::_('grid.sort', 'K2_PUBLISHED', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?></th>
					 -->	<th class="center hidden-phone"><?php echo JText::_('Ngày tạo'); ?></th>
					        <th class="center hidden-phone"><?php echo JText::_('ID_Món ăn'); ?></th>
					        <th class="center hidden-phone"><?php echo JHTML::_('grid.sort', 'Id', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?></th>    
					      </tr>
					    </thead>
					    <tfoot>
					      <tr>
					        <td colspan="6"><?php echo $this->page->getListFooter(); ?></td>
					      </tr>
					    </tfoot>
					    <tbody>
					      <?php foreach ($this->rows as $key => $row): ?>
					      <tr class="row<?php echo ($key%2); ?>">
					        <td ><?php echo $key+1; ?></td>
					        <td class="k2Center center"><?php $row->checked_out = 0; echo JHTML::_('grid.checkedout', $row,$key,"category_id" ); ?></td>
					        <td><a href="<?php echo JRoute::_('index.php?option=com_pos&view=category &cid='.$row->category_id); ?>"><?php echo $row->name; ?></a></td>
					       	<td> <?php echo $row->description  ?>
					       	<td> <?php echo $row->create_time?>
					        <td ><?php echo $row->category_id; ?></td>
					        <td ><?php echo $row->flag; ?></td>
					       
					      </tr>
					      <?php endforeach; ?>
					    </tbody>
					  </table>			
			</div>
				<input type="hidden" name="option" value="com_pos" />
			  	<input type="hidden" name="view" value="<?php echo JRequest::getVar('view'); ?>" />
			  	<?php //echo JRequest::getVar('view'); ?>
			  	<input type="hidden" name="task" value="" />
			  	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
			  	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
			  	<input type="hidden" name="boxchecked" value="0" />
		  <?php echo JHTML::_( 'form.token' ); ?>
	</form>
</body>
</html>