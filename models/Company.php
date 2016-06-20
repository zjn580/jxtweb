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
 * @property integer $scale_id
 * @property string $c_rca
 * @property string $city_id
 * @property string $c_linkman
 * @property string $c_tel
 * @property integer $c_phone
 * @property string $c_address
 * @property string $c_logo
 * @property string $c_intro
 * @property integer $c_hits
 * @property string $c_y
 * @property string $c_x
 * @property string $c_website
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
            [['u_id', 'n_id', 'c_status', 'scale_id', 'c_phone'], 'integer'],
            [['c_intro'], 'string'],
            [['c_license', 'c_rca', 'city_id', 'c_address', 'c_logo'], 'string', 'max' => 50],
            [['c_linkman', 'c_tel'], 'string', 'max' => 20],
            [['c_y', 'c_x', 'c_website'], 'string', 'max' => 15]
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
            'scale_id' => 'Scale ID',
            'c_rca' => 'C Rca',
            'city_id' => 'City ID',
            'c_linkman' => 'C Linkman',
            'c_tel' => 'C Tel',
            'c_phone' => 'C Phone',
            'c_address' => 'C Address',
            'c_logo' => 'C Logo',
            'c_intro' => 'C Intro',
            //'c_hits' => 'C Hits',
            'c_y' => 'C Y',
            'c_x' => 'C X',
            'c_website' => 'C Website',
        ];
    }
}
