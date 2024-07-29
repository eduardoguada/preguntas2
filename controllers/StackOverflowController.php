<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Json;
use app\models\StackOverflowQuestions;

class StackOverflowController extends Controller
{
    public function actionGetQuestions($tagged, $todate = null, $fromdate = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Construir la consulta a la API
        $queryParams = http_build_query([
            'site' => 'stackoverflow',
            'tagged' => $tagged,
            'todate' => $todate ? strtotime($todate) : null,
            'fromdate' => $fromdate ? strtotime($fromdate) : null,
        ]);

        // Revisa si ya hay una consulta similar en la base de datos
        $existingQuery = StackOverflowQuestions::find()
            ->where(['query' => $queryParams])
            ->one();

        if ($existingQuery) {
            return Json::decode($existingQuery->response);
        }

        // Llama a la API de Stack Exchange
        $url = 'https://api.stackexchange.com/2.3/questions?' . $queryParams;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Almacena la consulta y la respuesta en la base de datos
        $newQuery = new StackOverflowQuestions();
        $newQuery->query = $queryParams;
        $newQuery->response = $response;
        $newQuery->save();

        return Json::decode($response);
    }
}