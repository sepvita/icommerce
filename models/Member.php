<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
* 
*/
class Member extends ActiveRecord {

	public static function tableName() {
		return 'members';
	}

	public function rules() {
		return [
			[['name', 'username', 'password'], 'required'],
			[['name', 'username'], 'unique']
		];
	}
}
