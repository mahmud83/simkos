<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "config".
 *
 * @property integer $config_id
 * @property string $config_name
 * @property string $config_value
 */
class Config extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['config_value'], 'string'],
            [['config_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'config_id' => 'Config ID',
            'config_name' => 'Config Name',
            'config_value' => 'Config Value',
        ];
    }




}
