<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_position".
 *
 * @property integer $p_id
 * @property integer $c_id
 * @property string $p_name
 * @property string $p_type
 * @property integer $l_id
 * @property integer $p_nums
 * @property integer $city_id
 * @property integer $salary_id
 * @property integer $p_sex
 * @property integer $e_id
 * @property integer $experience_id
 * @property string $p_content
 * @property string $p_names
 * @property string $p_tel
 * @property integer $p_phone
 * @property string $p_email
 * @property string $p_address
 * @property integer $is_name
 * @property integer $is_phone
 * @property integer $p_hits
 * @property integer $p_resumes
 * @property integer $p_status
 * @property string $p_Lat
 * @property string $p_Lng
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jx_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'l_id', 'p_nums', 'city_id', 'salary_id', 'p_sex', 'e_id', 'experience_id', 'p_phone', 'is_name', 'is_phone', 'p_hits', 'p_resumes', 'p_status'], 'integer'],
            [['p_name', 'p_type', 'p_tel', 'p_Lat', 'p_Lng'], 'string', 'max' => 20],
            [['p_content'], 'string', 'max' => 200],
            [['p_names', 'p_email', 'p_address'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_id' => 'P ID',
            'c_id' => 'C ID',
            'p_name' => 'P Name',
            'p_type' => 'P Type',
            'l_id' => 'L ID',
            'p_nums' => 'P Nums',
            'city_id' => 'City ID',
            'salary_id' => 'Salary ID',
            'p_sex' => 'P Sex',
            'e_id' => 'E ID',
            'experience_id' => 'Experience ID',
            'p_content' => 'P Content',
            'p_names' => 'P Names',
            'p_tel' => 'P Tel',
            'p_phone' => 'P Phone',
            'p_email' => 'P Email',
            'p_address' => 'P Address',
            'is_name' => 'Is Name',
            'is_phone' => 'Is Phone',
            'p_hits' => 'P Hits',
            'p_resumes' => 'P Resumes',
            'p_status' => 'P Status',
            'p_Lat' => 'P  Lat',
            'p_Lng' => 'P  Lng',
        ];
    }
}
