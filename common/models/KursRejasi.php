<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kurs_rejasi".
 *
 * @property int $id
 * @property string $title
 * @property int $kurs_id
 * @property string $batafsil
 */
class KursRejasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kurs_rejasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['kurs_id'], 'integer'],
            [['batafsil'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'kurs_id' => 'Kurs ID',
            'batafsil' => 'Batafsil',
        ];
    }
}
