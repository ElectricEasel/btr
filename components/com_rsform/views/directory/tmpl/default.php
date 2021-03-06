<?php
/**
* @version 1.4.0
* @package RSform!Pro 1.4.0
* @copyright (C) 2007-2013 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die('Restricted access');
$listOrder	= $this->escape($this->filter_order);
$listDirn	= $this->escape($this->filter_order_Dir); 
JHtml::_('behavior.tooltip'); ?>

<?php if (!RSFormProHelper::isJ('3.0')) { ?>
<style type="text/css">
table.category th { text-align:center !important; }
</style>
<?php } ?>

<?php if ($this->params->get('show_page_heading', 1)) { ?>
<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
<?php } ?>

<form action="<?php echo $this->escape(JURI::getInstance()); ?>" method="post" name="adminForm" id="adminForm">
	<div class="well well-small">
		<?php echo JText::_('RSFP_SEARCH'); ?> <input type="text" id="rsfilter" name="filter_search" value="<?php echo $this->escape($this->filter_search); ?>" onchange="document.adminForm.submit();" style="margin-bottom: 0px;" /> 
		<button type="button" class="btn btn-primary button" onclick="document.adminForm.submit();"><?php echo JText::_('RSFP_GO'); ?></button> 
		<button type="button" class="btn button" onclick="document.getElementById('rsfilter').value='';document.adminForm.submit();"><?php echo JText::_('RSFP_RESET'); ?></button>
		<?php if ($this->directory->enablecsv) { ?>
		<button onclick="downloadcsv();" type="button" class="btn button pull-right"><?php echo JText::_('RSFP_SUBM_DIR_DOWNLOAD_CSV'); ?></button>
		<?php } ?>
	</div>
	
	<div class="clearfix"></div>
	
	<?php 
		$directoryLayout = $this->loadTemplate('layout');
		eval($this->directory->ListScript);
		echo $directoryLayout;
	?>
	
	<div style="text-align: center;">
		<div class="pagination"><?php echo $this->pagination->getPagesLinks(); ?></div>
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>

	<input type="hidden" name="option" value="com_rsform" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="controller" value="directory" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
</form>

<?php if ($this->directory->enablecsv) { ?>
<script type="text/javascript">
function downloadcsv() {
	var selected = false;
	var cids = document.getElementsByName('cid[]');
	for (var i=0; i<cids.length; i++) {
		if (cids[i].checked) {
			selected = true;
			break;
		}
	}
	
	if (!selected) {
		alert('<?php echo JText::_('RSFP_SUBM_DIR_PLEASE_SELECT_AT_LEAST_ONE', true); ?>');
		return;
	}
	
	var form = document.adminForm;
	form.task.value = 'download';
	form.submit();
}
</script>
<?php } ?>