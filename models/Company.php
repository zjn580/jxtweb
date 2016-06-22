<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_company".
 *
 * @property integer $c_id
 * @property integer $u_id
 * @property integer $n_id
 * @property string $c_license
 * @property integer $c_status
 * @property integer $l_id
 * @property integer $scale_id
 * @property string $c_rca
 * @property integer $city_id
 * @property string $c_linkman
 * @property string $c_tel
 * @property string $c_phone
 * @property string $c_address
 * @property string $c_logo
 * @property string $c_intro
 * @property string $c_x
 * @property string $c_y
 * @property string $c_website
 * @property string $c_tags
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'n_id', 'c_status', 'l_id', 'scale_id', 'city_id'], 'integer'],
            [['c_license', 'c_x', 'c_y'], 'string', 'max' => 50],
            [['c_rca'], 'string', 'max' => 30],
            [['c_linkman', 'c_tel', 'c_phone', 'c_address'], 'string', 'max' => 20],
            [['c_logo'], 'string', 'max' => 100],
            [['c_website', 'c_tags', 'c_intro'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'u_id' => 'U ID',
            'n_id' => 'N ID',
            'c_license' => 'C License',
            'c_status' => 'C Status',
            'l_id' => 'L ID',
            'scale_id' => 'Scale ID',
            'c_rca' => 'C Rca',
            'city_id' => 'City ID',
            'c_linkman' => 'C Linkman',
            'c_tel' => 'C Tel',
            'c_phone' => 'C Phone',
            'c_address' => 'C Address',
            'c_logo' => 'C Logo',
            'c_intro' => 'C Intro',
            'c_x' => 'C X',
            'c_y' => 'C Y',
            'c_website' => 'C Website',
            'c_tags' => 'C Tags',
        ];
    }
}
