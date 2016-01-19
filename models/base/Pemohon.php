<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "pemohon".
 *
 * @property integer $id
 * @property integer $nomor_identitas
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $agama
 * @property string $alamat
 * @property string $pekerjaan
 * @property string $tempat
 * @property string $nomor_telpon
 * @property string $nama_orangtua
 * @property string $agama_orangtua
 * @property string $pekerjaan_orangtua
 * @property string $nomor_telpon_orangtua
 * @property string $nama_saudara
 * @property string $agama_saudara
 * @property string $pekerjaan_saudara
 * @property string $nomor_telpon_saudara
 * @property string $hubungan_saudara
 * @property string $keterangan
 * @property string $tanggal_add
 * @property string $tanggal_update
 */
class Pemohon extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const JENIS_KELAMIN_PEREMPUAN = 'PEREMPUAN';
    const JENIS_KELAMIN_LAKI_LAKI = 'LAKI-LAKI';
    const AGAMA_KONGHUCU = 'KONGHUCU';
    const AGAMA_BUDHA = 'BUDHA';
    const AGAMA_HINDU = 'HINDU';
    const AGAMA_KATOLIK = 'KATOLIK';
    const AGAMA_KRISTEN = 'KRISTEN';
    const AGAMA_ISLAM = 'ISLAM';
    const AGAMA_ORANGTUA_KONGHUCU = 'KONGHUCU';
    const AGAMA_ORANGTUA_BUDHA = 'BUDHA';
    const AGAMA_ORANGTUA_HINDU = 'HINDU';
    const AGAMA_ORANGTUA_KATOLIK = 'KATOLIK';
    const AGAMA_ORANGTUA_KRISTEN = 'KRISTEN';
    const AGAMA_ORANGTUA_ISLAM = 'ISLAM';
    const AGAMA_SAUDARA_KONGHUCU = 'KONGHUCU';
    const AGAMA_SAUDARA_BUDHA = 'BUDHA';
    const AGAMA_SAUDARA_HINDU = 'HINDU';
    const AGAMA_SAUDARA_KATOLIK = 'KATOLIK';
    const AGAMA_SAUDARA_KRISTEN = 'KRISTEN';
    const AGAMA_SAUDARA_ISLAM = 'ISLAM';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemohon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_identitas', 'nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'nomor_telpon', 'agama_orangtua', 'nomor_telpon_orangtua', 'agama_saudara', 'nomor_telpon_saudara'], 'required'],
            [['nomor_identitas'], 'integer'],
            [['jenis_kelamin', 'agama', 'alamat', 'agama_orangtua', 'agama_saudara', 'keterangan'], 'string'],
            [['tanggal_lahir', 'tanggal_add', 'tanggal_update'], 'safe'],
            [['nama', 'pekerjaan', 'tempat', 'nama_orangtua', 'pekerjaan_orangtua', 'nama_saudara', 'pekerjaan_saudara'], 'string', 'max' => 255],
            [['tempat_lahir'], 'string', 'max' => 100],
            [['nomor_telpon', 'nomor_telpon_orangtua', 'nomor_telpon_saudara'], 'string', 'max' => 12],
            [['hubungan_saudara'], 'string', 'max' => 50],
            ['jenis_kelamin', 'in', 'range' => [
                    self::JENIS_KELAMIN_PEREMPUAN,
                    self::JENIS_KELAMIN_LAKI_LAKI,
                ]
            ],
            ['agama', 'in', 'range' => [
                    self::AGAMA_KONGHUCU,
                    self::AGAMA_BUDHA,
                    self::AGAMA_HINDU,
                    self::AGAMA_KATOLIK,
                    self::AGAMA_KRISTEN,
                    self::AGAMA_ISLAM,
                ]
            ],
            ['agama_orangtua', 'in', 'range' => [
                    self::AGAMA_ORANGTUA_KONGHUCU,
                    self::AGAMA_ORANGTUA_BUDHA,
                    self::AGAMA_ORANGTUA_HINDU,
                    self::AGAMA_ORANGTUA_KATOLIK,
                    self::AGAMA_ORANGTUA_KRISTEN,
                    self::AGAMA_ORANGTUA_ISLAM,
                ]
            ],
            ['agama_saudara', 'in', 'range' => [
                    self::AGAMA_SAUDARA_KONGHUCU,
                    self::AGAMA_SAUDARA_BUDHA,
                    self::AGAMA_SAUDARA_HINDU,
                    self::AGAMA_SAUDARA_KATOLIK,
                    self::AGAMA_SAUDARA_KRISTEN,
                    self::AGAMA_SAUDARA_ISLAM,
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
            'nomor_identitas' => 'Nomor Identitas',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'pekerjaan' => 'Pekerjaan',
            'tempat' => 'Tempat',
            'nomor_telpon' => 'Nomor Telpon',
            'nama_orangtua' => 'Nama Orangtua',
            'agama_orangtua' => 'Agama Orangtua',
            'pekerjaan_orangtua' => 'Pekerjaan Orangtua',
            'nomor_telpon_orangtua' => 'Nomor Telpon Orangtua',
            'nama_saudara' => 'Nama Saudara',
            'agama_saudara' => 'Agama Saudara',
            'pekerjaan_saudara' => 'Pekerjaan Saudara',
            'nomor_telpon_saudara' => 'Nomor Telpon Saudara',
            'hubungan_saudara' => 'Hubungan Saudara',
            'keterangan' => 'Keterangan',
            'tanggal_add' => 'Tanggal Add',
            'tanggal_update' => 'Tanggal Update',
        ];
    }




    /**
     * get column jenis_kelamin enum value label
     * @param string $value
     * @return string
     */
    public static function getJenisKelaminValueLabel($value){
        $labels = self::optsJenisKelamin();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column jenis_kelamin ENUM value labels
     * @return array
     */
    public static function optsJenisKelamin()
    {
        return [
            self::JENIS_KELAMIN_PEREMPUAN => 'Perempuan',
            self::JENIS_KELAMIN_LAKI_LAKI => 'Laki Laki',
        ];
    }

    /**
     * get column agama enum value label
     * @param string $value
     * @return string
     */
    public static function getAgamaValueLabel($value){
        $labels = self::optsAgama();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column agama ENUM value labels
     * @return array
     */
    public static function optsAgama()
    {
        return [
            self::AGAMA_KONGHUCU => 'Konghucu',
            self::AGAMA_BUDHA => 'Budha',
            self::AGAMA_HINDU => 'Hindu',
            self::AGAMA_KATOLIK => 'Katolik',
            self::AGAMA_KRISTEN => 'Kristen',
            self::AGAMA_ISLAM => 'Islam',
        ];
    }

    /**
     * get column agama_orangtua enum value label
     * @param string $value
     * @return string
     */
    public static function getAgamaOrangtuaValueLabel($value){
        $labels = self::optsAgamaOrangtua();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column agama_orangtua ENUM value labels
     * @return array
     */
    public static function optsAgamaOrangtua()
    {
        return [
            self::AGAMA_ORANGTUA_KONGHUCU => 'Konghucu',
            self::AGAMA_ORANGTUA_BUDHA => 'Budha',
            self::AGAMA_ORANGTUA_HINDU => 'Hindu',
            self::AGAMA_ORANGTUA_KATOLIK => 'Katolik',
            self::AGAMA_ORANGTUA_KRISTEN => 'Kristen',
            self::AGAMA_ORANGTUA_ISLAM => 'Islam',
        ];
    }

    /**
     * get column agama_saudara enum value label
     * @param string $value
     * @return string
     */
    public static function getAgamaSaudaraValueLabel($value){
        $labels = self::optsAgamaSaudara();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column agama_saudara ENUM value labels
     * @return array
     */
    public static function optsAgamaSaudara()
    {
        return [
            self::AGAMA_SAUDARA_KONGHUCU => 'Konghucu',
            self::AGAMA_SAUDARA_BUDHA => 'Budha',
            self::AGAMA_SAUDARA_HINDU => 'Hindu',
            self::AGAMA_SAUDARA_KATOLIK => 'Katolik',
            self::AGAMA_SAUDARA_KRISTEN => 'Kristen',
            self::AGAMA_SAUDARA_ISLAM => 'Islam',
        ];
    }

}
