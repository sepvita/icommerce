<?php

use yii\web\Session;
use yii\widgets\ActiveForm;

$session = new Session();
$session->open();
?>

<div class="panel">
	<div class="panel-body">
		<?php if (!empty($product)): ?>
			<h4> <i class="glyphicon glyphicon-plus"></i> Add to Cart </h4>

			<?php $f = ActiveForm::begin(['options' => ['name' => 'formAddToCart']]); ?>
			<table style="margin-bottom: 50px" class="table table-striped table-bordered">

			<thead>
				<tr>
					<th width="100px"> Code </th>
					<th> Name </th>
					<th width="100px" style="text-align: right"> Price </th>
					<th width="80px" style="text-align: right"> qty </th>
					<th width="40px">&nbsp;</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td> <?php echo $product->code; ?> </td>
					<td> <?php echo $product->name; ?> </td>
					<td style="text-align: right">
						<?php echo number_format($product->price); ?>
					</td>
					<td> <input type="text" class="form-control" name="qty" value="1" style="text-align: right"></input> </td>
					<td> <a href="javascript:void(0)" onclick="document.formAddToCart.submit()" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"> </i> Add </a>
					</td>
				</tr>
			</tbody>
		</table>
	<?php ActiveForm::end(); ?>
<?php endif; ?>

<h4>
	<i class="glyphicon glyphicon-shopping-cart"> </i>
	Item in Cart
</h4>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th width="40px" style="text-align: right"> No</th>
			<th width="100px"> Code </th>
			<th> Name </th>
			<th width="100px" style="text-align: right"> Price </th>
			<th width="80px" style="text-align: right"> Qty </th>
			<th width="120px" style="text-align: right"> Total </th>
			<th width="40px"> &nbsp; </th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($cart as $c): ?>
			<?php
				$sumQty += $c['qty'];
				$sumPrice += ($c['qty'] * $c['price']);
			?>
				<tr>
					<td style="text-align: right"> <?php echo $n++; ?> </td>
					<td> <?php echo $c['code']; ?> </td>
					<td> <?php echo $c['name']; ?> </td>
					<td style="text-align: right">
						<?php echo number_format($c['price']); ?>
					</td>
					<td style="text-align: right">
						<?php echo number_format($c['qty']); ?>
					</td>
					<td style="text-align: right">
						<?php echo number_format($c['qty'] * $c['price']); ?>
					</td>
					<td style="text-align: center">
						<?php $product_id = null;
							if (!empty($product)) {
								$product_id = $product->id;
							}
							?>
							<a href="index.php?r=frontend/cartremove&index=<?php echo ($n - 2); ?>&id=<?php echo $product_id; ?>"
							class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-remove"> </i>
							</a>
					</td>
				</tr>
		<?php endforeach; ?>
	</tbody>

	<tfoot>
		<tr>
			<td colspan="4"><strong> Total </strong> </td>
			<td style="text-align: right"><?php echo $sumQty; ?> </td>
			<td style="text-align: right">
			<?php echo number_format($sumPrice); ?>
			</td>
		</tr>
	</tfoot>
</table>

<div style="text-align: center">
	<a href="index.php?r=frontend/index" class="btn btn-primary btn-lg">
		<i class="glyphicon glyphicon-chevron-left"></i>
		Shopping
	</a>
	<a href="index.php?r=frontend/checkout" class="btn btn-success btn-lg">
	Check Out
	<i class="glyphicon glyphicon-chevron-right"> </i>
	</a>
</div>
</div>
</div>