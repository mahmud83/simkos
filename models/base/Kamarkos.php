<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "kamarkos".
 *
 * @property integer $id
 * @property string $kamar
 * @property string $harga
 * @property string $status
 * @property string $tanggal_add
 * @property string $tanggal_update
 */
class Kamarkos extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const STATUS_F = 'F';
    const STATUS_T = 'T';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kamarkos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['harga'], 'number'],
            [['status'], 'string'],
            [['tanggal_add', 'tanggal_update'], 'safe'],
            [['kamar'], 'string', 'max' => 255],
            ['status', 'in', 'range' => [
                    self::STATUS_F,
                    self::STATUS_T,
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kamar' => 'Kamar',
            'harga' => 'Harga',
            'status' => 'Status',
            'tanggal_add' => 'Tanggal Add',
            'tanggal_update' => 'Tanggal Update',
        ];
    }




    /**
     * get column status enum value label
     * @param string $value
     * @return string
     */
    public static function getStatusValueLabel($value){
        $labels = self::optsStatus();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column status ENUM value labels
     * @return array
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_F => 'F',
            self::STATUS_T => 'T',
        ];
    }

}
