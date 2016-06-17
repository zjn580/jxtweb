<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_city".
 *
 * @property integer $city_id
 * @property string $city_name
 * @property integer $pid
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid'], 'integer'],
            [['city_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city_name' => 'City Name',
            'pid' => 'Pid',
        ];
    }
}
