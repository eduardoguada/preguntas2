<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class DbTestController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        try {
            // Realiza una consulta simple
            $command = Yii::$app->db->createCommand('SELECT DATABASE()');
            $db = $command->queryScalar();
            return ['status' => 'success', 'database' => $db];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
