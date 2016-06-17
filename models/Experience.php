<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_Experience".
 *
 * @property integer $ex_id
 * @property string $ex_experience
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ex_experience'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ex_id' => 'Ex ID',
            'ex_experience' => 'Ex Experience',
        ];
    }
    /**
     * 获取工作年限
     * @return [type] [description]
     */
    public function showExperience(){
        return $this->find()->asarray()->all();
    }
}
