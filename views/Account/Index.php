<?php

use yii\web\Session;

$session = new Session();
$session->open();
?>


<div class="panel">
	<div class="panel-body">
	<h4>Account</h4>
	<hr>

	<?php if (!empty($session->getFlash('message'))): ?>
	<div class="alert alert-success">
		<i class="glyphicon glyphicon-ok"> </i>
		<?php echo $session['message']; ?>
	</div>
<?php endif;?>

<a href="index.php?r=account/form" class="btn btn-primary">
	<i class="glyphicon glyphicon-plus"> </i>
	New Record
</a>

<table style="margin-top: 10px" class="table table-bordered table-striped">
	<thead>
		<tr>
		<th width="40px" style="text-align: right"> No </th>
		<th width="300px"> Name </th>
		<th> Username </th>
		<th width="100px" style="text-align: center"> Level </th>
		<th width="180"> Email </th>
		<th width="110px"> &nbsp; </th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($accounts as $account): ?>
			<tr>
				<td style="text-align: right"><?php echo $n++; ?> </td>
				<td><?php echo $account->name; ?> </td>
				<td><?php echo $account->username; ?> </td>
				<td style="text-align: center"><?php echo $account->level; ?> </td>
				<td><?php echo $account->email; ?> </td>
				<td style="text-align: center">
					<a href="index.php?r=account/update&id=<?php echo $account->id; ?>"
						class="btn btn-success">
						<i class="glyphicon glyphicon-pencil"> </i>
					</a>

					<a href="index.php?r=account/delete&id=<?php echo $account->id; ?>"
						class="btn btn-danger"
						onclick="return confirm('Are you sure delete data?')">
						<i class="glyphicon glyphicon-remove"> </i>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
</div>