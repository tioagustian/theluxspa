<link rel="stylesheet" type="text/css" href="<?= base_url('files/bower_components/bootstrap/css/bootstrap.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('files/assets/css/style.css');?>">
<script type="text/javascript" src="<?= base_url('files/bower_components/jquery/js/jquery.min.js');?>"></script>
<?php

	// $this->set_css($this->default_theme_path.'/datatables/css/datatables.css');

    $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js_config($this->default_theme_path.'/datatables/js/datatables-edit.js');
	$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<script type="text/javascript" src="<?= base_url('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js');?>"></script>
<script type="text/javascript" src="<?= base_url('files/bower_components/bootstrap/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('files/assets/js/pcoded.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('files/assets/js/vertical/vertical-layout.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('files/assets/js/script.js');?>"></script>
<style type="text/css">
	.even {
		background-color: #fff;
	}
	.odd {
		background-color: #e1f5fe;
	}
	.form-group {
		margin-bottom: 0 !important;
		padding: 0.50rem;
	}
	input, select {
		background-color: rgba(0,0,0,0);
	}
</style>
<div class=''>
	<h3 class="">
		<div class=''>
			<a href="#"><?php echo $this->l('form_edit'); ?> <?php echo $subject?></a>
		</div>
		<div class='clear'></div>
	</h3>
<div class='form-content form-div'>
	<?php echo form_open( $update_url, 'method="post" id="crudForm" enctype="multipart/form-data" class=""'); ?>
		<?php
			$counter = 0;
			foreach($fields as $field)
			{
				$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
				$counter++;
		?>
			<div class='form-group row <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
				<label class="col-sm-2 col-float-label"><?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?></label>
				<div class="col-sm-10">
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
			</div>
		<?php }?>
			<!-- Start of hidden inputs -->
				<?php
					foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
			<!-- End of hidden inputs -->
			<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
			<div class='line-1px'></div>
			<div id='report-error' class='report-div error'></div>
			<div id='report-success' class='report-div success'></div>
		</div>
		<div class='row'>
			<div class="col-sm-6">
				<div class="row">
					<div class='col-sm-4'>
					<input  id="form-button-save" type='submit' value='<?php echo $this->l('form_update_changes'); ?>' class=' btn btn-success' />
					</div>
					<?php 	if(!$this->unset_back_to_list) { ?>
					<div class='col-sm-4'>
						<input type='button' value='<?php echo $this->l('form_update_and_go_back'); ?>' class='btn btn-primary' id="save-and-go-back-button"/>
					</div>
					<div class='col-sm-4'>
						<input type='button' value='<?php echo $this->l('form_cancel'); ?>' class=' btn btn-warning' id="cancel-button" />
					</div>
					<?php }?>
					<div class='form-button-box loading-box'>
						<!-- <div class='small-loading' id='FormLoading'><?php echo $this->l('form_update_loading'); ?></div> -->
					</div>
				</div>
			</div>
			<div class="col-sm-6"></div>
	</form>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>