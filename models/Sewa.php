<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sewa".
 *
 * @property integer $id
 * @property integer $pemohon_id
 * @property integer $kamarkos_id
 * @property string $tanggal_book
 * @property string $alat
 * @property string $keterangan
 * @property string $status_pembayaran
 * @property string $status
 * @property string $tanggal_sys
 */
class Sewa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sewa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pemohon_id', 'kamarkos_id'], 'required'],
            [['pemohon_id', 'kamarkos_id'], 'integer'],
            [['tanggal_book', 'tanggal_sys'], 'safe'],
            [['keterangan', 'status_pembayaran', 'status'], 'string'],
            [['alat'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pemohon_id' => 'Pemohon ID',
            'kamarkos_id' => 'Kamarkos ID',
            'tanggal_book' => 'Tanggal Book',
            'alat' => 'Alat',
            'keterangan' => 'Keterangan',
            'status_pembayaran' => 'Status Pembayaran',
            'status' => 'Status',
            'tanggal_sys' => 'Tanggal Sys',
        ];
    }
}
