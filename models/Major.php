<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_major".
 *
 * @property integer $m_id
 * @property string $m_name
 * @property integer $m_nums
 * @property string $m_intro
 * @property integer $s_id
 */
class Major extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_nums', 's_id'], 'integer'],
            [['m_name'], 'string', 'max' => 30],
            [['m_intro'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'm_id' => 'M ID',
            'm_name' => 'M Name',
            'm_nums' => 'M Nums',
            'm_intro' => 'M Intro',
            's_id' => 'S ID',
        ];
    }
}
