<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_salary".
 *
 * @property integer $sa_id
 * @property string $sa_salary
 */
class Salary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_salary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sa_salary'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sa_id' => 'Sa ID',
            'sa_salary' => 'Sa Salary',
        ];
    }
     public function showSalary(){
        return $this->find()->asarray()->all();
    }
}
