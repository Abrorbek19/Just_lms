<?php

namespace common\widgets;

use common\models\Profile;
use yii\bootstrap5\Widget;

class header extends Widget
{
    public $view = 'header';
    public $header;

    public function run()
    {
        $this->header = Profile::find()->where(['created_by' => \Yii::$app->user->identity->username])->one();
        return $this->render($this->view, [
            'header' => $this->header,
        ]);

    }
}