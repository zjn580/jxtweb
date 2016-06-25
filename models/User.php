<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_user".
 *
 * @property integer $u_id
 * @property string $u_account
 * @property string $u_password
 * @property string $u_name
 * @property integer $u_status
 * @property integer $u_time
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_status', 'u_time'], 'integer'],
            [['u_account', 'u_name'], 'string', 'max' => 30],
            [['u_password'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_account' => 'U Account',
            'u_password' => 'U Password',
            'u_name' => 'U Name',
            'u_status' => 'U Status',
            'u_time' => 'U Time',
        ];
    }
}
