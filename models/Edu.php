<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_edu".
 *
 * @property integer $e_id
 * @property string $e_name
 */
class Edu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_edu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_name'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'e_id' => 'E ID',
            'e_name' => 'E Name',
        ];
    }
    /**
     * 获取学历
     * @return [type] [description]
     */
    public function showEdu(){
        return $this->find()->asarray()->all();
    }

}
