<?php

use yii\web\Session;

$session = new Session();
$session->open();
?>



<div class="panel">
	<div class="panel-body">
		<h4>
			<?php echo $product->category->name; ?>
			<i class="glyphicon glyphicon-cevron-right"> </i>
			(<?php echo $product->code; ?>)
			<?php echo $product->name; ?>
		</h4>

		<!-- product info -->
		<div class="col-md-12">
			<div class="col-md-3">
				<?php if (!empty($product->img)): ?>
					<img src="../uploads/<?php echo $product->img; ?>" width="200px" />
				<?php endif; ?>
			</div>
		<div class="col-md-9">
			<div><?php echo $product->detail; ?> </div>
			<?php if (!empty($product->remark)): ?>
				<div class="alert alert-info" style="margin-top: 10px">
					<i class="glyphicon glyphicon-ok"> </i>
					<?php echo $product->remark; ?>
				</div>
			<?php endif; ?>
		</div>
			<h4 style="color: #407A52">
				<!-- <i class="glyphicon glyphicon-usd"></i> -->
				<?php echo number_format($product->price, 2); ?>
			</h4>
		</div>
		<div>

		<?php if (!empty($session->get('member_id'))): ?>
		<a href="index.php?r=frontend/addtocart" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"> </i>
			Add to Cart
		</a>
		<?php endif; ?>
		</div>
	</div>
</div>

<!-- Image product -->
<div class="col-md-12" style="margin-top: 50px">
	<div class="row">
		<h4> Image of Product </h4>
		<div class="row">
			<?php foreach ($productImages as $productImage): ?> 
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading"><?php echo $productImage->name; ?> </div>
							<div class="panel-body">
								<img src="../uploads/<?php echo $productImage->url; ?>" width="200px" height="120px" />
							</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>
</div>
