<?php

use yii\widgets\ActiveForm;
?>

<div class="panel">
	<div class="panel-body">
	<h4>Product Image> <?php echo $product->name; ?> </h4>
	<hr>

	<?php $f = ActiveForm::begin([
		'action' => 'index.php?r=productimage/form&product_id='.$product->id,
		'options' => [
			'enctype' => 'multipart/form-data'
			]
		]); ?>
		<?= $f->field($productImage, 'name'); ?>
		<?= $f->field($productImage, 'url')->fileInput(); ?>

		<div class="form-group">
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	<?php ActiveForm::end(); ?>
	</div>
</div> 