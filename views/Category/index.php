<?php

use yii\web\Session;

$session = new Session();
$session->open();
?>

<div class="panel">
	<div class="panel-body">
	<h4>Category</h4>
	<hr>

	<?php if (!empty($session->getFlash('message'))): ?>
		<div class="alert alert-success">
			<i class="glyphicon glyphicon-ok"> </i>
			<?php echo $session['message']; ?>
		</div>
	<?php endif; ?>

	<a href="index.php?r=category/form" class="btn btn-primary">
		<i class="glyphicon glyphicon-plus"></i>
		New Record
	</a>

	<table class="table table-striped table-bordered" style="margin-top: 10px">
		<thead>
			<tr>
				<th style="text-align: right" width="50px"> No </th>
				<th width="100px"> Kode </th>
				<th> Nama </th>
				<th> Remark </th>
				<th width="110px">&nbsp; </th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($categories as $category): ?>
				<tr>
					<td> <?php echo $n++; ?> </td>
					<td> <?php echo $category->code; ?> </td>
					<td> <?php echo $category->name; ?> </td>
					<td> <?php echo $category->remark; ?> </td>
					<td style="text-align: center">
						<a href="index.php?r=category/edit&id=<?php echo $category->id; ?>"
						class="btn btn-success">
							<i class="glyphicon glyphicon-pencil"> </i>
						</a>

						<a href="index.php?r=category/delete&id=<?php echo $category->id; ?>"
						class="btn btn-danger" onclick="return confirm('Are you sure delete data?')">
							<i class="glyphicon glyphicon-remove"> </i>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
</div>
