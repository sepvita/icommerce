<?php 

use yii\widgets\ActiveForm;
?>

<div class="panel">
	<div class="panel-body">
	<h4> Register </h4>
	<hr>

	<?php $f = ActiveForm::begin(); ?>
	<?php
	echo $f->field($member, 'name');
	echo $f->field($member, 'username');
	echo $f->field($member, 'password')->passwordInput();
	?>

	<div class="form-group">
		<input type="submit" value="Send Data" class="btn btn-primary"></input>
	</div>
	<?php ActiveForm::end(); ?>
	</div>
</div>