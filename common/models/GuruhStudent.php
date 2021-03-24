<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guruh_student".
 *
 * @property int $id
 * @property string $name
 * @property string $dars_vaqti
 * @property string $telefon
 * @property int $guruh_id
 */
class GuruhStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guruh_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'guruh_id'], 'required'],
            [['dars_vaqti'], 'safe'],
            [['guruh_id'], 'integer'],
            [['name', 'telefon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'dars_vaqti' => 'Dars Vaqti',
            'telefon' => 'Telefon',
            'guruh_id' => 'Guruh ID',
        ];
    }
}
