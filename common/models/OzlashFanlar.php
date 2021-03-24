<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ozlash_fanlar".
 *
 * @property int $id
 * @property string $title
 * @property int $davomiyligi
 * @property int $guruh_id
 */
class OzlashFanlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ozlash_fanlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'davomiyligi', 'guruh_id'], 'required'],
            [['davomiyligi', 'guruh_id'], 'integer'],
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
            'davomiyligi' => 'Davomiyligi',
            'guruh_id' => 'Guruh ID',
        ];
    }
}
