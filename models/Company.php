<?php

namespace app\models;

use yii\db\ActiveRecord;

class Company extends ActiveRecord {

	public static function tableName() {
		return 'companies';
	}
}