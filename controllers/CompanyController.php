<?php

namespace app\controllers;

use yii\web\Session;
use yii\web\Controller;
use app\models\Company;

class CompanyController extends Controller {

	public function actionIndex() {
		$company = Company::find()->orderBy('id')->one();

		if (!empty($_POST)) {
			if (!empty($_FILES['Company'])) {
				//menghapus logo lama
				if (!empty($company->logo)) {
					$old_img = $company->logo;
					unlink('../uploads/'.$old_img);
				}

				//mengupload logo baru
				$img = $_FILES['Company']['name']['logo'];
				$ext = end((explode(".", $img)));

				$name = microtime();
				$name = str_replace(' ', '', $name);
				$name = str_replace('.', '', $name);

				$name = $name.'.'.$ext;
				$tmp = $_FILES['Company']['tmp_name']['logo'];
				$company->logo = $name;

				move_uploaded_file($tmp, '../uploads/'.$name);
			}


			$company->name = $_POST['Company']['name'];
			$company->web_title = $_POST['Company']['web_title'];
			$company->tel = $_POST['Company']['tel'];
			$company->email = $_POST['Company']['email'];
			$company->fax = $_POST['Company']['fax'];
			$company->website = $_POST['Company']['website'];
			$company->facebook = $_POST['Company']['facebook'];
			$company->line_id = $_POST['Company']['line_id'];
			$company->address = $_POST['Company']['address'];
			$company->tax_code= $_POST['Company']['tax_code'];
			$company->payment= $_POST['Company']['payment'];
			$company->about = $_POST['Company']['about'];

			if ($company->save()) {
				$session = new Session();
				$session->open();
				$session->setFlash('message', 'Data Saved');

				return $this->redirect(['index']);
			}
		}

		return $this->render('//Company/Index', [
			'company' => $company
			]);
		}
	}
?>