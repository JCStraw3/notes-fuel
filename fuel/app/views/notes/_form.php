<?php echo Form::open(array("class" => "form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label(null, 'title', array('class' => 'control-label')); ?>
			<?php echo Form::input('title', '', array('placeholder' => 'Title')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label(null, 'body', array('class' => 'control-label')); ?>
			<?php echo Form::textarea('body', '', array('placeholder' => 'Body')); ?>
		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>

<?php echo Form::close(); ?>