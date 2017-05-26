<?php

use yii\bootstrap\ActiveForm;
use yii\web\Session;

$session = new Session();
$session->open();
?>

<div class="panel">
	<div class="panel-body">
	<h4>
		<i class="glyphicon glyphicon-plus"> </i>
		Company Info
	</h4>
	<hr>

	<?php if (!empty($session->getFlash('message'))): ?>
	<div class="alert alert-success">
		<i class="glyphicon glyphicon-ok"> </i>
		<?php echo $session['message']; ?>
	</div>
<?php endif; ?>

<?php
$f = ActiveForm::begin([
	'action' => 'index.php?r=company/index',
	'options' => ['enctype'=>'multipart/form-data'],
	'layout' => 'horizontal',
	'fieldConfig' => [
		'horizontalCssClasses' => [
			'offset' => 'col-sm-offset-3',
			'label' => 'col-sm-2 col-md-2',
			'wrapper' => 'col-sm-9',
			'error' => '',
			'hint' => 'col-sm-3'
			]
		]
	]);
?>

<?php if (!empty($company->logo)): ?>
	<div class="form-group">
		<label class="control-label col-sm-2 col-md-2"> </label>
		<div class="col-sm-9">
			<img src="../uploads/<?php echo $company->logo; ?>" width="150px" />
		</div>
	</div>
<?php endif; ?>

<?php
echo $f->field($company, 'name');
echo $f->field($company, 'web_title');
echo $f->field($company, 'tel');
echo $f->field($company, 'email');
echo $f->field($company, 'fax');
echo $f->field($company, 'website');
echo $f->field($company, 'facebook');
echo $f->field($company, 'line_id');
echo $f->field($company, 'address');
echo $f->field($company, 'tax_code');
echo $f->field($company, 'logo')->fileInput();
echo $f->field($company, 'payment');
echo $f->field($company, 'about');
?>

<div class="form-group">
	<div class="col-md-2"> </div>
	<div class="col-sm-9">
		<input type="submit" class="btn btn-primary" value="Save">
	</div>
	</div>
	<?php ActiveForm::end(); ?>
	</div>
</div>