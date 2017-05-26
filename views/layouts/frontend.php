<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Navbar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\Session;
use app\models\Company;
use yii\widgets\ActiveForm;

AppAsset::register($this);

$session = new \yii\web\Session();
$session->open();

$company = Company::find()->one();
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<? Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?php echo $company->web_title; ?></title>
	<?php $this->head() ?>

	<style>
		body {
			background: #D2D7D3;
		}
	</style>
</head>
<body>

<?php $this->beginBody() ?>
<div class="">
	<div class="container">
		<div class="row">
			<div class="pull-left">
			<h4>
				<!-- logo -->
				<?php if (!empty($company->logo)): ?>
				<img src="../uploads/<?php echo "$company->logo"; ?>" width="40px" />
				<?php endif; ?>

				<!-- web title -->
				<?php echo $company->web_title; ?>
			</h4>
		</div>

		<div class="pull-right">
			<!-- Form Login -->
			<div style="margin-top: 10px">
				<?php if (empty($session->get('member_id'))): ?>
					<?php $f = ActiveForm::begin(['action' => 'index.php?r=frontend/login', 
					'options' => ['class' => 'form-inline']]); ?>
					<input type="text" class="form-control" name="username" style="width: 130px" placeholder="Username" />
					<input type="password" class="form-control" name="password" style="width: 130px" placeholder="Password" />
					<input type="submit" class="btn btn-primary btn-sm" value="Login" />
					
					<a class="btn btn-warning btn-sm" href="index.php?r=frontend/register"> Register
					<i class="glyphicon glyohicon-chevron-right"> </i>
					</a>

					<?php ActiveForm::end(); ?>
				<?php else: ?>
					<strong><?php echo $session->get('member_name'); ?> </strong>

					<a href="index.php?r=frontend/history" class="btn btn-success">
					<i class="glyphicon glyphicon-th-list"> </i>
					History
					</a>

					<a href="index.php?r=frontend/profile" class="btn btn-primary">
					<i class="glyphicon glyphicon-user"></i>
					Profile
					</a>

					<a href="index.php?r=frontend/logout" class="btn btn-danger">
					<i class="glyphicon glyphicon-off"></i>
					Logout
					</a>

				<?php endif; ?>
			</div>
		</div>
	<div class="clearfix"> </div>
</div>
</div>

<div class="navbar-inverse nav">
	<div class="container">
		<div class="row">
			<div class="row">
				<div class="row">
					<!-- menu -->
					<button type="button"
						class="navbar-toggle"
						data-toggle="collapse"
						data-target="#w0-collapse">
						<span class="sr-only">Toggle navigation </span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse">
						<ul class="navbar-nav nav">
							<li class="first active">
								<a href="index.php?r=frontend/index"> Home </a>
							</li>

							<li>
								<a href="index.php?r=frontend/product"> Product </a>
							</li>

							<li>
								<a href="index.php?r=frontend/about"> About </a>
							</li>

							<li>
								<a href="index.php?r=frontend/payment"> Payment </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- content -->
<div class="container" style="margin-top: 10px">
	<div class="row">
		<?php echo $content; ?>
	</div>
</div>
</div>

<!-- footer -->
<div style="background: #95A5A6; padding-top: 20px; padding-bottom: 20px">
	<div class="container">
		<div class="row">
			<div><?php echo $company->name; ?></div>
			<div>Tel: <?php echo $company->tel; ?>, Fax: <?php echo $company->fax; ?> </div>
			<div>Website: <?php echo $company->website; ?> </div>
			<div>Email: <?php echo $company->email; ?> </div>
			<div>Tax Code: <?php echo $company->tax_code; ?> </div>
			<div><?php echo $company->address; ?> </div>
		</div>
	</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>