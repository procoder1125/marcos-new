<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $fullname
 * @property string $phone
 * @property string $dars_vaqti
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'phone', 'dars_vaqti'], 'required'],
            [['created_at','fullname', 'phone', 'dars_vaqti'], 'string', 'max' => 255],
            [['kurs_id','user_id'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
            'dars_vaqti' => 'Dars Vaqti',
        ];
    }
}
