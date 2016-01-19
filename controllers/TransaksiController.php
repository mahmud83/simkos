<?php

namespace app\controllers;

use Yii;
use app\models\Sewa;
use app\models\base\Kamarkos;
use yii\web\Controller;
use yii\helpers\Url;

class TransaksiController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSewa()
    {
        $connection = \Yii::$app->db;
        $sqldatasewa = "SELECT
                pemohon.nama,
                kamarkos.kamar,
                kamarkos.harga,
                sewa.tanggal_book,
                sewa.alat,
                sewa.keterangan,
                sewa.status_pembayaran
                FROM
                sewa
                INNER JOIN pemohon ON pemohon.id = sewa.pemohon_id
                INNER JOIN kamarkos ON kamarkos.id = sewa.kamarkos_id
                ";
        $sqlpemohon = "SELECT
                pemohon.id,
                pemohon.nomor_identitas,
                pemohon.nama
                FROM
                pemohon";
        $sqlkamar = "SELECT
                kamarkos.id,
                kamarkos.kamar
                FROM
                kamarkos WHERE kamarkos.`status` = 'F' ";

        $sewa = $connection->createCommand($sqldatasewa);
        $pemohon = $connection->createCommand($sqlpemohon);
        $kamar = $connection->createCommand($sqlkamar);
        //$command->bindValue(":role_name", $role_name);
        $data['sewa'] = $sewa->queryAll();
        $data['pemohon'] = $pemohon->queryAll();
        $data['kamar'] = $kamar->queryAll();

        return $this->render('sewa', [
            'data' => $data,
        ]);
    }

    public function actionCsimpansewa()
    {
        $model = new Sewa;

        $arr = $_POST['Sewa'];
        $kamarkos_id = $arr['kamarkos_id'];

        try {
            if ($model->load($_POST) && $model->save() && $this->sewakamarkos($kamarkos_id)) {
                return $this->redirect('sewa');
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->actionSewa();
    }

    public function sewakamarkos($kamarkos_id)
    {
        $model = $this->findKamarKos($kamarkos_id);
        $model->status = "T";
        if ($model->save()) {
            return true;
        }
    }

    protected function findKamarKos($id)
    {
        if (($model = Kamarkos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionPembayaran()
    {
        $connection = \Yii::$app->db;
        $sqldatapembayaran = "SELECT
                pemohon.nama,
                kamarkos.kamar,
                kamarkos.harga,
                sewa.id,
                sewa.tanggal_book,
                sewa.alat,
                sewa.keterangan,
                sewa.status_pembayaran
                FROM
                sewa
                INNER JOIN pemohon ON pemohon.id = sewa.pemohon_id
                INNER JOIN kamarkos ON kamarkos.id = sewa.kamarkos_id
                WHERE status_pembayaran = 'F'
                ";
        $pembayaran = $connection->createCommand($sqldatapembayaran);
        $data['pembayaran'] = $pembayaran->queryAll();

        return $this->render('pembayaran', [
            'data' => $data,
        ]);
    }

    public function actionCgetonesewa()
    {
        $id = trim($_GET['sewa_id']);
        $data = Sewa::findOne($id);
    }

}
