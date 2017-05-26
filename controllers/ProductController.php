<?php

namespace app\controllers;

use yii\web\Session;
use yii\web\Controller;
use app\models\Product;
use app\models\Category;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class ProductController extends Controller {	

	public function init() {
		$session = new Session();
		$session->open();

		if (empty($session['account_id'])) {
			return $this->redirect('index.php?r=backend/index');
		}

		parent::init();
	}

	public function actionIndex() {
		$totalCount = Product::find()->count();

		$pages = new Pagination([
			'totalCount' => $totalCount,
			'pageSize' => 5
		]);

		$products = Product::find()
		->orderBy('name')
		->offset($pages->offset)
		->limit($pages->limit)
		->all();

		return $this->render('//Product/Index', [
			'products' => $products,
			'pages' => $pages,
			'n' => 1
			]);
	}

	public function actionForm() {
		$product = new Product();
		$categorys = Category::find()->orderBy('name')->all();
		$categoryIds = ArrayHelper::map($categorys, 'id', 'name');

		if (!empty($_POST)) {
			if (!empty($_POST['Product']['id'])) {
				$id = $_POST['Product']['id'];
				$product = Product::findOne($id);
			}

			if (!empty($_FILES['Product'])) {
				$img = $_FILES['Product']['name']['img'];
				$ext = end((explode(".", $img)));

				$name = microtime();
				$name = str_replace(' ', '', $name);
				$name = str_replace('.', '', $name);

				$name = $name.'.'.$ext;
				$tmp = $_FILES['Product']['tmp_name']['img'];
				$product->img = $name;

				move_uploaded_file($tmp, '../uploads/'.$name);
			}

			//set value
			$product->code = $_POST['Product']['code'];
			$product->name = $_POST['Product']['name'];
			$product->remark = $_POST['Product']['remark'];
			$product->detail = $_POST['Product']['detail'];
			$product->price = $_POST['Product']['price'];
			$product->cost = $_POST['Product']['cost'];
			$product->qty = $_POST['Product']['qty'];
			$product->category_id = $_POST['Product']['category_id'];

			if ($product->save()) {
				$session = new Session();
				$session->open();
				$session->setFlash('message', 'Data Saved.');

				return $this->redirect(['index']);
			}
		}

		return $this->render('//Product/Form', [
			'product' => $product,
			'icon' => 'glyphicon glyphicon-plus', 
			'title' => 'New Product',
			'categoryIds' => $categoryIds
			]);
		}

	public function actionEdit($id) {
		$product = Product::findOne($id);
		$categorys = Category::find()->orderBy('name')->all();
		$categoryIds = ArrayHelper::map($categorys, 'id', 'name');


		return $this->render('//Product/Form', [
			'product' => $product,
			'icon' => 'glyphicon glyphicon-pencil',
			'title' => 'Edit Product',
			'categoryIds' => $categoryIds
			]);
		}


	public function actionDelete($id) {
		$product = Product::findOne($id);

		if (!empty($product)) {
			if (!empty($product->img)) {
				unlink('../uploads/'.$product->img);
			}

			$product->delete();

			$session = new Session();
			$session->open();
			$session->setFlash('message', 'Data Deleted.');

			return $this->redirect(['index']);
		}
	}
}