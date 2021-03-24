<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guruhlar".
 *
 * @property int $id
 * @property string $title
 */
class Guruhlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guruhlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'kurs_id' ], 'required'],
            ['kurs_id', 'integer'],
            [['title' , 'dars_vaqti'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
}
