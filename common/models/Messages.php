<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $filename
 * @property int $user_id
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['from', 'to', 'name', 'created_at',], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['user_id'], 'integer'],
            [['to', 'name', 'filename'], 'string', 'max' => 255],
            ['from', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'filename' => 'Filename',
            'user_id' => 'User ID',
        ];
    }
}
