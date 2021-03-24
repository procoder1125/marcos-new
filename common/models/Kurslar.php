<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kurslar".
 *
 * @property int $id
 * @property string $title
 * @property string $davomiylik
 * @property string $dars_vaqti
 * @property string $oylik_tolov
 * @property string $batafsil
 */
class Kurslar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kurslar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['batafsil'], 'string'],
            [['title', 'davomiylik', 'oylik_tolov'], 'string', 'max' => 255],
            [['dars_vaqti'], 'string', 'max' => 10],
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
            'davomiylik' => 'Davomiylik',
            'dars_vaqti' => 'Dars Vaqti',
            'oylik_tolov' => 'Oylik Tolov',
            'batafsil' => 'Batafsil',
        ];
    }
}
