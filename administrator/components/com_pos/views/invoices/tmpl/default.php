<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


		<style>
		<!--
		*{margin:0; padding: 0}
		#wrapper1{width: 200px; margin: 20px auto; float:left;}
		
		#wrapper1 ul li a{
		text-decoration: none;
		font-size:13px;
		}
		#wrapper1 ul li{
	
		padding-left:20px;
		list-style: none inside;
		}
		
		#wrapper1 ul li a{
			margin: 12px auto;
			padding: 0 15px 0 4px;
			display: block;
			opacity:0.6;
		
		}
		#wrapper1 ul li a:hover{
			opacity:1;
		}
		#wrapper1 ul li a img{
			margin-left:50px;
		}
		
		
		p{
			margin: 10px 0px; padding: 5px;
			color: #363636;
		}
		h1{
			font: 17px helvetica; color: #1c6280;
			padding: 5px 0px 5px 18px;
			border-top:1px solid #dfdfdf;
			background: #eaf3fa;
		}
		-->
		</style>
		
		<?php /* <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js">
		<!--
		
		//-->
		</script>
		
		<script type="text/javascript">
		$(document).ready(function(){
			$('ul.abc').hide();
			$('h1').click(function(){
				$('div#wrapper1 ul').slideUp('normal');
				if($(this).next('div#wrapper1 ul').is(':hidden')==true){
					$(this).next('div#wrapper1 ul').slideDown('normal');
				}
			});
		});
		
			</script>*/
		?>
</head>
<body>	
	
	<form name="adminForm" method="post" action="?option=com_pos&view=invoices">
	
			<div style="width:1073px ;float:right">
				 <table >
					    <tr>
					      <td style="width:90%;">
							<?php echo JText::_('K2_FILTER'); ?>
							<input type="text" name="search" value="<?php echo $this->lists['search'] ?>" class="text_area" title="<?php echo JText::_('K2_FILTER_BY_NAME'); ?>"/>
							<button ><?php echo JText::_('K2_GO'); ?></button>
							<button ><?php echo JText::_('K2_RESET'); ?></button>
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
					       <th class="center hidden-phone"><?php echo JText::_('Vat'); ?></th>
					       <th class="center hidden-phone"><?php echo JText::_('commision'); ?></th>
					       <th class="center hidden-phone"><?php echo JText::_('inv_endtime'); ?></th>
					       <th class="center hidden-phone"><?php echo JText::_('inv_starttime'); ?></th>
					       <th class="center hidden-phone"><?php echo JText::_('user_id'); ?></th>
					       <th class="center hidden-phone"><?php echo JHTML::_('grid.sort', 'K2_ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?></th>
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
					        <td class="k2Center center"><?php $row->checked_out = 0; echo JHTML::_('grid.checkedout', $row,$key,"inv_id" ); ?></td>
					        <td ><?php echo $row->vat; ?></td>
					        <td ><?php echo $row->commision; ?></td>
					        <td ><?php echo $row->inv_endtime; ?></td>
					        <td ><?php echo $row->inv_starttime; ?></td>
					        <td ><?php echo $row->user_id; ?></td>
					        
					        <td><a href="<?php echo JRoute::_('index.php?option=com_pos&view=invoice &cid='.$row->id); ?>"><?php echo $row->name; ?></a></td>
					
					       
					        <td ><?php echo $row->inv_id; ?></td>
					      </tr>
					      <?php endforeach; ?>
					    </tbody>
					  </table>
				
			</div>
				<input type="hidden" name="option" value="com_pos" />
			  	<input type="hidden" name="view" value="<?php echo JRequest::getVar('view'); ?>" />
			  	<input type="hidden" name="task" value="" />
			  	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
			  	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
			  	<input type="hidden" name="boxchecked" value="0" />
		  <?php echo JHTML::_( 'form.token' ); ?>
	</form>
</body>
</html>