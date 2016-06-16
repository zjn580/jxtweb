<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_working".
 *
 * @property integer $y_id
 * @property string $y_year
 */
class Working extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_working';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['y_year'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'y_id' => 'Y ID',
            'y_year' => 'Y Year',
        ];
    }
    /**
     * 获取工作年限
     * @return [type] [description]
     */
    public function showWorking(){
        return $this->find()->asarray()->all();
    }
}
