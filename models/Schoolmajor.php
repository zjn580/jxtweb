<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_sc_ma".
 *
 * @property integer $s_id
 * @property integer $m_id
 */
class Schoolmajor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_sc_ma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_id', 'm_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'S ID',
            'm_id' => 'M ID',
        ];
    }
}
