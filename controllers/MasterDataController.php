<?php

namespace app\controllers;

class MasterDataController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPemohon()
    {
        return $this->render('pemohon');
    }

    public function actionKamarkos()
    {
        return $this->render('kamarkos');
    }

}
