<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_school".
 *
 * @property integer $s_id
 * @property integer $u_id
 * @property integer $n_id
 * @property string $s_license
 * @property integer $s_status
 * @property integer $scale_id
 * @property string $s_rca
 * @property string $city_id
 * @property string $s_linkman
 * @property string $s_tel
 * @property integer $s_phone
 * @property string $s_address
 * @property string $s_logo
 * @property string $s_intro
 * @property integer $s_hits
 * @property string $s_y
 * @property string $s_x
 * @property string $s_website
 * @property string $s_tags
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'n_id', 's_status', 'scale_id', 's_phone', 's_hits'], 'integer'],
            [['s_intro'], 'string'],
            [['s_license', 's_rca', 'city_id', 's_address', 's_logo'], 'string', 'max' => 50],
            [['s_linkman', 's_tel'], 'string', 'max' => 20],
            [['s_y', 's_x', 's_website'], 'string', 'max' => 15],
            [['s_tags'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'S ID',
            'u_id' => 'U ID',
            'n_id' => 'N ID',
            's_license' => 'S License',
            's_status' => 'S Status',
            'scale_id' => 'Scale ID',
            's_rca' => 'S Rca',
            'city_id' => 'City ID',
            's_linkman' => 'S Linkman',
            's_tel' => 'S Tel',
            's_phone' => 'S Phone',
            's_address' => 'S Address',
            's_logo' => 'S Logo',
            's_intro' => 'S Intro',
            's_hits' => 'S Hits',
            's_y' => 'S Y',
            's_x' => 'S X',
            's_website' => 'S Website',
            's_tags' => 'S Tags',
        ];
    }
}
