<?php

class PersonController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionPerson1() {
        
        if (!isset($_POST[data])) {
            $sql = "select h.hoscode,h.hosname2 from chospital h where h.provcode=54";
        } else {
            $sql = "select h.hoscode,h.hosname2 from chospital h where h.provcode=54 and h.hostype in (03)";
        }

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $this->render('person1', array(
            'model' => $dataReader,
        ));
    }

}

