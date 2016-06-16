<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_scale".
 *
 * @property integer $scale_id
 * @property string $scale_size
 */
class Scale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_scale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['scale_size'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'scale_id' => 'Scale ID',
            'scale_size' => 'Scale Size',
        ];
    }
}
