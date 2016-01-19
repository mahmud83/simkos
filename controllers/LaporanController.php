<?php

namespace app\controllers;

class LaporanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBulanan()
    {
        return $this->render('bulanan');
    }

    public function actionTahunan()
    {
        return $this->render('tahunan');
    }

}
