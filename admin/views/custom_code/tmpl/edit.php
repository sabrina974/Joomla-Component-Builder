<?php
/**
 * @package    Joomla.Component.Builder
 *
 * @created    30th April, 2015
 * @author     Llewellyn van der Merwe <http://www.joomlacomponentbuilder.com>
 * @github     Joomla Component Builder <https://github.com/vdm-io/Joomla-Component-Builder>
 * @copyright  Copyright (C) 2015 - 2018 Vast Development Method. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
$componentParams = JComponentHelper::getParams('com_componentbuilder');
?>
<script type="text/javascript">
	// waiting spinner
	var outerDiv = jQuery('body');
	jQuery('<div id="loading"></div>')
		.css("background", "rgba(255, 255, 255, .8) url('components/com_componentbuilder/assets/images/import.gif') 50% 15% no-repeat")
		.css("top", outerDiv.position().top - jQuery(window).scrollTop())
		.css("left", outerDiv.position().left - jQuery(window).scrollLeft())
		.css("width", outerDiv.width())
		.css("height", outerDiv.height())
		.css("position", "fixed")
		.css("opacity", "0.80")
		.css("-ms-filter", "progid:DXImageTransform.Microsoft.Alpha(Opacity = 80)")
		.css("filter", "alpha(opacity = 80)")
		.css("display", "none")
		.appendTo(outerDiv);
	jQuery('#loading').show();
	// when page is ready remove and show
	jQuery(window).load(function() {
		jQuery('#componentbuilder_loader').fadeIn('fast');
		jQuery('#loading').hide();
	});
</script>
<div id="componentbuilder_loader" style="display: none;">
<form action="<?php echo JRoute::_('index.php?option=com_componentbuilder&layout=edit&id='. (int) $this->item->id . $this->referral); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">

	<?php echo JLayoutHelper::render('custom_code.details_above', $this); ?>
<div class="form-horizontal">

	<?php echo JHtml::_('bootstrap.startTabSet', 'custom_codeTab', array('active' => 'details')); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'custom_codeTab', 'details', JText::_('COM_COMPONENTBUILDER_CUSTOM_CODE_DETAILS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('custom_code.details_left', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('custom_code.details_right', $this); ?>
			</div>
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('custom_code.details_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php if ($this->canDo->get('custom_code.delete') || $this->canDo->get('custom_code.edit.created_by') || $this->canDo->get('custom_code.edit.state') || $this->canDo->get('custom_code.edit.created')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'custom_codeTab', 'publishing', JText::_('COM_COMPONENTBUILDER_CUSTOM_CODE_PUBLISHING', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('custom_code.publishing', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('custom_code.publlshing', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php endif; ?>

	<?php if ($this->canDo->get('core.admin')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'custom_codeTab', 'permissions', JText::_('COM_COMPONENTBUILDER_CUSTOM_CODE_PERMISSION', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<fieldset class="adminform">
					<div class="adminformlist">
					<?php foreach ($this->form->getFieldset('accesscontrol') as $field): ?>
						<div>
							<?php echo $field->label; echo $field->input;?>
						</div>
						<div class="clearfix"></div>
					<?php endforeach; ?>
					</div>
				</fieldset>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php endif; ?>

	<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	<div>
		<input type="hidden" name="task" value="custom_code.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	</div>
</div>

<div class="clearfix"></div>
<?php echo JLayoutHelper::render('custom_code.details_under', $this); ?>
</form>
</div>

<script type="text/javascript">

// #jform_target listeners for target_vvvvwab function
jQuery('#jform_target').on('keyup',function()
{
	var target_vvvvwab = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwab(target_vvvvwab);

});
jQuery('#adminForm').on('change', '#jform_target',function (e)
{
	e.preventDefault();
	var target_vvvvwab = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwab(target_vvvvwab);

});

// #jform_target listeners for target_vvvvwac function
jQuery('#jform_target').on('keyup',function()
{
	var target_vvvvwac = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwac(target_vvvvwac);

});
jQuery('#adminForm').on('change', '#jform_target',function (e)
{
	e.preventDefault();
	var target_vvvvwac = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwac(target_vvvvwac);

});

// #jform_target listeners for target_vvvvwad function
jQuery('#jform_target').on('keyup',function()
{
	var target_vvvvwad = jQuery("#jform_target input[type='radio']:checked").val();
	var type_vvvvwad = jQuery("#jform_type input[type='radio']:checked").val();
	vvvvwad(target_vvvvwad,type_vvvvwad);

});
jQuery('#adminForm').on('change', '#jform_target',function (e)
{
	e.preventDefault();
	var target_vvvvwad = jQuery("#jform_target input[type='radio']:checked").val();
	var type_vvvvwad = jQuery("#jform_type input[type='radio']:checked").val();
	vvvvwad(target_vvvvwad,type_vvvvwad);

});

// #jform_type listeners for type_vvvvwad function
jQuery('#jform_type').on('keyup',function()
{
	var target_vvvvwad = jQuery("#jform_target input[type='radio']:checked").val();
	var type_vvvvwad = jQuery("#jform_type input[type='radio']:checked").val();
	vvvvwad(target_vvvvwad,type_vvvvwad);

});
jQuery('#adminForm').on('change', '#jform_type',function (e)
{
	e.preventDefault();
	var target_vvvvwad = jQuery("#jform_target input[type='radio']:checked").val();
	var type_vvvvwad = jQuery("#jform_type input[type='radio']:checked").val();
	vvvvwad(target_vvvvwad,type_vvvvwad);

});

// #jform_type listeners for type_vvvvwae function
jQuery('#jform_type').on('keyup',function()
{
	var type_vvvvwae = jQuery("#jform_type input[type='radio']:checked").val();
	var target_vvvvwae = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwae(type_vvvvwae,target_vvvvwae);

});
jQuery('#adminForm').on('change', '#jform_type',function (e)
{
	e.preventDefault();
	var type_vvvvwae = jQuery("#jform_type input[type='radio']:checked").val();
	var target_vvvvwae = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwae(type_vvvvwae,target_vvvvwae);

});

// #jform_target listeners for target_vvvvwae function
jQuery('#jform_target').on('keyup',function()
{
	var type_vvvvwae = jQuery("#jform_type input[type='radio']:checked").val();
	var target_vvvvwae = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwae(type_vvvvwae,target_vvvvwae);

});
jQuery('#adminForm').on('change', '#jform_target',function (e)
{
	e.preventDefault();
	var type_vvvvwae = jQuery("#jform_type input[type='radio']:checked").val();
	var target_vvvvwae = jQuery("#jform_target input[type='radio']:checked").val();
	vvvvwae(type_vvvvwae,target_vvvvwae);

});



jQuery('#adminForm').on('change', '#jform_function_name',function (e)
{
	e.preventDefault();
	var target = jQuery("#jform_target input[type='radio']:checked").val();
	if (target == 2) {
		jQuery('#usedin').show();
		var functioName = jQuery('#jform_function_name').val();
		// check if this function name is taken
		checkFunctionName(functioName);
	} else {
		jQuery('#usedin').hide();
	}
});
jQuery('#adminForm').on('change', '#jform_target',function (e)
{
	e.preventDefault();
	var target = jQuery("#jform_target input[type='radio']:checked").val();
	if (target == 2) {
		jQuery('#usedin').show();
		var functioName = jQuery('#jform_function_name').val();
		// check if this function name is taken
		checkFunctionName(functioName);
	} else {
		jQuery('#usedin').hide();
	}
});
jQuery('#adminForm').on('change', '#jform_comment_type',function (e)
{
	e.preventDefault();
	var type = jQuery("#jform_comment_type input[type='radio']:checked").val();
	if (type == 2) {
		jQuery('#html-comment-info').show();
		jQuery('#phpjs-comment-info').hide();
	} else {
		jQuery('#html-comment-info').hide();
		jQuery('#phpjs-comment-info').show();
	}
});

// nice little dot trick :)
jQuery(document).ready( function($) {
  var x=0;
  setInterval(function() {
	var dots = "";
	x++;
	for (var y=0; y < x%8; y++) {
		dots+=".";
	}
	$(".loading-dots").text(dots);
  } , 500);
});
</script>
