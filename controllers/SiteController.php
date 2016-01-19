<?php

namespace app\controllers;

use app\components\NodeLogger;
use app\components\RoleAccessBehaviour;
use app\models\Action;
use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    public function behaviors()
    {
        //apply role_action table for privilege (doesn't apply to super admin)
        return Action::getAccess($this->id);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {
        $model = User::find()->where(["id"=>Yii::$app->user->id])->one();
        $oldMd5Password = $model->password;
        $oldPhotoUrl = $model->photo_url;

        $model->password = "";

        if ($model->load($_POST)){
            //password
            if($model->password != ""){
                $model->password = md5($model->password);
            }else{
                $model->password = $oldMd5Password;
            }

            # get the uploaded file instance
            $image = UploadedFile::getInstance($model, 'photo_url');
            if ($image != NULL) {
                # store the source file name
                $model->photo_url = $image->name;
                $extension = end(explode(".", $image->name));

                # generate a unique file name
                $model->photo_url = Yii::$app->security->generateRandomString() . ".{$extension}";

                # the path to save file
                $path = Yii::getAlias("@app/web/uploads/") . $model->photo_url;
                $image->saveAs($path);
            }else{
                $model->photo_url = $oldPhotoUrl;
            }

            if($model->save()){
                Yii::$app->session->addFlash("success", "Profile successfully updated.");
            }else{
                Yii::$app->session->addFlash("danger", "Profile cannot updated.");
            }
            return $this->redirect(["profile"]);
        }
        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
