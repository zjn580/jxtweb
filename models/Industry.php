<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_industry".
 *
 * @property integer $l_id
 * @property string $l_name
 * @property integer $pid
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_industry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid'], 'integer'],
            [['l_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'l_id' => 'L ID',
            'l_name' => 'L Name',
            'pid' => 'Pid',
        ];
    }
    /**
     * 获取职业信息
     * @param  integer $pid [description]
     * @return [type]       [description]
     */
    public function showIndustry($pid = 0)
    {
       $arr= $this->find()->where(['pid'=>$pid])->asarray()->all();
       foreach ($arr as $k => $v) {
           $arr[$k]['son'] = $this->showIndustry($v['l_id']);
       }
       return $arr;
    }
    
}
