<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Session;

class BackendController extends Controller {
	public function actionIndex() {
		$account = new \app\models\Account();

		if (!empty($_POST)) {
			$account = \app\models\Account::find()
			->where('username = :username AND password = :password', [
				':username' => $_POST['Account']['username'],
				':password' => $_POST['Account']['password']
				])
			->one();

		if (!empty($account)) {
			$session = new \yii\web\Session();
			$session -> open();
			$session['account_id'] = $account->id;
			$session['account_name'] = $account->name;

			return $this->redirect(['home']);
		}	else{
			$account = new \app\models\Account();
			$account -> username = $_POST['Account']['username'];
			$account -> password = $_POST['Account']['password'];
		}
		}
		return $this->render('//Backend/Index', ['account' => $account]);
	}

	public function actionHome() {
		return $this->render('//Backend/Home');
	}

	public function actionLogout(){
		$session = new \yii\web\Session();
		$session -> open();
		unset($session['account_id']);
		unset($session['account_name']);

		return $this->redirect('index.php?r=backend/index');
	}


}