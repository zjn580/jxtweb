<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_nature".
 *
 * @property integer $n_id
 * @property string $n_name
 */
class Nature extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_nature';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['n_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'n_id' => 'N ID',
            'n_name' => 'N Name',
        ];
    }
}
