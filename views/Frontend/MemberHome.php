<?php

use yii\web\Session;

$session = new Session();
$session->open();
?>

<div class="panel">
	<div class="panel-body">
	<h4> Login Result </h4>
	<hr>

	<div class="alert alert-success">
		<h3>
			<i class="glyphicon glyphicon-ok"> </i>
			Welcome
			<?php echo $session->get('member_name'); ?>
		</h3>
	</div>
	</div>
</div>