<?php

use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\web\Session;

$session = new Session();
$session->open();
?>

<div style="margin-bottom: 10px">
	<div class="pull-left">
		<a href="index.php?r=frontend/index&sort=box" class="btn btn-primary">
			<i class="glyphicon glyphicon-th"> </i>
		</a>

		<a href="index.php?r=frontend/index&sort=list" class="btn btn-primary">
			<i class="glyphicon glyphicon-th-list"> </i>
		</a>
	</div>

	<div class="pull-right">
		<?php ActiveForm::begin([
			'action' => 'index.php?r=frontend/index',
			'options' => [
				'class' => 'form-inline',
				'name' => 'formProduct'
				]
			]); ?>
			<input type="text" name="search" class="form-control" placeholder="Search..." />
			<a class="btn btn-primary" onclick="document.formProduct.submit() ">
				<i class="glyphicon glyphicon-search"> </i>
			</a>
		<?php ActiveForm::end(); ?>
	</div>
	<div class="clearfix"></div>
</div>

<div class="panel">
	<div class="panel-body">
		<?php foreach ($products as $product): ?>
			<?php if ($sort == 'box'): ?>

				<!-- Display box -->
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="panel" style="height: 300px; text-align: center">
						<div>
							<a href="index.php?r=frontend/productview&id=<?php echo $product->id; ?>">
							<img src="../uploads/<?php echo $product->img; ?>"
							width="200px"
							height="130px" />
							</a>
						</div>

						<div style="min-height: 30px">
						<a href="index.php?r=frontend/productview&id=<?php echo $product->id; ?>
						">
						<h5><?php echo $product->name; ?> </h5>
						</a>
						</div>

						<div style="text-align: center">
						<h4>Rp<?php echo number_format($product->price); ?> </h4>
						</div>

						<?php if (!empty($session->get('member_id'))): ?> 
						<div style="text-align: center">
						<a href="index.php?r=frontend/addtocart&id=<?php echo $product->id; ?>"
						class="btn btn-success">
						<i class="glyphicon glyphicon-plus"> </i>
						Add to chart
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php else: ?>

			<!-- display list -->
			<div class="col-md-12">
				<div class="col-md-3" style="padding-top: 5px; padding-bottom: 5px">
				<a href="index.php?r=frontend/productview&id=<?php echo $product->id; ?>">
				<img src="../uploads/<?php echo $product->img; ?>"
					width="200px"
					height="130px" />
				</a>
				</div>

			<div class="col-md-6">
				<a href="index.php?r=frontend/productview&id=<?php echo $product->id; ?>">
				<h5><?php echo $product->name; ?> </h5>
				</a>
			</div>

			<div class="col-md-3" style="text-align: right">
				<div>
					<h4>$<?php echo number_format($product->price); ?> </h4>
				</div>
				<div>

				<!-- add to chart button condition -->
				<?php if (!empty($session->get('member_id'))): ?> 
				<a href="index.php?r=frontend/addtocart&id=<?php echo $product->id; ?>"
				class="btn btn-success">
				<i class="glyphicon glyphicon-plus"> </i>
				Add to Cart
				</a>
				<?php endif; ?>
				</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>

<div style="text-align: center">
	<?php echo LinkPager::widget([
		'pagination' => $pagination,
		]);
	?>
</div>
</div>