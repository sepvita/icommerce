<?php

use yii\widgets\LinkPager;
use yii\web\Session;

$session = new Session();
$session->open();
?>

<div class="panel">
	<div class="panel-body">
		<h4>Product</h4>
		<hr>

		<?php if (!empty($session->getFlash('message'))): ?>
			<div class="alert alert-success">
			<i class="glyphicon glyphicon-ok"> </i>
			<?php echo $session['message']; ?>
			</div>
		<?php endif; ?>

		<a href="index.php?r=product/form" class="btn btn-primary">
			<i class="glyphicon glyphicon-plus"> </i>
			New Record
		</a>


		<table class="table table-striped table-bordered"  style="margin-top: 10px">
			<thead>
				<tr>
					<th width="40px" style="text-align: right"> No </th>
					<th width="90px"> Barcode </th>
					<th width="200px"> Name </th>
					<th width="200px"> Category </th>
					<th width="80px" style="text-align: right"> Price </th>
					<th width="80px" style="text-align: right"> Cost </th>
					<th width="50px" style="text-align: right"> Qty </th>
					<th width="110px"> </th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($products as $product): ?>
				<tr>
					<td style="text-align: right"><?php echo $n++; ?> </td>
					<td> <?php echo $product->code; ?> </td>
					<td> <?php echo $product->name; ?> </td>
					<td> <?php echo $product->category->name; ?> </td>
					<td style="text-align: right">
						<?php echo number_format($product->price); ?>
					</td>
					<td style="text-align: right">
						<?php echo number_format($product->cost); ?>
					</td>
					<td style="text-align: right"><?php echo $product->qty; ?></td>
					<td style="text-align: center" width="130">
						<a href="index.php?r=productimage/index&product_id=<?php echo $product->id; ?>"
						class="btn btn-info">
						<i class="glyphicon glyphicon-picture"> </i>
						</a>

						<a href="index.php?r=product/edit&id=<?php echo $product->id; ?>"
						class="btn btn-success">
							<i class="glyphicon glyphicon-pencil"> </i>
						</a>

						<a href="index.php?r=product/delete&id=<?php echo $product->id; ?>"
						class="btn btn-danger" 
						onclick="return confirm('Are you sure delete data?')">
							<i class="glyphicon glyphicon-remove"> </i>
						</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach; ?>
		</table>

		<?php echo LinkPager::widget(['pagination' => $pages,
			]);
			?>
	</div>
</div>
