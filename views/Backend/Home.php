<?php

use yii\web\Session;

$session = new \yii\web\Session();
$session -> open();
?>

<div class="panel">
	<div class="panel-body">
		<h2> Welcome: <?= $session['account_name']; ?> </h2>
	</div>
</div>