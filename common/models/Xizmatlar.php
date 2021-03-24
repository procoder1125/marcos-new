<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xizmatlar".
 *
 * @property int $id
 * @property string $title
 * @property string $batafsil
 */
class Xizmatlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'xizmatlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'batafsil' => 'Batafsil',
        ];
    }
}
