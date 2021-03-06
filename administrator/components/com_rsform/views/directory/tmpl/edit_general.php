<?php
/**
* @version 1.4.0
* @package RSform!Pro 1.4.0
* @copyright (C) 2007-2013 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die('Restricted access'); ?>

<table width="100%" class="com-rsform-table-props">
	<tr>
		<td width="25%" nowrap="nowrap" align="right" class="key"><?php echo JText::_('JSTATUS'); ?></td>
		<td>
			<?php
			$status = $this->getStatus($this->directory->formId); 
			if ($status) echo '<span class="badge badge-success">'.JText::_('RSFP_SUBM_DIR_ENABLED').'</span>';
			else echo '<span class="badge badge-important">'.JText::_('RSFP_SUBM_DIR_DISABLED').'</span>';
			?>
		</td>
	</tr>
	<tr>
		<td width="25%" nowrap="nowrap" align="right" class="key"><?php echo JText::_('RSFP_SUBM_DIR_CAN_EDIT'); ?></td>
		<td>
			<div class="control-group">
				<div class="controls">
					<label for="own" class="checkbox">
						<input type="checkbox" id="own" value="own" name="jform[groups][]" <?php if (in_array('own',$this->directory->groups)) echo 'checked="checked"'; ?> />
						<?php echo JText::_('RSFP_SUBM_DIR_EDIT_OWN_SUBMISSIONS'); ?>
					</label>
				</div>
			</div>
			<?php echo JHtml::_('access.usergroups', 'jform[groups]', $this->directory->groups, true); ?>
		</td>
	</tr>
	<tr>
		<td width="25%" nowrap="nowrap" align="right" class="key"><?php echo JText::_('RSFP_SUBM_DIR_ENABLE_PDF_SUPPORT'); ?></td>
		<td>
			<?php echo $this->lists['enablepdf']; ?>
		</td>
	</tr>
	<tr>
		<td width="25%" nowrap="nowrap" align="right" class="key"><?php echo JText::_('RSFP_SUBM_DIR_ENABLE_CSV_SUPPORT'); ?></td>
		<td>
			<?php echo $this->lists['enablecsv']; ?>
		</td>
	</tr>
</table>