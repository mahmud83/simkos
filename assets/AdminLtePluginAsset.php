<?php

namespace app\assets;


use yii\web\AssetBundle;

class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $css = [
        'iCheck/all.css',
        //'bootstrap-slider/slider.css',
        //'bootstrap-wysihtml5/bootstrap-wysihtml5.css',
        'datepicker/datepicker3.css',
        'select2/select2.css',
        'datatables/dataTables.bootstrap.css',
    ];
    public $js = [
        'iCheck/icheck.js',
        //'bootstrap-slider/bootstrap-slider.js',
        //'bootstrap-wysihtml5/bootstrap-wysihtml5.all.js',
        //'chartjs/Chart.js',
        //'datepicker/bootstrap-datepicker.js',
        'select2/select2.full.js',
        'datatables/jquery.dataTables.min.js',
        'datatables/dataTables.bootstrap.js',
        'input-mask/jquery.inputmask.js',
        'input-mask/jquery.inputmask.date.extensions.js',
        'input-mask/jquery.inputmask.extensions.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}